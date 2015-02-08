<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User_model
 */
class User_model extends DD_Model {

    /**
     * @var array
     */
    private $_select = array(
        'u.id',
        'u.email',
        'u.role',
    );

    /**
     * @param $field_name
     * @param $value
     *
     * @return bool
     */
    public function get_by_field($field_name, $value)
    {
        $this->db->select($this->_select);
        $query = $this->db->get_where('user as u', array($field_name => $value));
        if($query->num_rows > 0)
        {
            return $query->row_array();
        }
        return FALSE;
    }

    /**
     * @param int  $start_pos
     * @param null $count
     * @param null $select
     * @param null $query_data
     *
     * @return bool
     */
    public function get($start_pos = 0, $count = NULL, $select = NULL, $query_data = NULL)
    {
        if( ! is_null($select))
        {
            $this->_select = array_merge($this->_select, $select);
        }
        $this->db->select($this->_select);
        $this->db->from('user as u');
        if( ! is_null($query_data))
        {
            $query_params = isset($query_data['params']) ? $query_data['params'] : array();
            $this->db->where($this->db->compile_binds($query_data['sql'], $query_params));
        }
        if( ! is_null($count))
        {
            $this->db->limit($count, $start_pos);
        }
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            if($count == 1)
            {
                return $result->row_array();
            }
            return $result->result_array();
        }
        return FALSE;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function create($data)
    {
        if( ! empty($data) && is_array($data))
        {
            if($this->db->insert('user', $data))
            {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return bool
     */
    public function update($id, $data)
    {
        if( ! empty($id) && ! empty($data) && is_array($data))
        {
            $this->db->where('id', $id);
            if($this->db->update('user', $data))
            {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('user'))
        {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @return mixed
     */
    public function count_all()
    {
        return $this->db->count_all('user');
    }
}