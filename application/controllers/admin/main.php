<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->layout->render_page();
    }

    public function login()
    {
        $this->layout->render_page();
    }
    public function logout()
    {
        $this->auth->logout();
        redirect('/admin/login');
    }

    public function ajax_login()
    {
        $this->load->model('user_model');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user[email]', '<strong>"E-mail"</strong>',
            'required|valid_email|xss_clean|trim|htmlspecialchars');
        $this->form_validation->set_rules('user[password]', '<strong>"Пароль"</strong>',
            'required|xss_clean|trim|htmlspecialchars');
        if($this->form_validation->run())
        {
            $user_data = $this->input->post('user');
            $user = $this->user_model->get(0,1,null,array(
                'sql' => 'u.email = ? AND u.password = ?',
                'params' => array($user_data['email'],md5($user_data['password']))
            ));

            if(empty($user))
            {
                $this->form_validation->ajax_error_response('Такого пользователя не существует');
            }
            else if( ! $this->auth->login('admin', $user))
            {
                $this->form_validation->ajax_error_response('Вы не можете войти в Админ-панель!');
            }
            else
            {
                $this->form_validation->ajax_success_response('/admin','Вы вошли в админ-панель');
            }
        }
        else
        {
            $this->form_validation->ajax_error_response();
        }
    }


}


