<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DD_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('DD_Layout',array('site_side' => 'frontend','theme_name' => 'main'),'layout');

    }



}