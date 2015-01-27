<?php
$config['index']['links'] = array(
    array('href' => '/assets/css/admin/modules/main/index.css'),
);
$config['index']['scripts'] = array(
    array('src' => '/assets/js/admin/modules/main/index.js')
);
$config['index']['options'] = array(
    'bread_crumbs' => '<li>Home</li><li>Dashboard</li>'
);
$config['login']['metas'] = array(
    array('charset' => 'utf-8'),
    array('name' => 'viewport','content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'),
    array('name' => 'apple-mobile-web-app-capable','content' => 'yes'),
    array('name' => 'apple-mobile-web-app-status-bar-style','content' => 'black'),
);
$config['login']['links'] = array(

);
$config['login']['scripts'] = array(
    array('src' => '/assets/js/admin/modules/main/login.js'),
    array('src' => '/assets/library/FormValidateHelper/fvh.js'),
    //array('src' => '/assets/library/Jquery-validation-1.13.0/dist/jquery.validate.min.js')
);
