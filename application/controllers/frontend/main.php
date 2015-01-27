<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends DD_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->layout->render_page('main', 'index', null, 'Title');
        //var_dump(strstr('/assets/library/Bootstrap/3.2.0/css/bootstrap.min.css',ASSETS_PATH));
        //var_dump($this->layout->add_path(ASSETS_PATH,'/assets/library/Bootstrap/3.2.0/css/bootstrap.min.css'));

    }
}


