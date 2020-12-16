<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mprofile extends Ci_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('user');
        $profile = $this->db->get();

        return $profile->result_array();
    }

    public function detail($id)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row();
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }
}
