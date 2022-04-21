<?php

class M_perusahaan extends CI_Model
{
    public function read_data()
    {
        return $this->db->get('perusahaan');
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
        $this->db->select('a.nama_user,a.nis,a.email_user,a.level_user,c.nama_jurusan,b.nama_sekolah,a.id_user');
        $this->db->from('user a');
        $this->db->join('sekolah b','a.id_sekolah=b.id_sekolah','left',false);
        $this->db->join('jurusan c','a.id_jurusan=c.id_jurusan','left',false);
        $this->db->join('perusahaan d','a.id_perusahaan=d.id_perusahaan','left',false);
        $this->db->where('a.id_perusahaan', $id);
        return $this->db->get()->result();
    }
    public function riwayat_data($id){
        $this->db->select('e.level_user,a.id_riwayat,a.jam_masuk,a.tgl,a.keterangan,e.id_user,a.keterangan_izin,a.tgl_akhir');
        $this->db->from('user e');
        $this->db->join('riwayat a','a.id_user=e.id_user','left',false);
        $this->db->where('e.id_user', $id);
        return $this->db->get()->result();
    }
    public function riwayat_izin($id){
        $this->db->select('a.id_riwayat,a.tgl_akhir,a.keterangan_izin,a.upload_foto,e.level_user');
        $this->db->from('riwayat a');
        $this->db->join('user e','a.id_user=e.id_user','left',false);
        $this->db->where('a.id_riwayat', $id);
        return $this->db->get()->result();
    }
    public function cek(){
        $this->db->select('a.qr_code');
        $this->db->from('perusahaan a');
        $this->db->join('user b','a.id_perusahaan=b.id_perusahaan');
        $this->db->where(['b.id_user'=>$this->session->userdata('id_user')]);
        return $this->db->get()->result();
    }
}