<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('form_validation');
        $this->load->model('mkonfig');
    }

    public function index()
    {
        $data['konfig'] = $this->mkonfig->listing();
        $this->load->view('login', $data);
    }

    public function cek_auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->auth_model->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id_user'        => $row->id_user,
                    'username'        => $row->username,
                    'nama'            => $row->nama,
                    'id_instansi'            => $row->id_instansi,
                    'level'        => $row->level,
                    'status_login' => TRUE
                );
                $this->session->set_userdata($sess_array);
                $this->session->set_flashdata('success', 'Selamat Datang di Sistem Arsip Surat !');
                redirect('user/dashboard', 'refresh');
            }
            return TRUE;
        } else {
            redirect('login', 'refresh');
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('status_login');
        $this->session->set_flashdata('notif', 'ANDA SUDAH KELUAR');
        redirect('auth');
    }
}
