<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_jurusan');
        who();
    }
    public function index()
    {
        if($this->session->userdata('level_user')!="Admin") redirect('auth/block');
        $data['title'] = 'jurusan';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['unit'] = $this->m_jurusan->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_jurusan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_jurusan()
    {
        $data = array(
            'nama_jurusan' => $this->input->post('nama_jurusan')
        );
        $this->m_jurusan->input_data($data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('jurusan/index');
    }
    public function hapus_jurusan($id)
    {
        $where = array('id_jurusan' => $id);
        $this->m_jurusan->hapus_data($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('jurusan/index');
    }
    public function edit_jurusan($id)
    {
        if($this->session->userdata('level_user')!="Admin") redirect('auth/block');
        $data['title'] = 'Edit jurusan';
        $where = array('id_jurusan' => $id);
        $data['unit'] = $this->m_jurusan->edit_data($where, 'jurusan')->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('sekolah/v_editjurusan', $data);
        $this->load->view('template/footer');
    }
    public function update_jurusan($id)
    {  
        $id = $this->input->post('id_jurusan');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        

        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('logo_jurusan')) {
            $nama = $this->input->post('nama_jurusan');
            $alamat = $this->input->post('alamat_jurusan');
            $data = array(
                'nama_jurusan' => $nama,
                'alamat_jurusan' => $alamat,
            );
            $where = array('id_jurusan' => $id);
            $this->m_jurusan->update_data($where, $data, 'jurusan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('jurusan/index');
        } else {
            $nama = $this->input->post('nama_jurusan');
            $alamat = $this->input->post('alamat_jurusan');
            $logo = $_FILES['logo_jurusan'];
            $logo = $this->upload->data('file_name');
            $data = array(
                'nama_jurusan' => $nama,
                'alamat_jurusan' => $alamat,
                'logo_jurusan' => $logo,
            );
            $where = array('id_jurusan' => $id);
            $this->m_jurusan->update_data($where, $data, 'jurusan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('jurusan/index');
        }
    }
    

    
}