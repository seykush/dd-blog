<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Layout
 */
class DD_Form_validation extends CI_Form_validation {

    function __construct()
    {
        parent::__construct();
    }
    public function case_sensitive($value, $params)
    {
        list($table_name, $id, $field_name) = explode('&', $params);
        if($this->CI->is_unique($table_name, $id, $field_name, $value))
        {
            return TRUE;
        }
        else
        {
            $this->set_message('case_sensitive', "Field must be unique");
            return FALSE;
        }
    }

    public function response($status, $system_error = '', $field_data = null, $additional_data = null)
    {
        if( ! empty($field_data) && is_array($field_data))
        {
            foreach($field_data as $key => $val)
            {
                if(isset($this->_field_data[$key]))
                {
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