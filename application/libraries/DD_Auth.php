<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class DD_Auth
 */
class DD_Auth {

    private $_config = 'default';
    private $_config_name = 'dd_auth';
    private $_role = array();
    private $_login_access = array();
    private $_access = array();
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
        if( ! empty($params['config']) && is_string($params['config']))
        {
            $this->_config = $params['config'];
        }
        $this->_load_config();
    }

    private function _load_config()
    {
        $this->_CI->config->load($this->_config_name,true);
        $auth_config = $this->_CI->config->item($this->_config_name);
        if (is_array($auth_config[$this->_config]))
        {
            foreach ($auth_config[$this->_config] as $key => $val)
            {
                if (isset($this->{'_'.$key}))
                {
                    $this->{'_'.$key} = $val;
                }
            }
        }
    }

    public function check_access()
    {
        $side = $this->_CI->router->fetch_side();
        $group = $this->_CI->router->fetch_group();
        $controller = $this->_CI->router->fetch_class();
        $method = $this->_CI->router->fetch_method();
        $roles = array();
        if( ! empty($group))
        {
            $roles = $this->_access[$side][$group][$controller][$method];
        }
        else
        {
            $roles = $this->_access[$side][$controller][$method];
        }

        if(in_array('*',$roles))
        {
            return TRUE;
        }
        else
        {
            if($this->is_logged_in() && in_array($this->get_info('role'),$roles))
            {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function can_login($side)
    {
        if(in_array($this->get_info('role'),$this->_login_access[$side]))
        {
            return TRUE;
        }
        return FALSE;
    }
    public function access_error($side = 'admin')
    {
        if($this->_CI->input->is_ajax_request())
        {
            exit(json_encode('access_error'));
        }

        if($this->can_login($side))
        {
            $this->_CI->layout->render_page(null,'main','access_error','Error');
        }
        else
        {
            show_404();//
        }
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

    public function login($to_side,$user_data, $extra_data = NULL)
    {
        if( ! in_array($user_data['role'],$this->_login_access[$to_side]))
        {
            return FALSE;
        }

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