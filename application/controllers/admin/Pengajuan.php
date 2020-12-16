<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mpengajuan');
        $this->load->model('minstansi');
        $this->load->model('mkonfig');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('Message', 'Anda belum Log in');
            redirect('admin/login');
        }
    }

    function index()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $pengajuan = $this->mpengajuan->selesai();
        $instansi = $this->minstansi->listing();
        $konfig = $this->mkonfig->listing();

        $data = array(
            'title' => 'Data Pengajuan',
            'userdata'  => $userdata,
            'pengajuan' => $pengajuan,
            'instansi' => $instansi,
            'konfig' => $konfig,
            'isi'   => 'admin/pengajuan/selesai/tampil'
        );
        $this->load->view('admin/template/wrapper', $data);
    }


    function baru()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $pengajuan = $this->mpengajuan->proses();
        $instansi = $this->minstansi->listing();
        $konfig = $this->mkonfig->listing();

        $this->form_validation->set_rules('id_instansi', 'id_instansi', 'required|trim');
        $this->form_validation->set_rules('jdl_pengajuan', 'jdl_pengajuan', 'required|trim');
        $this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required|trim');
        $this->form_validation->set_rules('pen_disposisi', 'pen_disposisi', 'required|trim');

        if ($this->form_validation->run() == False) {
            $data = array(
                'title' => 'Pengajuan Baru',
                'userdata'  => $userdata,
                'pengajuan' => $pengajuan,
                'instansi' => $instansi,
                'konfig' => $konfig,
                'isi'   => 'admin/pengajuan/proses/tampil_baru'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'id_instansi' => $this->input->post('id_instansi'),
                'jdl_pengajuan' => $this->input->post('jdl_pengajuan', TRUE),
                'tgl_terima'    => $this->input->post('tgl_terima', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'pen_disposisi' => $this->input->post('pen_disposisi', TRUE),
                'status'    => 3
            );
            $this->mpengajuan->add($data, 'pengajuan');
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/pengajuan/baru');
        }
    }

    function edit($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $pengajuan = $this->mpengajuan->detail($id);
        $konfig = $this->mkonfig->listing();
        $instansi = $this->minstansi->listing();


        $this->form_validation->set_rules('pen_disposisi', 'pen_disposisi', 'required|trim');
        $this->form_validation->set_rules('tgl_naik', 'tgl_naik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Data Pengajuan',
                'isi'   => 'admin/pengajuan/selesai/edit',
                'instansi'  => $instansi,
                'pengajuan' => $pengajuan,
                'konfig' => $konfig,
                'userdata'  => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(

                'pen_disposisi'    => $this->input->post('pen_disposisi', TRUE),
                'tgl_naik'    => $this->input->post('tgl_naik', TRUE),
                'status' => 2
            );
            $this->mpengajuan->edit($data, $id);
            $this->session->set_flashdata('success', 'Edit Berhasil');
            redirect('admin/pengajuan');
        }
    }

    function edit_baru($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $peng_baru = $this->mpengajuan->detail($id);
        $konfig = $this->mkonfig->listing();
        $instansi = $this->minstansi->listing();




        $this->form_validation->set_rules('id_instansi', 'id_instansi', 'required|trim');
        $this->form_validation->set_rules('jdl_pengajuan', 'jdl_pengajuan', 'required|trim');
        $this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required|trim');
        $this->form_validation->set_rules('pen_disposisi', 'pen_disposisi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Pengajuan Baru',
                'isi'   => 'admin/pengajuan/proses/edit_baru',
                'instansi'  => $instansi,
                'peng_baru' => $peng_baru,
                'konfig' => $konfig,
                'userdata'  => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'id_instansi' => $this->input->post('id_instansi'),
                'jdl_pengajuan' => $this->input->post('jdl_pengajuan', TRUE),
                'tgl_terima'    => $this->input->post('tgl_terima', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'pen_disposisi' => $this->input->post('pen_disposisi', TRUE),
                'status'    => 3
            );

            $this->mpengajuan->edit($data, $id);
            $this->session->set_flashdata('success', 'Data berhasil di Update');
            redirect('admin/pengajuan/');
        }
    }



    function proses($id)
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $pengajuan = $this->mpengajuan->detail($id);
        $konfig = $this->mkonfig->listing();
        $instansi = $this->minstansi->listing();


        $this->form_validation->set_rules('pen_disposisi', 'pen_disposisi', 'required|trim');
        $this->form_validation->set_rules('tgl_naik', 'tgl_naik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Data Pengajuan',
                'isi'   => 'admin/pengajuan/proses/proses',
                'instansi'  => $instansi,
                'pengajuan' => $pengajuan,
                'konfig' => $konfig,
                'userdata'  => $userdata
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(

                'pen_disposisi'    => $this->input->post('pen_disposisi', TRUE),
                'tgl_naik'    => $this->input->post('tgl_naik', TRUE),
                'status' => 2
            );
            $this->mpengajuan->edit($data, $id);
            $this->session->set_flashdata('success', 'Proses Berhasil');
            redirect('admin/pengajuan/baru');
        }
    }

    function hapus($id)
    {
        $data = array('id_pengajuan' => $id);
        $this->mpengajuan->delete($data);
        $this->session->set_flashdata('success', 'Data berhasil di hapus');
        redirect('admin/pengajuan/baru');
    }

    function cari()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $pengajuan = $this->mpengajuan->selesai();
        $instansi = $this->minstansi->listing();
        $id_instansi = $this->input->post('nama_instansi');
        $tanggal_awal  = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');


        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Data Pengajuan',
                'userdata' => $userdata,
                'konfig' => $konfig,
                'instansi' => $instansi,
                'pengajuan' => $pengajuan,
                'isi'       => 'admin/pengajuan/selesai/tampil'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {

            if ($id_instansi == null) {

                $data = array(
                    'title'     => 'Pengajuan',
                    'userdata' => $userdata,
                    'konfig' => $konfig,
                    'pengajuan' => $pengajuan,
                    'instansi'  => $instansi,
                    'isi'   => 'admin/pengajuan/selesai/tampil_cari',

                    'cari' => $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 2 and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY nama_instansi and tgl_terima ASC")->result_array()

                );
            } else {

                $data = array(
                    'title'     => 'Pengajuan',
                    'userdata' => $userdata,
                    'konfig' => $konfig,
                    'pengajuan' => $pengajuan,
                    'instansi'  => $instansi,
                    'isi'   => 'admin/pengajuan/selesai/tampil_cari',

                    'cari' => $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 2 and nama_instansi = '$id_instansi' and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_terima ASC")->result_array(),
                );
            }

            $this->load->view('admin/template/wrapper', $data);
        }
    }


    function cari_baru()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig = $this->mkonfig->listing();
        $pengajuan = $this->mpengajuan->proses();
        $instansi = $this->minstansi->listing();
        $id_instansi = $this->input->post('nama_instansi');
        $tanggal_awal  = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');


        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Pengajuan Baru',
                'userdata' => $userdata,
                'konfig' => $konfig,
                'instansi' => $instansi,
                'pengajuan' => $pengajuan,
                'isi'       => 'admin/pengajuan/proses/tampil_baru'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {

            if ($id_instansi == null) {

                $data = array(
                    'title'     => 'Pengajuan',
                    'userdata' => $userdata,
                    'konfig' => $konfig,
                    // 'pengajuan' => $pengajuan,
                    'instansi'  => $instansi,
                    'isi'   => 'admin/pengajuan/proses/tampil_cari',

                    'cari' => $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 3 and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY nama_instansi and tgl_terima ASC")->result_array()

                );
            } else {

                $data = array(
                    'title'     => 'Pengajuan Baru',
                    'userdata' => $userdata,
                    'konfig' => $konfig,
                    // 'pengajuan' => $pengajuan,
                    'instansi'  => $instansi,
                    'isi'   => 'admin/pengajuan/proses/tampil_cari',

                    'cari' => $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 3 and nama_instansi = '$id_instansi' and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_terima ASC")->result_array(),
                );
            }

            $this->load->view('admin/template/wrapper', $data);
        }
    }
}
