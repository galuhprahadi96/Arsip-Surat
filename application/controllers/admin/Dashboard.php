<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends Ci_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mpengajuan');
        $this->load->model('mkonfig');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('Message', 'Anda belum Log in');
            redirect('admin/login');
        }
    }

    function index()
    {

        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $pengajuan = $this->mpengajuan->listing();
        $proses = $this->mpengajuan->proses();
        $selesai = $this->mpengajuan->selesai();

        $data = array(
            'title' => 'Dashboard',
            'isi'   => 'admin/home/list',
            'userdata'  => $userdata,
            'proses' => $proses,
            'konfig' => $konfig,
            'pengajuan' => $pengajuan,
            'selesai' => $selesai
        );
        $this->load->view('admin/template/wrapper', $data);
    }
}
