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
        $this->load->library('DD_Auth',NULL,'auth');
        $this->_ajax_method_check();


        $this->output->enable_profiler(TRUE);
    }

    private function _ajax_method_check()
    {
        $method = $this->router->fetch_method();
        if(stristr($method,'ajax'))
        {
            if( ! $this->input->is_ajax_request())
            {
                show_404();
            }
        }
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

        if( ! $this->auth->check_access())
        {
            if( ! $this->auth->is_logged_in())
            {
                //redirect('admin/login');
            }
            else
            {
                //$this->auth->access_error('admin');
            }
        }
    }

}