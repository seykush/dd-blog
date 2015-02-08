<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter DD_Layout library
 *
 * The library for easy making of website layout and managing of loading views and assets.
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Daniel Demon (Daniil Rudenko)
 * @license         GNU
 * @link			https://github.com/danieldemon/DD_CI/blob/master/application/libraries/DD_Layout.php
 * @version         1.0
 */
class DD_Layout {

    /**
     *Page title
     * @var string
     */
    private $_title = 'My Site';

    /**
     * Script tags
     * @var array
     */
    private $_script = array();

    /**
     * Link tags
     * @var array
     */
    private $_link = array();

    /**
     * Meta tags
     * @var array
     */
    private $_meta = array();

    /**
     * CI Controller instance
     * @var CI_Controller
     */
    private $_CI;

    /**
     * Site side (admin or frontend)
     * @var string
     */
    private $_site_side = 'admin';

    /**
     * Layout name
     * @var string
     */
    private $_theme_name = 'main';

    /**
     * Layout part names (header,footer etc)
     * @var array
     */
    private $_parts = array();

    /**
     * Data for layout parts
     * @var array
     */
    private $_parts_data = array();

    /**
     * Different options
     * @var array
     */
    private $_options = array();

    /**
     * Constructor
     * @param null $params
     */
    public function __construct($params = NULL)
    {
        $this->_CI = &get_instance();
        if( ! is_null($params) && is_array($params))
        {
            if(isset($params['site_side']) && is_string($params['site_side']))
            {
                $this->_site_side = $params['site_side'];
            }
            if(isset($params['theme_name']) && is_string($params['theme_name']))
            {
                $this->_theme_name = $params['theme_name'];
            }
        }
    }

    /**
     * Load config file
     * @param string $module_name
     * @param string $view_name
     */
    private function _load_config($module_name = '', $view_name = '')
    {
        if( ! empty($module_name) && ! empty($view_name))
        {
            $this->_CI->config->load("../views/{$this->_site_side}/modules/{$module_name}/config/config");
        }
        else
        {
            $this->_CI->config->load("../views/{$this->_site_side}/layout/{$this->_theme_name}/config/config");
        }

        $links = $this->_CI->config->item('links', $view_name);
        $scripts = $this->_CI->config->item('scripts', $view_name);
        $meta = $this->_CI->config->item('meta', $view_name);
        $options =  $this->_CI->config->item('options', $view_name);
        $title =  $this->_CI->config->item('title', $view_name);
        $layout_parts = $this->_CI->config->item('layout_parts', $view_name);

        if(is_array($links))
        {
            foreach($links as $attributes)
            {
                $this->add_tag('link', $attributes);
            }
        }
        if(is_array($scripts))
        {
            foreach($scripts as $attributes)
            {
                $this->add_tag('script', $attributes);
            }
        }
        if(is_array($meta))
        {
            foreach($meta as $attributes)
            {
                $this->add_tag('meta', $attributes);
            }
        }
        if(is_array($options))
        {
            foreach($options as $name => $val)
            {
                $this->set_option($name, $val);
            }
        }
        $this->set_parts($layout_parts);
        $this->set_title($title);
    }

    public function set_theme($theme)
    {
        if( ! empty($theme))
        {
            $this->_theme_name = $theme;
            $this->_load_config();
        }
    }

    /**
     * Set layout parts
     * @param array $parts
     * @return bool
     */
    public function set_parts($parts)
    {
        if(is_array($parts))
        {
            $this->_parts = $parts;
            foreach($this->_parts as $part)
            {
                if(empty($this->_parts_data[$part]))
                {
                    $this->_parts_data[$part] = array();
                }
            }
        }
    }

    /**
     * Set data for layout parts
     * @param $part_name
     * @param array $data
     * @return bool
     */
    public function set_part_data($part_name, $data)
    {
        if( ! empty($data) && is_array($data))
        {
            $this->_parts_data[$part_name] = $data;
        }
    }

    /**
     * Set option
     * @param $name
     * @param $val
     */
    public function set_option($name, $val)
    {
        $this->_options[$name] = $val;
    }

    /**
     * Get option
     * @param $name
     * @return bool|mixed
     */
    public function get_option($name)
    {
        if(isset($this->_options[$name]))
        {
            return $this->_options[$name];
        }
        return FALSE;
    }

    /**
     * Set page title
     * @param $title
     */
    public function set_title($title)
    {
        if( ! empty($title) && is_string($title))
        {
            $this->_title = $title;
        }
    }

    /**
     * Get page title
     * @return string
     */
    public function get_title()
    {
        return $this->_title;
    }

