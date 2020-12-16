<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mpengajuan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //tampil semua data
    function listing()
    {
        $this->db->select('pengajuan.*, instansi.nama_instansi');
        $this->db->from('pengajuan');
        // Join
        $this->db->join('instansi', 'instansi.id_instansi = pengajuan.id_instansi', 'LEFT');
        // End join
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('id_instansi', 'ASC');
        $this->db->order_by('tgl_terima', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //detail data per id
    public function detail($id)
    {
        $query = $this->db->get_where('pengajuan', array('id_pengajuan' => $id));
        return $query->row();
    }

    //edit data
    public function edit($data, $id)
    {
        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan', $data);
    }

    //tampil data yang memiliki status 1
    function proses()
    {
        $this->db->select('pengajuan.*, instansi.nama_instansi');
        $this->db->from('pengajuan');
        // Join
        $this->db->join('instansi', 'instansi.id_instansi = pengajuan.id_instansi', 'LEFT');
        // End join
        $this->db->where('status', '3');
        $this->db->order_by('tgl_terima', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //tampil data yang memiliki status 2
    function selesai()
    {
        $this->db->select('pengajuan.*, instansi.nama_instansi');
        $this->db->from('pengajuan');
        // Join
        $this->db->join('instansi', 'instansi.id_instansi = pengajuan.id_instansi', 'LEFT');
        // End join
        $this->db->where('status', '2');
        $this->db->order_by('id_instansi', 'ASC');
        $this->db->order_by('tgl_terima', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    //tambah data
    function add($data)
    {
        $this->db->insert('pengajuan', $data);
    }


    // hapus data pengajuan
    public function delete($data)
    {
        $this->db->where('id_pengajuan', $data['id_pengajuan']);
        $this->db->delete('pengajuan', $data);
    }
}
