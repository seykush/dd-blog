<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->layout->render_page();
    }

    public function login()
    {
        $this->layout->render_page();
    }

    public function ajax_login()
    {

    }


}


