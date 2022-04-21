<?php

class M_map extends CI_Model
{

    public function create($data, $table)
    {
        return $this->db->insert($table, $data);
    }
}
