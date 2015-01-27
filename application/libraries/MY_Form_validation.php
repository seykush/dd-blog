<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Layout
 */
class MY_Form_validation extends CI_Form_validation
{
    function __construct() {
        parent::__construct();
    }
    public function case_sensitive($value,$params)
    {
        $this->CI->load->model('user_model'); // решить вопрос
        list($tableName, $id, $fieldName) = explode('&', $params);
        if($this->CI->user_model->is_unique($tableName,$id,$fieldName,$value))
        {
            return TRUE;
        } else {
            $this->set_message('case_sensitive', "Field must be unique");
            return FALSE;
        }
    }
    public function handle_upload($value,$input_name)
    {
        //exit(json_encode('123'));
        if (isset($_FILES[$input_name]) && !empty($_FILES[$input_name]['name']))
        {
            if ($this->CI->upload->do_upload($input_name))
            {
                // set a $_POST value for 'image' that we can use later
                $upload_data    = $this->CI->upload->data();
                $_POST[$input_name] = $upload_data['file_name'];
                return true;
            }
            else
            {
                // possibly do some clean up ... then throw an error
                $this->set_message('handle_upload', $this->CI->upload->display_errors());
                return false;
            }
        }
        return true;

    }



    public function response($status,$system_error = '',$field_data = null,$additional_data = null,$format = 'json')
    {
        if(!empty($field_data) && is_array($field_data)){
            foreach($field_data as $key => $val){
                if(isset($this->_field_data[$key])){
                    $this->_field_data[$key]['error'] = $val;
                }
            }
        }
        $this->_error_array['system_error'] = $system_error;
        $error_data = array(
            'status' => $status,
            'errors' => $this->_error_array,
            'field_data' => $this->_field_data,
            'data' => $additional_data
        );
        exit(json_encode($error_data));
    }
}