    /**
     * Add tags to tags array
     * @param $tag_type
     * @param $attributes
     * @return bool
     */
    public function add_tag($tag_type, $attributes)
    {
        switch($tag_type)
        {
            case 'link':
                $flag = FALSE;
                if( ! empty($this->_link))
                {
                    foreach($this->_link as $link_attr)
                    {
                        if( (isset($link_attr['href']) && isset($attributes['href'])) &&
                            ($link_attr['href'] == $attributes['href']) )
                        {
                            $flag = TRUE;
                            break;
                        }
                    }
                    if( ! $flag)
                    {
                        $this->_link[] = $attributes;
                    }
                }
                else
                {
                    $this->_link[] = $attributes;
                }

                break;
            case 'script':
                $flag = FALSE;
                if( ! empty($this->_script))
                {
                    foreach($this->_script as $script_attr)
                    {
                        if( (isset($script_attr['src']) && isset($attributes['src']) ) &&
                            ($script_attr['src'] == $attributes['src']) )
                        {
                            $flag = TRUE;
                            break;
                        }
                    }
                    if( ! $flag)
                    {
                        $this->_script[] = $attributes;
                    }
                }
                else
                {
                    $this->_script[] = $attributes;
                }
                break;
            case 'meta':
                $flag = FALSE;
                if( ! empty($this->_meta))
                {
                    foreach($this->_meta as $meta_attr)
                    {
                        if( (isset($meta_attr['name']) && isset($attributes['name']) ) &&
                            ($meta_attr['name'] == $attributes['name']) )
                        {
                            $flag = TRUE;
                            break;
                        }
                    }
                    if( ! $flag)
                    {
                        $this->_meta[] = $attributes;
                    }
                }
                else
                {
                    $this->_meta[] = $attributes;
                }
                break;
            default:
                return FALSE;
                break;
        }
        return TRUE;
    }

    /**
     * Return html view with tags
     * @return string
     */
    public function render_tags(){
        $html = "";
        $html .= "<title>{$this->_title}</title>";
        if( ! empty($this->_meta))
        {
            $html .= "\n\t";
            foreach($this->_meta as $attributes)
            {
                $attributes_html = "";
                if( ! empty($attributes) && is_array($attributes))
                {
                    foreach($attributes as $attr_name => $attr_val)
                    {
                        $attributes_html .= "{$attr_name} = '{$attr_val}' ";
                    }
                    $html .= "<meta {$attributes_html} >";
                }
            }
        }
        if( ! empty($this->_link))
        {
            $html .= "\n\t";
            foreach($this->_link as $attributes)
            {
                $attributes_html = "";
                if( ! empty($attributes) && is_array($attributes))
                {
                    foreach($attributes as $attr_name => $attr_val)
                    {
                        if($attr_name != 'rel' && $attr_name != 'type')
                        {
                            $attributes_html .= "{$attr_name} = '{$attr_val}' ";
                        }
                    }
                }
                $html .= "<link ".
                    "rel='".(isset($attributes['rel'])?$attributes['rel'] : "stylesheet")."' ".
                    "type='".(isset($attributes['type'])?$attributes['type'] : "text/css")."'".
                    " {$attributes_html} />";
            }
        }
        if( ! empty($this->_script))
        {
            $html .= "\n\t";
            foreach($this->_script as $attributes)
            {
                $attributes_html = "";
                if( ! empty($attributes) && is_array($attributes))
                {
                    foreach($attributes as $attr_name => $attr_val)
                    {
                        if($attr_name != 'type')
                        {
                            $attributes_html .= "{$attr_name} = '{$attr_val}' ";
                        }
                    }
                }
                $html .= "<script ".
                    "type='".(isset($attributes['type'])?$attributes['type'] : "text/javascript")."'".
                    (isset($attributes['text'])?(" >{$attributes['text']} </script>") : (" {$attributes_html} ></script>"));
            }
        }
        return $html;
    }

    /**
     * Render or return partial view (without layout)
     * @param $module_name
     * @param $view_name
     * @param null $data
     * @param bool $return
     * @return bool|void
     */
    public function render_partial($module_name, $view_name, $data = NULL, $return = FALSE)
    {
        if(is_null($data))
        {
            $data = array();
        }
        if(is_array($data) && is_string($module_name) && is_string($view_name))
        {
            $view = FALSE;
            if($return)
            {
                $view = $this->_CI->load->view("{$this->_site_side}/modules/{$module_name}/{$view_name}", $data, $return);
            }
            else
            {
                $this->_CI->load->view("{$this->_site_side}/modules/{$module_name}/{$view_name}", $data, $return);
                return TRUE;
            }
            return $view;
        }
        else
        {
            return FALSE;
        }
    }


    /**
     * Render content with layout
     * @param null $content_data
     * @param string $module_name
     * @param string $view_name
     * @param string $title
     */
    public function render_page($content_data = NULL, $module_name = '', $view_name = '', $title = '')
    {
        $this->_load_config();
        if(is_null($content_data))
        {
            $content_data = array();
        }
        if(empty($module_name) && empty($view_name))
        {
            $group = $this->_CI->router->fetch_group();
            $module_name = $this->_CI->router->fetch_class();
            if( ! empty($group))
            {
                $module_name = $group .'/'.$module_name;
            }
            $view_name = $this->_CI->router->fetch_method();
        }
        $data['content'] = $this->_CI->load->view("{$this->_site_side}/modules/{$module_name}/{$view_name}", $content_data, true);
        $this->_load_config($module_name, $view_name);
        if( ! empty($this->_parts))
        {
            foreach($this->_parts as $part)
            {
                $data[$part] = $this->_CI->load->view("{$this->_site_side}/layout/{$this->_theme_name}/{$part}", $this->_parts_data[$part], true);
                $this->_load_config('', $part);
            }
        }
        $this->set_title($title);
        $data['options'] = $this->_options;
        $data['tags'] = $this->render_tags();
        $data['title'] = $this->get_title();
        $this->_CI->load->view("{$this->_site_side}/layout/{$this->_theme_name}/template", $data);
    }
}
