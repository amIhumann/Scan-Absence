<?php

class M_riwayat extends CI_Model
{
    public $table = 'riwayat';

    public function read_data()
    {
        $this->db->select('a.id_riwayat,a.jam_masuk,a.tgl,a.tgl_akhir,a.upload_foto,a.keterangan,b.nama_user,b.level_user, c.id_sekolah, c.nama_sekolah,d.nama_perusahaan');
        $this->db->from('riwayat a');
        $this->db->join('user b','a.id_user=b.id_user');
        $this->db->join('sekolah c','b.id_sekolah=c.id_sekolah');
        $this->db->join('perusahaan d','b.id_perusahaan=d.id_perusahaan');
        $this->db->group_by('a.id_riwayat,b.nama_user,b.level_user, c.id_sekolah, c.nama_sekolah');
        return $this->db->get();
    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function detail($id=NULL){
        return $this->db->get_where('riwayat',['id_riwayat'=>$id])->row();
    }
}