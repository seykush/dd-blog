<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class DD_Controller
 */
class DD_Controller extends CI_Controller {

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $table_name
     * @param $id
     * @param $field_name
     * @param $value
     *
     * @return bool
     */
    public function is_unique($table_name,$id,$field_name,$value)
    {
        $current = $this->db->get_where($table_name,array('id' => $id));
        $current = $current->row_array();
        if ($value !== $current[$field_name])
        {
            $this->db->where_not_in('id', array($id));
            $result = $this->db->get_where($table_name, array($field_name => $value));
            if ($result->num_rows() > 0)
            {
                return FALSE;
            }
        }
        return TRUE;
    }

}


/**
 * Class Frontend_Controller
 */
class Frontend_Controller extends DD_Controller {

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('DD_Layout',array('site_side' => 'frontend','theme_name' => 'main'),'layout');

    }

}


/**
 * Class Admin_Controller
 */
class Admin_Controller extends DD_Controller {

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('DD_Layout',array('site_side' => 'admin','theme_name' => 'main'),'layout');
    }

}