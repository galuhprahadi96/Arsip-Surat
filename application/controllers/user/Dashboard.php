<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends Ci_controller
{

    function index()
    {

        $data = array(
            'title' => 'Dashboard',
            'isi'   => 'admin/home/list',
        );
        $this->load->view('admin/template/wrapper', $data);
    }
}
