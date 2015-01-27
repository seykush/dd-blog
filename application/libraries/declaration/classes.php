<?php
class CI_Controller {
	/**
	 *
	 * @var CI_DB_active_record
	 */
	public $db;

	/**
	 *
	 * @var CI_Loader
	 */
	public $load;

    /**
     *
     * @var CI_Router
     */
    public $router;

	/**
	 *
	 * @var CI_Output
	 */
	public $output;

	/**
	 *
	 * @var CI_Email
	 */
	public $email;

	/**
	 *
	 * @var CI_Session
	 */
	public $session;

	/**
	 *
	 * @var CI_Config
	 */
	public $config;

	/**
	 *
	 * @var CI_Benchmark
	 */
	public $benchmark;

	/**
	 *
	 * @var CI_Calendar
	 */
	public $calendar;

	/**
	 *
	 * @var CI_Cart
	 */
	public $cart;

	/**
	 *
	 * @var CI_Encrypt
	 */
	public $encrypt;

	/**
	 *
	 * @var CI_Upload
	 */
	public $upload;

	/**
	 *
	 * @var CI_Form_validation
	 */
	public $form_validation;

	/**
	 *
	 * @var CI_FTP
	 */
	public $ftp;

	/**
	 *
	 * @var CI_Table
	 */
	public $table;

	/**
	 *
	 * @var CI_Image_lib
	 */
	public $image_lib;

	/**
	 *
	 * @var CI_Input
	 */
	public $input;

	/**
	 *
	 * @var CI_Language
	 */
	public $lang;

	/**
	 *
	 * @var CI_Pagination
	 */
	public $pagination;

	/**
	 *
	 * @var CI_Trackback
	 */
	public $trackback;

	/**
	 *
	 * @var CI_Parser
	 */
	public $parser;

	/**
	 *
	 * @var CI_Typography
	 */
	public $typography;

	/**
	 *
	 * @var CI_Unit_test
	 */
	public $unit;

	/**
	 *
	 * @var CI_URI
	 */
	public $uri;

	/**
	 *
	 * @var CI_User_agent
	 */
	public $agent;

	/**
	 *
	 * @var CI_Xmlrpcs
	 */
	public $xmlrpcs;

	/**
	 *
	 * @var CI_Xmlrpc
	 */
	public $xmlrpc;

	/**
	 *
	 * @var CI_Zip
	 */
	public $zip;

    /**
     *
     * @var DD_Layout
     */
    public $layout;
    /**
     *
     * @var DD_Tree_Al
     */
    public $tree;
    /**
     *
     * @var DD_Auth
     */
    public $auth;

    /**
     *
     * @var Category_model
     */
    public $category_model;


    /**
     *
     * @var User_model
     */
    public $user_model;

    /**
     *
     * @var Manufacturer_model
     */
    public $manufacturer_model;
    /**
     *
     * @var City_model
     */
    public $city_model;
    /**
     *
     * @var Order_model
     */
    public $order_model;
    /**
     *
     * @var Product_model
     */
    public $product_model;
    /**
     *
     * @var Transaction_model
     */
    public $transaction_model;

}

class CI_Model {
    /**
     *
     * @var CI_DB_active_record
     */
    public $db;


    /**
     *
     * @var CI_Config
     */
    public $config;


    /**
     *
     * @var CI_Table
     */
    public $table;


    /**
     *
     * @var CI_URI
     */
    public $uri;



}


class MY_Layout {
    /**
     *
     * @var CI_Config
     */
    public $config;
    /**
     *
     * @var CI_Loader
     */
    public $load;
    /**
     *
     * @var CI_Parser
     */
    public $parser;
}
