<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['user_types'] = array(
    array('id' => 1, 'name' => 'admin'),
    array('id' => 2, 'name' => 'user'),
);
$config['site_side_types'] = array(
    'admin' => array(1),
    'frontend' => array(1,2)
);