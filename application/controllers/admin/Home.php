<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'home',
            'isi'   => 'admin/home/list'
        );
        $this->load->view('admin/template/test');
    }
}
