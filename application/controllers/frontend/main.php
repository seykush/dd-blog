<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Frontend_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->layout->render_page('main', 'index', null, 'Frontend');
    }
}


