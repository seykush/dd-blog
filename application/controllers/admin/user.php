<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->layout->render_page();
    }

}


