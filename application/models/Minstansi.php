<?php
defined('BASEPATH') or exit('No direct script access allowed');

class minstansi extends Ci_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('instansi');
        $this->db->order_by('id_instansi', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id)
    {
        $query = $this->db->get_where('instansi', array('id_instansi' => $id));
        return $query->row();
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit($data, $id)
    {
        $this->db->where('id_instansi', $id);
        $this->db->update('instansi', $data);
    }


    public function delete($data)
    {
        $this->db->where('id_instansi', $data['id_instansi']);
        $this->db->delete('instansi', $data);
    }
}
