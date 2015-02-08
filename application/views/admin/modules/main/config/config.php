<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//------------------index----------------------
$config['index']['links'] = array(
    //array('href' => '/assets/css/admin/modules/main/index.css'),
);
$config['index']['scripts'] = array(
    //array('src' => '/assets/js/admin/modules/main/index.js')
);
$config['index']['title'] = 'Главная';
$config['index']['options'] = array(
    'icon' => '<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>',
);
//---------------------------------------------

//------------------login----------------------
$config['login']['scripts'] = array(
    array('src' => '/assets/js/admin/modules/main/login.js'),
    array('src' => '/assets/library/FormValidateHelper/fvh.js'),
);
$config['login']['links'] = array(
    array('href' => '/assets/css/admin/modules/main/login.css'),
);
$config['login']['layout_parts'] = array();
$config['login']['options'] = array(
    'icon' => '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>',
    'content_size' => 'col-sm-6 col-sm-offset-3'
);
$config['login']['title'] = 'Вход в Админ панель';
//---------------------------------------------
