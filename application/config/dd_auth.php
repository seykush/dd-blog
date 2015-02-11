<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['default']['role'] = array(
    'admin',
    'user'
);
$config['default']['login_access'] = array(
    'admin' => array('admin'),
    'frontend' => array('user')
);
$config['default']['access'] = array(
    'admin' => array(
        'main' => array(
            'index' => array('admin'),
            'login' => array('*'),
            'logout' => array('*'),
            'ajax_login' => array('*')
        ),
        'user' => array(
            'index' => array('admin'),
        ),
        'post' => array(
            'index' => array('admin'),
        )
    ),
    'frontend' => array(
        'main' => array(
            'index' => array('*')
        )
    )
);