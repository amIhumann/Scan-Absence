<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_jurusan');
        $this->load->model('m_sekolah');
        $this->load->model('m_perusahaan');
        $this->load->model('m_riwayat');
        who();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['user'] = $this->m_user->read_data()->result();
        $data['totalAdmin'] = $this->m_user->admin('user');
        $data['totalWali'] = $this->m_user->waliKelas('user');
        $data['totalSiswa'] = $this->m_user->siswa('user');
        $data['sekolah'] = $this->m_sekolah->read_data()->result();
        $data['perusahaan'] = $this->m_perusahaan->read_data()->result();
        $data['jurusan'] = $this->m_jurusan->read_data()->result();
        $data['siswa'] = $this->db->query('SELECT * FROM riwayat WHERE id_user=' . $this->session->userdata('id_user') . ' ORDER BY id_riwayat DESC LIMIT 1 ')->row_array();
        if ($this->session->userdata('level_user') == 'Wali Kelas') {
            $data['siswaKelas'] = $this->db->query('SELECT COUNT(id_user) as jumlah FROM user WHERE id_sekolah=' . $this->session->userdata('id_sekolah') . ' AND id_jurusan=' . $this->session->userdata('id_jurusan'))->row_array();
            $data['absenSiswa'] = $this->db->query('SELECT COUNT(id_riwayat) as jumlah FROM riwayat WHERE id_sekolah=' . $this->session->userdata('id_sekolah') . ' AND id_jurusan=' . $this->session->userdata('id_jurusan') . ' AND tgl=' . "'" . date('d-m-Y') . "' AND keterangan!='Keperluan Pribadi'")->row_array();
        }

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('template/footer', $data);
    }
    public function admin()
    {
        $data['title'] = 'Admin';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['user'] = $this->m_user->read_data()->result();
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_user', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah_user()
    {
        $email = $this->input->post('email_user');
        $password = $this->input->post('pwd_user');
        $nama = $this->input->post('nama_user');
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
            'level_user' => 'Admin',
            'foto' => $foto,


        );
        $this->m_user->input_data($data, 'user');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('user/admin');
    }
    public function hapus_user($id)
    {
        $where = array('id_user' => $id);
        $this->m_user->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('user/admin');
    }
    public function edit_user($id)
    {
        $data['title'] = 'Edit User';
        $where = array('id_user' => $id);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['user'] = $this->m_user->edit_data($where, 'user')->result();
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_editUser', $data);
        $this->load->view('template/footer', $data);
    }
    public function update_user($id)
    {
        $id = $this->input->post('id_user');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;


        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            $email = $this->input->post('email_user');
            $password = $this->input->post('pwd_user');
            $nama = $this->input->post('nama_user');
            $data = array(
                'email_user' => $email,
                'pwd_user' => $password,
                'nama_user' => $nama,
                'level_user' => 'Admin',
            );
            $where = array('id_user' => $id);
            $this->load->model('m_user');
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            if ($this->session->userdata('level_user') == "Admin") redirect('user/profile');
            else redirect('user/admin');
        } else {

            $email = $this->input->post('email_user');
            $password = $this->input->post('pwd_user');
            $nama = $this->input->post('nama_user');
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');

            $data = array(
                'email_user' => $email,
                'pwd_user' => $password,
                'nama_user' => $nama,
                'level_user' => 'Admin',
                'foto' => $foto,
            );
            $where = array('id_user' => $id);
            $this->load->model('m_user');
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('user/admin');
        }
    }
    public function detail_user($id)
    {
        $data['title'] = 'Detail User';
        $detail = $this->m_user->detail_join($id);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['detail'] = $detail;
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/v_detailUser', $data);
        $this->load->view('template/footer', $data);
    }
    public function riwayat()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Riwayat';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['riwayat'] = $this->m_riwayat->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('riwayat/riwayat', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail_riwayat($id)
    {
        if ($this->session->userdata('level_user') == "Siswa") redirect('auth/block');
        $detail = $this->m_riwayat->detail($id);
        $data['detail'] = $detail;
        $data['title'] = "Keterangan Izin";
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('riwayat/v_detailR', $data);
        $this->load->view('template/footer', $data);
    }
    public function profile()
    {
        $data['title'] = "My Profile";
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer', $data);
    }
}
