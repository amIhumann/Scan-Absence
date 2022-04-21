<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_map');
    }
    public function index()
    {
        $data['title'] = 'Map';
        $data['users'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['user'] = $this->m_user->read_data()->result();

        $this->load->view('template/sidebar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('v_mapp');
        $this->load->view('template/footer', $data);
    }
    public function add()
    {
        $data = [
            'latitude' => $this->input->post('latitude'),
            'longtitude' => $this->input->post('longtitude')
        ];
        $this->m_map->create($data, 'map');
        redirect('map');
    }
}
