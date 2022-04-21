<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_sekolah');
        $this->load->model('m_perusahaan');
        $this->load->model('m_jurusan');
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Wali Kelas';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['my'] = 'Wali Kelas';
        $data['sekolah'] = $this->m_sekolah->read_data()->result();
        $data['user'] = $this->m_user->read_data()->result();
        $data['perusahaan'] = $this->m_perusahaan->read_data()->result();
        $data['jurusan'] = $this->m_jurusan->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_waliKelas', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah_user()
    {
        $email = $this->input->post('email_user');
        $password = $this->input->post('pwd_user');
        $nama = $this->input->post('nama_user');
        $perusahaan = $this->input->post('id_perusahaan');
        $sekolah = $this->input->post('id_sekolah');
        $jurusan = $this->input->post('id_jurusan');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'email_user' => $email,
            'pwd_user' => sha1($password),
            'nama_user' => $nama,
            'id_perusahaan' => $perusahaan,
            'id_sekolah' => $sekolah,
            'id_jurusan' => $jurusan,
            'level_user' => 'Wali Kelas',
            'foto' => $foto,


        );
        $this->load->model('m_user');
        $this->m_user->input_data($data, 'user');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('walikelas/index');
    }
    public function hapus_user($id)
    {
        $where = array('id_user' => $id);
        $this->load->model('m_user');
        $this->m_user->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('walikelas/index');
    }
    public function edit_user($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Edit User';
        $where = array('id_user' => $id);
        $data['jurusan'] = $this->m_jurusan->read_data()->result();
        $data['sekolah'] = $this->m_sekolah->read_data()->result();
        $data['perusahaan'] = $this->m_perusahaan->read_data()->result();
        $data['user'] = $this->m_user->edit_data($where, 'user')->result();
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_editUser', $data);
        $this->load->view('template/footer', $data);
    }
    public function update_user()
    {

        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;


        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            $email = $this->input->post('email_user');
            $password = $this->input->post('pwd_user');
            $nama = $this->input->post('nama_user');
            $jurusan = $this->input->post('id_jurusan');
            $sekolah = $this->input->post('id_sekolah');
            $perusahaan = $this->input->post('id_perusahaan');
            $data = array(
                'email_user' => $email,
                'pwd_user' => $password,
                'nama_user' => $nama,
                'id_jurusan' => $jurusan,
                'id_sekolah' => $sekolah,
                'id_perusahaan' => $perusahaan,
                'level_user' => 'Wali Kelas',
            );
            $where = array('id_user' => $this->input->post('id_user'));
            $this->load->model('m_user');
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            if ($this->session->userdata('level_user') == "Wali Kelas") redirect('user/profile');
            else redirect('walikelas/index');
        } else {

            $email = $this->input->post('email_user');
            $password = $this->input->post('pwd_user');
            $nama = $this->input->post('nama_user');
            $jurusan = $this->input->post('id_jurusan');
            $sekolah = $this->input->post('id_sekolah');
            $perusahaan = $this->input->post('id_perusahaan');
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');

            $data = array(
                'email_user' => $email,
                'pwd_user' => $password,
                'nama_user' => $nama,
                'id_jurusan' => $jurusan,
                'id_sekolah' => $sekolah,
                'id_perusahaan' => $perusahaan,
                'level_user' => 'Wali Kelas',
                'foto' => $foto,
            );
            $where = array('id_user' => $this->input->post('id_user'));
            $this->load->model('m_user');
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            if ($this->session->userdata('level_user') == "Wali Kelas") redirect('user/profile');
            else redirect('walikelas/index');
        }
    }
    public function detail_user($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Detail User';
        $detail = $this->m_user->detail_join($id);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['detail'] = $detail;

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_detailUser', $data);
        $this->load->view('template/footer', $data);
    }
    public function riwayat_data()
    {
        if ($this->session->userdata('level_user') != "Wali Kelas") redirect('auth/block');
        $data['title'] = "Absen Siswa";
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['riwayat'] = $this->m_user->detail_siswa();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_dataSiswa', $data);
        $this->load->view('template/footer', $data);
    }
    public function riwayat_siswa($id)
    {
        if ($this->session->userdata('level_user') != "Wali Kelas") redirect('auth/block');
        $data['title'] = "Absen Siswa";
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['riwayat'] = $this->m_user->absen_siswa($id);

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_riwayatSiswa', $data);
        $this->load->view('template/footer', $data);
    }
}
