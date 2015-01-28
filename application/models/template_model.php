<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Template_model
 */
class Template_model extends DD_Model {

    /*
     * For example we have 2 tables:
     * test (id,name, test_info_id)
     * test_info (id, date)
     *
     * */

    /**
     * @var array
     */
    private $_select = array(
        't.id',
        't.name',
        't.test_info_id',
        'ti.date as test_date',
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
        $this->db->join('test_info as ti', 't.test_info_id = ti.id', 'left');
        $query = $this->db->get_where('test as t', array($field_name => $value));
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
    public function get($start_pos = 0, $count = null, $select = null, $query_data = null)
    {
        if( ! is_null($select))
        {
            $this->_select = array_merge($this->_select, $select);
        }
        $this->db->select($this->_select);
        $this->db->join('test_info as ti', 't.test_info_id = ti.id', 'left');
        $this->db->from('test as t');
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
            if($this->db->insert('test', $data))
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
            if($this->db->update('test', $data))
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
        if($this->db->delete('test'))
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
        return $this->db->count_all('test');
    }
}