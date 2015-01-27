<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Parser
 */
class Parser {
    /**
     * @var string
     */
    private $uploads;

    /**
     * @param $uploads_directory
     */
    public function __construct($uploads_directory)
    {
        $this->uploads = $uploads_directory;
    }

    /**
     * @param $links
     * @return array
     */
    public function get_data($links)
    {
        if ( !is_array($links) ) {
            $links = array($links);
        }

        if ( !empty($links) ) {
            $result = array();
            foreach ( $links as $link ) {
                $method = 'parse_' . $this->get_method($link);
                if ( method_exists($this, $method) ) {
                    $result[$link] = $this->{$method}($link);
                }
            }

            return $result;
        }

        return false;
    }

    /**
     * @param $links
     * @return array
     */
    public function get_list($links)
    {
        if ( !is_array($links) ) {
            $links = array($links);
        }

        if ( !empty($links) ) {
            $result = array();
            foreach ( $links as $link ) {
                $method = 'parse_list_' . $this->get_method($link);
                if ( method_exists($this, $method) ) {
                    $result[$link] = $this->{$method}($link);
                }
            }

            return $result;
        }

        return false;
    }

    /**
     * @param $link
     * @return string
     */
    private function get_method($link)
    {
        $data = parse_url($link);
        $host = str_replace('www.', '', $data['host']);
        $host = explode('.', $host);
        $host = reset($host);
        return $host;
    }

    /**
     * @param $pattern
     * @param $string
     * @return null
     */
    private function get_substr($pattern, $string)
    {
        preg_match($pattern, $string, $match);
        return isset($match[1]) ? trim($match[1]) : null;
    }

    /**
     * @param $pattern
     * @param $string
     * @return null|string
     */
    private function get_sbstrs($pattern, $string)
    {
        preg_match_all($pattern, $string, $match);
        return isset($match[1]) ? $match[1] : null;
    }

    /**
     * @param $source
     * @return string
     */
    private function load_image($source)
    {
        $ext = explode('.', $source);
        $ext = strtolower(end($ext));

        $content = file_get_contents($source);
        $newname = substr(md5($source), 0, 10) . '.' . $ext;

        file_put_contents($this->uploads . DIRECTORY_SEPARATOR . $newname, $content);

        return $newname;
    }

    /*
     * PARSER MOTODOZA
     */
    private function parse_motodoza($link)
    {
        $content = file_get_contents($link);
        $data = array(
            'title'         => null,
            'description'   => null,
            'model'         => null,
            'image'         => null,
            'amount'        => 0,
            'price'         => 0,
        );

        # parse name
        $data['title'] = $this->get_substr('/<title>(.+?)<\/title>/si', $content);

        # parse model
        $data['model'] = $this->get_substr('/<span>Модель:<\/span>(.+?)<br/si', $content);

        # parse image
        $data['image'] = $this->get_substr('#(http://www.motodoza.com/image/cache/data/\d+-600x600.jpg)#si', $content);
        $data['image'] = $this->load_image($data['image']);

        # price
        $data['price'] = $this->get_substr('/class="price">.+?\$(.+?)<br/si', $content);

        # parse amount
        $data['amount'] = $this->get_substr('/(В наличии)/si', $content);
        $data['amount'] = is_null($data['amount']) ? 0 : 1;

        return $data;
    }

    private function parse_list_motodoza($link)
    {
        $link = preg_replace('/limit=\d+/i', '', $link);
        $link .= '&limit=1000';

        $content = file_get_contents($link);
        $data = $this->get_sbstrs('#<div class="name"><a href="(.+?)"#si', $content);
        for ( $i = 0; $i < count($data); $i++ ) {
            $data[$i] = str_replace('&amp;', '&', $data[$i]);
        }

        return $data;
    }
}