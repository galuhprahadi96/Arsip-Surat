<?php
defined('BASEPATH') or exit('No direct script access allowed');

class konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mkonfig');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('Message', 'Anda belum Log in');
            redirect('admin/login');
        }
    }
    function index($id = 1)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $detail = $this->mkonfig->detail($id = '1');
        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Konfigurasi',
                'isi'   => 'admin/konfig/list',
                'detail'  => $detail,
                'konfig' => $konfig,
                'userdata' => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'title_website' => $this->input->post('title', TRUE),
                'about' => $this->input->post('about', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'contact' => $this->input->post('contact', TRUE),

            );
            $this->mkonfig->edit($data, $id);
            $this->session->set_flashdata('success', 'konfigurasi berhasil diterapkan');
            redirect('admin/konfigurasi');
        }
    }

    public function simpan_konfig($id = 1)
    {


        $config['upload_path'] = './assets/admin/upload/instansi_logo/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size']  = '2048';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            $logo = ($this->upload->data('file_name'));
            $data = array(
                'title_website' => $this->input->post('title', TRUE),
                'nama_institusi' => $this->input->post('institusi', TRUE),
                'about' => $this->input->post('about', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'contact' => $this->input->post('contact', TRUE),
                'logo'        => $logo
            );
            $this->mkonfig->edit($data, $id);
            $this->session->set_flashdata('success', 'Konfigurasi Berhasil Di Terapkan !');
            redirect('admin/konfigurasi');
        } else {
            $data = array(
                'title_website' => $this->input->post('title', TRUE),
                'nama_institusi' => $this->input->post('institusi', TRUE),
                'about' => $this->input->post('about', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'contact' => $this->input->post('contact', TRUE),
            );
            $this->mkonfig->edit($data, $id);
            $this->session->set_flashdata('success', 'Konfigurasi Berhasil Di Terapkan !');
            redirect('admin/konfigurasi');
        }
    }
}
