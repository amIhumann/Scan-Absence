<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_riwayat');
        $this->load->model('m_perusahaan');
        who();
    }
    public function abs(){
        if($this->session->userdata('level_user')!="Siswa") redirect('auth/block');
        $data['title'] = 'Absensi';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['cek'] = $this->m_perusahaan->cek(); 

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('absenScan', $data);
        $this->load->view('template/footer', $data);
    }
    public function absen(){
        if($this->session->userdata('level_user')!="Siswa") redirect('auth/block');
        $id = $this->session->userdata('id_user');
        $date = date('d-m-Y');
        $query = $this->db->query("select jam_masuk from riwayat where id_user='$id' and tgl='$date'");
        if($query->num_rows() > 0) redirect('auth/block');
        $data=array(
            'id_user'=>$this->input->post('id_user'),
            'id_sekolah'=>$this->input->post('id_sekolah'),
            'id_perusahaan'=>$this->input->post('id_perusahaan'),
            'jam_masuk'=>$this->input->post('jam_masuk'),
            'tgl'=>$this->input->post('tgl'),
            'keterangan'=>$this->input->post('keterangan'),
        );
        $this->m_riwayat->input_data($data,'riwayat');
        redirect('user');
    }
    public function izin(){
        if($this->session->userdata('level_user')!="Siswa") redirect('auth/block');
        $id = $this->session->userdata('id_user');
        $date = date('d-m-Y');
        $query = $this->db->query("select tgl from riwayat where id_user='$id' and tgl='$date'");
        if($query->num_rows() > 0) redirect('auth/block');
        $foto = $_FILES['upload_foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('upload_foto')) {
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data=[
            'id_user'=>$this->input->post('id_user'),
            'id_sekolah'=>$this->input->post('id_sekolah'),
            'id_perusahaan'=>$this->input->post('id_perusahaan'),
            'keterangan_izin'=>$this->input->post('keterangan_izin'),
            'keterangan'=>$this->input->post('keterangan'),
            'tgl'=>$this->input->post('tgl'),
            'tgl_akhir'=>$this->input->post('tgl_akhir'),
            'upload_foto'=>$foto,
        ];
        $this->m_riwayat->input_data($data,'riwayat');
        redirect('user');
    }
}
