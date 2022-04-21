<?php

class M_jembatan extends CI_Model
{

    public function create($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function getAll()
    {
        return $this->db->get('jembatan');
    }
    public function read($id)
    {
        $this->db->where('id_jembatan', $id);
        return $this->db->get('jembatan');
    }
    public function update($id, $data)
    {
        $this->db->where('id_jembatan', $id);
        return $this->db->update('jembatan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_jembatan', $id);
        return $this->db->delete('jembatan');
    }
}
