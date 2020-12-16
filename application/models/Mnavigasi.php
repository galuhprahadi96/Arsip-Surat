<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mnavigasi extends Ci_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('subnavigasi');
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id)
    {
        $query = $this->db->get_where('subnavigasi', array('id_subnavigasi' => $id));
        return $query->row();
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete($data)
    {
        $this->db->where('id_subnavigasi', $data['id_subnavigasi']);
        $this->db->delete('subnavigasi', $data);
    }

    public function edit($data, $id)
    {
        $this->db->where('id_subnavigasi', $id);
        $this->db->update('subnavigasi', $data);
    }
}
