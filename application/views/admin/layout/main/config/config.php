<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//------------------common----------------------
$config['title'] = 'My Site';
$config['meta'] = array(
    array('charset' => 'utf-8')
);
$config['links'] = array(
    array('href' => '/assets/library/Bootstrap/3.2.0/css/bootstrap.min.css'),
    array('href' => '/assets/library/pnotify/pnotify.custom.min.css'),
    array('href' => '/assets/fonts/common/open-sans/open-sans.css'),///


    array('href' => '/assets/css/common/style.css'),
    array('href' => '/assets/css/admin/layout/main/style.css'),
);
$config['scripts'] = array(
    array('src' => '/assets/library/Jquery/2.1.1.min.js'),
    array('src' => '/assets/library/Bootstrap/3.2.0/js/bootstrap.min.js'),
    array('src' => '/assets/library/pnotify/pnotify.custom.min.js'),

    array('src' => '/assets/js/admin/layout/main/script.js'),
);
$config['layout_parts'] = array('header','footer');
//---------------------------------------------

//------------------header----------------------
$config['header']['links'] = array(
    array('href' => '/assets/css/admin/layout/main/header.css'),
);
$config['header']['scripts'] = array(
    array('href' => '/assets/js/admin/layout/main/header.js'),
);
//----------------------------------------------
