<?php

class M_user extends CI_Model
{
    public $table = 'user';

    public function read_data()
    {
        return $this->db->get('user');
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
    public function detail_join($id = NULL)
    {
        $this->db->select('a.nama_user, a.nis,a.level_user,a.foto, b.nama_sekolah,c.nama_perusahaan,d.nama_jurusan');
        $this->db->from('user a');
        $this->db->join('sekolah b', 'a.id_sekolah=b.id_sekolah', 'left', false);
        $this->db->join('perusahaan c', 'a.id_perusahaan=c.id_perusahaan', 'left', false);
        $this->db->join('jurusan d', 'a.id_jurusan=d.id_jurusan', 'left', false);
        $query = $this->db->get_where('user', array('a.id_user' => $id))->row();
        return $query;
    }
    public function admin()
    {
        $this->db->where('level_user', "Admin");
        return $this->db->get_where($this->table)->num_rows();
    }
    public function waliKelas()
    {
        $this->db->where('level_user', "Wali kelas");
        return $this->db->get_where($this->table)->num_rows();
    }
    public function siswa()
    {
        $this->db->where('level_user', "Siswa");
        return $this->db->get_where($this->table)->num_rows();
    }
    public function detail_siswa()
    {
        $this->db->select('a.nama_user,a.nis,a.email_user,a.level_user,d.nama_perusahaan,a.id_user');
        $this->db->from('user a');
        $this->db->join('sekolah b', 'a.id_sekolah=b.id_sekolah', 'left', false);
        $this->db->join('jurusan c', 'a.id_jurusan=c.id_jurusan', 'left', false);
        $this->db->join('perusahaan d', 'a.id_perusahaan=d.id_perusahaan', 'left', false);
        $this->db->where(array('a.id_jurusan' => $this->session->userdata('id_jurusan'), 'a.id_sekolah' => $this->session->userdata('id_sekolah')));
        return $this->db->get()->result();
    }
    public function absen_siswa($id)
    {
        $this->db->select('e.level_user,a.id_riwayat,a.jam_masuk,e.nama_user,a.tgl,a.keterangan,e.id_user,a.keterangan_izin,a.tgl_akhir,a.upload_foto');
        $this->db->from('user e');
        $this->db->join('riwayat a', 'a.id_user=e.id_user', 'left', false);
        $this->db->where('e.id_user', $id);
        return $this->db->get()->result();
    }
}
