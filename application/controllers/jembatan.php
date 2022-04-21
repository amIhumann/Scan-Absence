<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jembatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jembatan');
        who();
    }
    public function index()
    {
        $this->m_jembatan->getAll();
        $this->load->view('v_map');
    }
    public function add()
    {
        $data = [
            'nama_jembatan' => $this->input->post('nama_jembatan'),
            'x_jembatan' => $this->input->post('x_jembatan'),
            'y_jembatan' => $this->input->post('y_jembatan'),
            'keterangan_jembatan' => $this->input->post('keterangan_jembatan')
        ];
        $this->m_jembatan->create($data, 'jembatan');
    }
    public function tampil($id)
    {
        $this->m_jembatan->read($id);
    }
    public function perbarui($id)
    {
        $data = [
            'nama_jembatan' => $this->input->post('nama_jembatan'),
            'x_jembatan' => $this->input->post('x_jembatan'),
            'y_jembatan' => $this->input->post('y_jembatan'),
            'keterangan_jembatan' => $this->input->post('keterangan_jembatan')
        ];
        $this->m_jembatan->update($id, $data);
    }
    public function hapus($id)
    {
        $this->m_jembatan->delete($id);
    }
}
