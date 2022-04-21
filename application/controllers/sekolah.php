<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_sekolah');
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Sekolah';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['unit'] = $this->m_sekolah->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_sekolah', $data);
        $this->load->view('template/footer');
    }
    public function tambah_sekolah()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Tambah Sekolah';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('sekolah/v_tambahSekolah', $data);
        $this->load->view('template/footer', $data);
    }
    public function prosesTambah_sekolah()
    {
        $nama = $this->input->post('nama_sekolah');
        $alamat = $this->input->post('alamat_sekolah');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');
        $logo = $_FILES['logo_sekolah'];
        if ($logo = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_sekolah')) {
            } else {
                $logo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_sekolah' => $nama,
            'alamat_sekolah' => $alamat,
            'latitude' => $latitude,
            'longtitude' => $longtitude,
            'logo_sekolah' => $logo,
        );
        $this->m_sekolah->input_data($data, 'sekolah');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('sekolah/index');
    }
    public function hapus_sekolah($id)
    {
        $where = array('id_sekolah' => $id);
        $this->m_sekolah->hapus_data($where, 'sekolah');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('sekolah/index');
    }
    public function edit_sekolah($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Edit sekolah';
        $where = array('id_sekolah' => $id);
        $data['unit'] = $this->m_sekolah->edit_data($where, 'sekolah')->result();
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_editsekolah', $data);
        $this->load->view('template/footer');
    }
    public function update_sekolah($id)
    {
        $id = $this->input->post('id_sekolah');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;


        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('logo_sekolah')) {
            $nama = $this->input->post('nama_sekolah');
            $alamat = $this->input->post('alamat_sekolah');
            $latitude = $this->input->post('latitude');
            $longtitude = $this->input->post('longtitude');
            $data = array(
                'nama_sekolah' => $nama,
                'alamat_sekolah' => $alamat,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
            );
            $where = array('id_sekolah' => $id);
            $this->m_sekolah->update_data($where, $data, 'sekolah');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('sekolah/index');
        } else {
            $nama = $this->input->post('nama_sekolah');
            $alamat = $this->input->post('alamat_sekolah');
            $latitude = $this->input->post('latitude');
            $longtitude = $this->input->post('longtitude');
            $logo = $_FILES['logo_sekolah'];
            $logo = $this->upload->data('file_name');
            $data = array(
                'nama_sekolah' => $nama,
                'alamat_sekolah' => $alamat,
                'logo_sekolah' => $logo,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
            );
            $where = array('id_sekolah' => $id);
            $this->m_sekolah->update_data($where, $data, 'sekolah');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('sekolah/index');
        }
    }
    public function detail_sekolah($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Wali Kelas';
        $sekolah = $this->m_sekolah->detail_data($id);
        $data['sekolah'] = $sekolah;
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_detailSekolah', $data);
        $this->load->view('template/footer');
    }
    public function sub_detail($id, $sk)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'List Siswa';
        $data['sekolah'] = $this->m_sekolah->detail_siswa($id, $sk);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_subDetail', $data);
        $this->load->view('template/footer');
    }
}
