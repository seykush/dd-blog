<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class DD_Auth
 */
class DD_Auth {

    /**
     * CI Controller instance
     * @var CI_Controller
     */
    private $_CI;

    /**
     * @param null $params
     */
    public function __construct($params = null)
    {
        $this->_CI = &get_instance();
    }

    /**
     * @param null $field
     * @return array|string
     */
    public function get_session($field = null)
    {
        if(empty($field))
        {
            return $this->_CI->session->all_userdata();
        }
        else
        {
            return $this->_CI->session->userdata($field);
        }
    }

    /**
     * @param string $field
     * @param bool $return
     * @return array|bool|string
     */
    public function get_info($field = '', $return = FALSE)
    {
        $user = $this->get_session('user');
        if(empty($field))
        {
            return $user;
        }
        if( ! empty($user[$field]))
        {
            return $user[$field];
        }
        return $return;
    }

    /**
     * @param $user_data
     * @param null $extra_data
     * @return bool
     */
    public function login($user_data, $extra_data = NULL)
    {
        ///is allow to login in?
        if( ! empty($user_data) && is_array($user_data))
        {
            if( ! empty($extra_data) && is_array($extra_data))
            {
                $user_data = array_merge($user_data, $extra_data);
            }
            $this->_CI->session->set_userdata(array(
                'user' => $user_data
            ));
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->get_info()?TRUE:FALSE;
    }

    /**
     *
     */
    public function logout()
    {
        $this->_CI->session->unset_userdata('user');
    }

}