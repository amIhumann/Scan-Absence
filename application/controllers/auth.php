<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('m_user');
        $this->load->model('m_jurusan');
        $this->load->model('m_sekolah');
        $this->load->model('m_perusahaan');
    }
	public function index()
	{
        $this->form_validation->set_rules('email_user','email','trim|required');
        $this->form_validation->set_rules('pwd_user','Password','trim|required');
        if($this->form_validation->run()==false){
            $data['title'] = 'Login';
            $this->load->view('auth/header',$data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
        else{
            $this->_login();
        }
    }
    private function _login(){
        $email = $this->input->post('email_user');
        $password = $this->input->post('pwd_user');

        $user = $this->db->get_where('user',['email_user'=>$email])->row_array();
       
        if($user){
            if($user['kondisi'] == 1){
                if($password==$user['pwd_user']){
                    $data = array(
                        'id_user'=>$user['id_user'],
                        'id_jurusan'=>$user['id_jurusan'],
                        'id_sekolah'=>$user['id_sekolah'],
                        'email_user'=>$user['email_user'],
                        'nama_user'=>$user['nama_user'],
                        'level_user'=>$user['level_user'],
                    );
                    $this->session->set_userdata($data);
                    redirect('user');
                }
                else{
                    $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
                   Password Salah!
                  </div>');
                  redirect('auth');
                }
            }
            else{
                $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
            Email Belum Aktif!
          </div>');
          redirect('auth');
            }
        }
        else{
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
            Email Tidak Ada!
          </div>');
          redirect('auth');
        }
    }
    public function register()
    {
         $this->form_validation->set_rules('nama_user','name','required|trim');
         $this->form_validation->set_rules('email_user','email','required|trim|valid_email|is_unique[user.email_user]', [
             'is_unique' => 'Email Telah Terdaftar!'
         ]);
         $this->form_validation->set_rules('nis','nis','required|trim|min_length[4]|is_unique[user.nis]', [
            'is_unique' => 'NIS telah digunakan!'
        ]);
         $this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]', [
             'matches' => 'Password tidak sama!',
             'min_length' => 'Password terlalu pendek'
         ]);
         $this->form_validation->set_rules('password2','password','required|trim|min_length[3]|matches[password1]');
         
        if($this->form_validation->run()==false){
            $data['title'] = 'Login';
            $data['sekolah']=$this->m_sekolah->read_data()->result();
            $data['perusahaan']=$this->m_perusahaan->read_data()->result();
            $data['jurusan']=$this->m_jurusan->read_data()->result();
            $this->load->view('auth/header',$data);
            $this->load->view('auth/register',$data);
            $this->load->view('auth/footer');
        }
        else{
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
                'email_user' => htmlspecialchars($this->input->post('email_user',true)),
                'pwd_user' =>$this->input->post('password1'),
                'nama_user' => htmlspecialchars($this->input->post('nama_user',true)),
                'foto' => $foto,
                'kondisi' => '1',
                'nis' => htmlspecialchars($this->input->post('nis',true)),
                'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan',true)),
                'id_sekolah' =>htmlspecialchars($this->input->post('id_sekolah',true)),
                'id_perusahaan' => htmlspecialchars($this->input->post('id_perusahaan',true)),
                'level_user' => 'Siswa',
            );
            $this->m_user->input_data($data, 'user'); 
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Akun Berhasil Ditambahkan
          </div>');
            redirect('auth/index');
        }
    }
    public function logout(){
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_jurusan');
        $this->session->unset_userdata('id_sekolah');
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('level_user');

        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
            Kamu Telah Logout
          </div>');
        redirect('auth');
    }
    public function block(){
        $this->load->view('block');
    }
}