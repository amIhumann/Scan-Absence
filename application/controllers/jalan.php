<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jalan');
        $this->load->library('googlemaps');
        who();
    }
    public function index()
    {
        $config = array();
        $config['center'] = "-7.448801088477203, 112.6813640578981";
        $config['zoom'] = 17;
        $config['map_width'] = "100%";
        $config['map_height'] = "400px";
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = "-7.448801088477203, 112.6813640578981";
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $data['itemJalan'] = $this->m_jalan->getAll();
        $this->load->view('v_map', $data);
    }
    public function add()
    {
        // if (!$this->input->is_ajax_request()) {
        //     show_404();
        // } else {
        //     $this->form_validation->set_rules('nama_jalan', 'Nama_Jalan', 'trim|required');
        //     $this->form_validation->set_rules('keterangan_jalan', 'Keterangan_Jalan', 'trim|required');
        //     if ($this->form_validation->run() == false) {
        //         $status = 'error';
        //         $msg = validation_errors();
        //     } else {
        //         if ($this->m_jalan->create()) {
        //             $status = 'success';
        //             $msg = 'oke ,datanya ga null';
        //         } else {
        //             $status = 'error';
        //             $msg = 'errrorr';
        //         }
        //     }
        //     $this->output->set_content_type('application/json')->set_output(json_encode(['status' => $status, 'msg' => $msg]));
        // }
        $data = [
            'nama_jalan' => $this->input->post('nama_jalan'),
            'latitude' => $this->input->post('latitude'),
            'longtitude' => $this->input->post('longtitude'),
            'keterangan_jalan' => $this->input->post('keterangan_jalan')
        ];
        $this->m_jalan->create($data, 'jalan');
        redirect('jalan');
    }
    public function tampil($id)
    {
        $this->m_jalan->read($id);
    }
    // public function edit($id)
    // {
    //     $data['itemJalan'] = $this->m_jalan->getAll();
    //     $data['jalan'] =  $this->m_jalan->edit(['id_jalan' => $id], 'jalan')->result();
    //     $this->load->view('v_map', $data);
    // }
    public function perbarui($id)
    {
        $data = [
            'nama_jalan' => $this->input->post('nama_jalan'),
            'x_jalan' => $this->input->post('x_jalan'),
            'y_jalan' => $this->input->post('y_jalan'),
            'keterangan_jalan' => $this->input->post('keterangan_jalan')
        ];
        $this->m_jalan->update($id, $data);
    }
    public function hapus($id)
    {
        $this->m_jalan->delete($id);
        redirect('jalan');
    }
    public function map()
    {
    }
}
