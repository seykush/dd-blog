<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['title'] = 'SmartAdmin';
$config['metas'] = array(
    array('charset' => 'utf-8'),
    array('name' => 'viewport','content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'),
    array('name' => 'apple-mobile-web-app-capable','content' => 'yes'),
    array('name' => 'apple-mobile-web-app-status-bar-style','content' => 'black'),
);
$config['links'] = array(
    array('href' => '/assets/library/Bootstrap/3.2.0/css/bootstrap.min.css'),
    array('href' => '/assets/library/font-awesome-4.2.0/css/font-awesome.min.css','media' => 'screen'),
    array('href' => '/assets/library/smart-admin/css/smartadmin-production.min.css','media' => 'screen'),
    array('href' => '/assets/library/smart-admin/css/smartadmin-skins.min.css','media' => 'screen'),
    array('href' => '/assets/library/smart-admin/css/admin-style.css','media' => 'screen'),
    array('href' => '/assets/library/smart-admin/css/demo.min.css','media' => 'screen'),///
    array('href' => '/img/favicon/favicon.ico','rel' => 'shortcut icon','type' => 'image/x-icon'),//
    array('href' => '/img/favicon/favicon.ico','rel' => 'icon','type' => 'image/x-icon'),//
    array('href' => '/assets/fonts/common/open-sans/open-sans.css'),
    array('href' => '/img/splash/sptouch-icon-iphone.png','rel' => 'apple-touch-icon'),//
    array('href' => '/img/splash/touch-icon-ipad.png','rel' => 'apple-touch-icon','sizes' => '76x76'),//
    array('href' => '/img/splash/touch-icon-iphone-retina.png','rel' => 'apple-touch-icon','sizes' => '120x120'),//
    array('href' => '/img/splash/touch-icon-ipad-retina.png','rel' => 'apple-touch-icon','sizes' => '152x152'),//
    array('href' => '/img/splash/ipad-landscape.png','rel' => 'apple-touch-startup-image','media' => 'screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)'),
    array('href' => '/img/splash/ipad-portrait.png','rel' => 'apple-touch-startup-image','media' => 'screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)'),
    array('href' => '/img/splash/iphone.png','rel' => 'apple-touch-startup-image','media' => 'screen and (max-device-width: 320px)'),
//    array('href' => '/assets/css/admin/layout/main/style.css'),
//    array('href' => '/assets/css/common/style.css'),
);

$config['scripts'] = array(
    array('src' => '/assets/library/Jquery/2.1.1.min.js'),
    array('src' => '/assets/library/Bootstrap/3.2.0/js/bootstrap.min.js'),
    array('src' => '/assets/library/pace/pace.min.js','data-pace-options' => '{ "restartOnRequestAfter": true }'),
//    array('src' => '/assets/library/smart-admin/js/app.config.js'),
    array('src' => '/assets/library/smart-admin/js/demo.min.js'),/////
//    array('src' => '/assets/library/smart-admin/js/app.min.js'),
    array('src' => '/assets/library/Jquery/jquery-ui-1.10.3.min.js'),
    array('src' => '/assets/library/jquery-touch/jquery.ui.touch-punch.min.js'),
    array('src' => '/assets/library/notification/SmartNotification.min.js'),/////
    array('src' => '/assets/library/smartwidgets/jarvis.widget.min.js'),
//    array('src' => '/js/admin/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'),/////
    array('src' => '/assets/library/sparkline/jquery.sparkline.min.js'),////
    array('src' => '/assets/library/bootstrap-slider/bootstrap-slider.min.js'),/////
    array('src' => '/assets/library/msie-fix/jquery.mb.browser.min.js'),
    array('src' => '/assets/library/fastclick/fastclick.min.js'),/////.
    array('src' => '/assets/library/jquery-tmpl/jquery.tmpl.min.js'),
    array('src' => '/assets/js/admin/layout/main/script.js'),
);
$config['layoutParts'] = array('header','footer','left_side');


