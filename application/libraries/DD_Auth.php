<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class DD_Auth
 */
class DD_Auth
{
    private $user_types = array(
        'company' => 1,
        'company_worker' => 2,
        'supplier' => 3,
        'user' => 4,
        'super_admin' => 10,
        'admin_lvl_1' => 11,
        'admin_lvl_2' => 12,
        'admin_lvl_3' => 13,
        'admin_lvl_4' => 14,
        'admin_lvl_5' => 15,
        'admin_lvl_6' => 16,
    );
    private $_CI;
    public function __construct($params = null)
    {
        $this->_CI = &get_instance();
        //$this->_user = false;
        //$this->_is_logged_in = false;
        $this->_CI->load->model('user_model');
    }
    public function get_type()
    {
        $user = $this->get_info();
        return $user['type_id'];
    }
    public function get_permission()
    {
        $site_side = str_replace('/','',$this->_CI->router->fetch_directory());
        $class = $this->_CI->router->fetch_class();
        $method = $this->_CI->router->fetch_method();
        $result = $this->_CI->user_model->get_permissions($this->get_type(),$site_side.'.'.$class.'.'.$method);
        //var_dump($result);die();
        return !$result;
    }
    public function get_info()
    {
        return $this->_CI->session->userdata('user');
    }

    public function login($user_data)
    {
        if($user_data){
            $this->_CI->session->set_userdata(array(
                'user' => $user_data
            ));
            return true;
        }
        return false;
    }

    public function register($user_data,$user_info_data)
    {
       return $this->_CI->user_model->create($user_data,$user_info_data);
    }

    public function change_password()
    {

    }

    public function activate()
    {

    }

    public function is_logged_in()
    {
        $method = $this->_CI->router->fetch_method();

        return $this->_CI->session->userdata('user')?TRUE:FALSE;
    }
    public function logout()
    {
        $this->_CI->session->unset_userdata('user');
    }

}