<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends Ci_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mprofile');
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
        $user = $this->mprofile->list();
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == False) {

            $data = array(

                'title' => 'Data User',
                'userdata'  => $userdata,
                'user' => $user,
                'konfig' => $konfig,
                'isi' => 'admin/user/list'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            $this->mprofile->add($data, 'user');
            $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            redirect('admin/user');
        }
    }
    function edit($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $user = $this->mprofile->detail($id);
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Edit user',
                'user'  => $user,
                'userdata'  => $userdata,
                'konfig' => $konfig,
                'isi'   => 'admin/user/edit'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'name'      => $this->input->post('name', true),
                'username'  => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            // var_dump($data);
            $this->mprofile->edit($data, $id);
            $this->session->set_flashdata('success', 'User berhasil di update');
            redirect('admin/user');
        }
    }
    function delete($id)
    {
        $data = array('id_user' => $id);
        $this->mprofile->delete($data);
        $this->session->set_flashdata('success', 'User berhasil di Hapus');
        redirect('admin/user');
    }
}
