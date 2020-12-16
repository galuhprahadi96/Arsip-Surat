<?php
defined('BASEPATH') or exit('No direct script access allowed');

class navigasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mnavigasi');
        $this->load->model('mkonfig');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('Message', 'Anda belum Log in');
            redirect('admin/login');
        }
    }

    public function index()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $navigasi = $this->mnavigasi->listing();
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('url', 'url', 'required|trim');
        $this->form_validation->set_rules('icon', 'icon', 'required|trim');

        if ($this->form_validation->run() == False) {

            $data = array(
                // 'user' => $this->db->get_where('profile', ['email' => $this->session->userdata('email')])->row_array(),

                'title' => 'Navigasi',
                'userdata'  => $userdata,
                'navigasi' => $navigasi,
                'konfig' => $konfig,
                'isi' => 'admin/navigasi/list'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
                'icon' => $this->input->post('icon', TRUE),
                'urutan' => $this->input->post('urutan', TRUE),
                'is_active' => 1,
            );
            $this->mnavigasi->add($data, 'subnavigasi');
            $this->session->set_flashdata('Success', 'Navigasi berhasil ditambahkan');
            redirect('admin/navigasi');
        }
    }
    function edit($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $navigasi = $this->mnavigasi->detail($id);
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Edit Navigasi',
                'isi'   => 'admin/navigasi/edit',
                'navigasi'  => $navigasi,
                'konfig' => $konfig,
                'userdata'  => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
                'icon' => $this->input->post('icon', TRUE),
                'urutan' => $this->input->post('urutan', TRUE),
                'is_active' => $this->input->post('is_active', TRUE),
            );
            $this->mnavigasi->edit($data, $id);
            $this->session->set_flashdata('success', 'navigasi berhasil di edit');
            redirect('admin/navigasi');
        }
    }
    function hapus($id)
    {
        $data = array('id_subnavigasi' => $id);
        $this->mnavigasi->delete($data);
        $this->session->set_flashdata('success', 'navigasi berhasil di hapus');
        redirect('admin/navigasi');
    }
}
