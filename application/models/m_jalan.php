<?php

class M_jalan extends CI_Model
{

    public function create($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function getAll()
    {
        return $this->db->get('jalan');
    }
    public function read($id)
    {
        $this->db->where('id_jalan', $id);
        return $this->db->get('jalan');
    }
    // public function edit($where, $table)
    // {
    //     return $this->db->get_where($table, $where);
    // }
    public function update($id, $data)
    {
        $this->db->where('id_jalan', $id);
        return $this->db->update('jalan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_jalan', $id);
        return $this->db->delete('jalan');
    }
}
