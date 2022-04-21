<?php

class M_sekolah extends CI_Model
{
    public function read_data()
    {
        return $this->db->get('sekolah');
    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function detail_data($id)
    {

     $this->db->select('a.nama_user, a.email_user, a.nis,a.level_user,c.nama_jurusan,c.id_jurusan,a.id_sekolah');
     $this->db->from('user a');
     $this->db->join('sekolah b','a.id_sekolah=b.id_sekolah','left',false);
     $this->db->join('jurusan c','a.id_jurusan=c.id_jurusan','left',false);
     $this->db->where('a.id_sekolah', $id);
     return $this->db->get()->result();
    }
    public function detail_siswa($id,$sk)
    {
        $this->db->select('a.nama_user, a.nis,a.level_user,a.foto,a.email_user, b.nama_sekolah,c.nama_jurusan');
        $this->db->from('user a');
        $this->db->join('sekolah b','a.id_sekolah=b.id_sekolah','left',false);
        $this->db->join('jurusan c','a.id_jurusan=c.id_jurusan','left',false);
        $this->db->where(array('a.id_jurusan'=> $id,'a.id_sekolah'=> $sk));
        return $this->db->get()->result();
    }
}