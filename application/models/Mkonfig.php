<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mkonfig extends Ci_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function detail($id)
    {
        $query = $this->db->get_where('konfigurasi', array('id' => $id));
        return $query->row();
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('konfigurasi', $data);
    }
}
