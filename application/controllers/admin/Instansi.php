<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('minstansi');
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
        $instansi = $this->minstansi->listing();
        $this->form_validation->set_rules('nama_instansi', 'nama_instansi', 'required|trim');

        if ($this->form_validation->run() == False) {

            $data = array(

                'title' => 'Data Instansi',
                'konfig' => $konfig,
                'instansi' => $instansi,
                'userdata'  => $userdata,
                'isi' => 'admin/instansi/list'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'nama_instansi' => $this->input->post('nama_instansi', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );
            $this->minstansi->add($data, 'instansi');
            $this->session->set_flashdata('success', 'instansi berhasil ditambahkan');
            redirect('admin/instansi');
        }
    }
    function edit($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $instansi = $this->minstansi->detail($id);
        $this->form_validation->set_rules('nama_instansi', 'nama_instansi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Edit Instansi',
                'isi'   => 'admin/instansi/edit',
                'instansi'  => $instansi,
                'konfig' => $konfig,
                'userdata'  => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'nama_instansi' => $this->input->post('nama_instansi', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );
            $this->minstansi->edit($data, $id);
            $this->session->set_flashdata('success', 'Instansi berhasil di edit');
            redirect('admin/instansi');
        }
    }
    function hapus($id)
    {
        $data = array('id_instansi' => $id);
        $this->minstansi->delete($data);
        $this->session->set_flashdata('success', 'instansi berhasil di hapus');
        redirect('admin/instansi');
    }
}
