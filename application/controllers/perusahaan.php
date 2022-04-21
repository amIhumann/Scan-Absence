<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_perusahaan');
        $this->load->model('m_sekolah');
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Perusahaan';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['unit'] = $this->m_perusahaan->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('perusahaan/v_perusahaan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_perusahaan()
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Tambah Perusahaan';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('perusahaan/v_tambahPerusahaan', $data);
        $this->load->view('template/footer', $data);
    }
    public function prosesTambah_perusahaan()
    {
        $id = $this->input->post('id_perusahaan');
        $nama = $this->input->post('nama_perusahaan');
        $alamat = $this->input->post('alamat_perusahaan');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');
        $logo = $_FILES['logo_perusahaan'];

        $this->load->library('ciqrcode');
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './src/'; //string, the default is application/cache/
        $config['errorlog']     = './src/'; //string, the default is application/logs/
        $config['imagedir']     = './src/img/company/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $qr = $nama . '.png';
        $params['data'] = $nama; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $qr; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        if ($logo = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_perusahaan')) {
            } else {
                $logo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_perusahaan' => $id,
            'nama_perusahaan' => $nama,
            'alamat_perusahaan' => $alamat,
            'logo_perusahaan' => $logo,
            'latitude' => $latitude,
            'longtitude' => $longtitude,
            'qr_code' => $qr,
        );
        $this->m_perusahaan->input_data($data, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('perusahaan/index');
    }
    public function hapus_perusahaan($id)
    {
        $where = array('id_perusahaan' => $id);
        $this->m_perusahaan->hapus_data($where, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('perusahaan/index');
    }
    public function edit_perusahaan($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Edit Perusahaan';
        $where = array('id_perusahaan' => $id);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['unit'] = $this->m_perusahaan->edit_data($where, 'perusahaan')->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('perusahaan/v_editPerusahaan', $data);
        $this->load->view('template/footer', $data);
    }
    public function update_perusahaan($id)
    {
        $id = $this->input->post('id_perusahaan');
        $Qr = $this->input->post('qr');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $this->upload->initialize($config);

        $this->load->library('ciqrcode');
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './src/'; //string, the default is application/cache/
        $config['errorlog']     = './src/'; //string, the default is application/logs/
        $config['imagedir']     = './src/img/company/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $qr = $Qr . '.png';
        $params['data'] = $Qr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $qr; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        if (!$this->upload->do_upload('logo_perusahaan')) {
            $nama = $this->input->post('nama_perusahaan');
            $alamat = $this->input->post('alamat_perusahaan');
            $latitude = $this->input->post('latitude');
            $longtitude = $this->input->post('longtitude');
            $data = array(
                'nama_perusahaan' => $nama,
                'alamat_perusahaan' => $alamat,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
                'qr_code' => $qr,
                'qr'=>$Qr
            );
            $where = array('id_perusahaan' => $id);
            $this->m_perusahaan->update_data($where, $data, 'perusahaan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('perusahaan/index');
        } else {
            $nama = $this->input->post('nama_perusahaan');
            $alamat = $this->input->post('alamat_perusahaan');
            $latitude = $this->input->post('latitude');
            $longtitude = $this->input->post('longtitude');
            $logo = $_FILES['logo_perusahaan'];
            $logo = $this->upload->data('file_name');
            $data = array(
                'nama_perusahaan' => $nama,
                'alamat_perusahaan' => $alamat,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
                'logo_perusahaan' => $logo,
                'qr_code' => $qr,
                'qr'=>$Qr
            );
            $where = array('id_perusahaan' => $id);
            $this->m_perusahaan->update_data($where, $data, 'perusahaan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('perusahaan/index');
        }
    }
    public function detail_perusahaan($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Sekolah';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['perusahaan'] = $this->m_perusahaan->detail_data($id);

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('perusahaan/v_detailperusahaan', $data);
        $this->load->view('template/footer');
    }
    public function riwayatSiswa($id)
    {
        $data['title'] = 'Riwayat';
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['perusahaan'] = $this->m_perusahaan->riwayat_data($id);

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header');
        $this->load->view('perusahaan/v_riwayatSiswa', $data);
        $this->load->view('template/footer');
    }
    public function riwayatIzin($id)
    {
        $data['detail'] = $this->m_perusahaan->riwayat_izin($id);;
        $data['title'] = "Keterangan Izin";
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('perusahaan/v_riwayatIzin', $data);
        $this->load->view('template/footer', $data);
    }
    public function print_data($id)
    {
        if ($this->session->userdata('level_user') != "Admin") redirect('auth/block');
        $data['title'] = 'Riwayat';
        $data['perusahaan'] = $this->m_perusahaan->riwayat_data($id);
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('perusahaan/v_perusahaanPrint', $data);
        $this->load->view('template/footer', $data);
    }
    function qr_code()
    {
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
    }
}
