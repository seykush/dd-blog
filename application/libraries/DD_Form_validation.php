<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Layout
 */
class DD_Form_validation extends CI_Form_validation {

    function __construct()
    {
        parent::__construct();
    }

    public function is_unique($table_name,$id,$field_name,$value)
    {
        $current = $this->CI->db->get_where($table_name,array('id' => $id));
        $current = $current->row_array();
        if ($value !== $current[$field_name])
        {
            $this->CI->db->where_not_in('id', array($id));
            $result = $this->CI->db->get_where($table_name, array($field_name => $value));
            if ($result->num_rows() > 0)
            {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function case_sensitive($value, $params)
    {
        list($table_name, $id, $field_name) = explode('&', $params);
        if($this->is_unique($table_name, $id, $field_name, $value))
        {
            return TRUE;
        }
        else
        {
            $this->set_message('case_sensitive', "Field must be unique");
            return FALSE;
        }
    }

    public function ajax_success_response($success_url = '', $msg = '', $data = NULL)
    {
        if( ! empty($msg))
        {
            $success_url .= "?success_msg={$msg}";
        }
        $response_data = array(
            'status' => 'success',
            'success_url' => $success_url,
            'msg' => $msg,
            'data' => $data
        );
        exit(json_encode($response_data));
    }

    public function ajax_error_response($form_error = '', $data = NULL)
    {
        $fields = array();
        foreach($this->_field_data as $key => $val)
        {
            $fields[] = $key;
        }
        $response_data = array(
            'status' => 'failed',
            'form_error' => $form_error,
            'errors' => $this->_error_array,
            'fields' => $fields,
            'data' => $data
        );
        exit(json_encode($response_data));
    }
}