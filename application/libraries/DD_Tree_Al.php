<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter DD_Tree_Al library
 *
 * The library for easy working with al tree
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Daniel Demon (Daniil Rudenko)
 * @license         GNU
 * @link			https://github.com/danieldemon/DD_CI/blob/master/application/libraries/DD_Tree_Al.php
 * @version         1.0
 */
class DD_Tree_Al {
    /**
     * Tree
     * @var array
     */
    private $_tree;

    /**
     * CI Controller instance
     * @var CI_Controller
     */
    private $_CI;

    /**
     * Theme name
     * @var string
     */
    private $_theme = 'default';

    /**
     * Config file name
     * @var string
     */
    private $_config_name = 'dd_tree_al';

    /**
     * Root node open html
     * @var string
     */
    private $_root_tag_open = '<ul data-parent-id="[parent_id]">';

    /**
     * Root node close html
     * @var string
     */
    private $_root_tag_close = '</ul>';

    /**
     * Child node open html
     * @var string
     */
    private $_child_tag_open = '<li data-id="[id]">[name]';

    /**
     * Child node close html
     * @var string
     */
    private $_child_tag_close = '</li>';

    /**
     * Constructor
     * @param null $params
     */
    public function __construct($params = null)
    {
        $this->_CI = &get_instance();

        if(isset($params['theme']) && is_string($params['theme']))
        {
            $this->_theme = $params['theme'];
        }
        if(isset($params['config']) && is_string($params['config']))
        {
            $this->_config_name = $params['config'];
        }
        $this->_CI->config->load($this->_config_name,true);
        $tree_config = $this->_CI->config->item($this->_config_name);

        if (count($tree_config[$this->_theme]) > 0 && is_array($tree_config[$this->_theme]))
        {
            foreach ($tree_config[$this->_theme] as $key => $val)
            {
                if (isset($this->{'_'.$key}))
                {
                    $this->{'_'.$key} = $val;
                }
            }
        }
    }

    /**
     * Init tree (must call first)
     * @param $data
     */
    public function init_tree($data)
    {
        if(is_array($data))
        {
            foreach($data as $item)
            {
                $parent = is_null($item['parent_id'])? 0 : $item['parent_id'];
                $this->_tree[$parent][] = $item;
            }
        }

    }

    /**
     * Return tree as array
     * @param int $parent_id
     *
     * @return array|bool
     */
    public function as_array($parent_id = 0)
    {
        if (empty($this->_tree[$parent_id]))
        {
            return FALSE;
        }
        $tree_array = array();
        foreach ($this->_tree[$parent_id] as $k => $row)
        {
            $tree_array[$k] = $row;
            if (isset($this->_tree[$row['id']]))
            {
                $tree_array[$k]['nodes']= $this->as_array($row['id']);
            }
        }
        return $tree_array;
    }

    /**
     * Return tree as html
     * @param int $parent_id
     *
     * @return bool|string
     */
    public function as_html($parent_id = 0)
    {
        if (empty($this->_tree[$parent_id]) || !isset($this->_tree[$parent_id]))
        {
            return FALSE;
        }
        $html = strtr($this->_root_tag_open,array('[parent_id]' => $parent_id ));
        foreach ($this->_tree[$parent_id] as $key => $row)
        {
            $html .= strtr($this->_child_tag_open,array('[id]' => $row['id'],'[name]' => $row['name']));
            if (isset($this->_tree[$row['id']]))
            {
                $html .= $this->as_html($row['id']);
            }
            else
            {
                $html .= $this->_child_tag_close;
            }
        }
        $html .= $this->_root_tag_close;
        return $html;
    }
}