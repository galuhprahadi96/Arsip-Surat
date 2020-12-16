<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('mpengajuan');
        $this->load->model('minstansi');
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
        $instansi      = $this->minstansi->listing();

        $data = array(
            'title'         => 'Laporan',
            'userdata'      => $userdata,
            'konfig'        => $konfig,
            'instansi'      => $instansi,
            'pengajuan'     => $pengajuan,
            'isi'           => 'admin/laporan/list'
        );
        $this->load->view('admin/template/wrapper', $data);
    }
    function cari()
    {
        $userdata = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $konfig        = $this->mkonfig->listing();
        $pengajuan     = $this->mpengajuan->listing();
        $instansi      = $this->minstansi->listing();

        $nama_instansi = $this->input->post('nama_instansi');
        $tanggal_awal  = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');

        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Laporan',
                'userdata' => $userdata,
                'konfig' => $konfig,
                'pengajuan' => $pengajuan,
                'isi'       => 'admin/laporan/list'
            );
            $this->load->view('admin/template/wrapper', $data);
        } else {
            $data = array(
                'title'     => 'Laporan',
                'userdata'  => $userdata,
                'konfig'    => $konfig,
                'pengajuan' => $pengajuan,
                'instansi'  => $instansi,

                'laporan' => $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 2 and nama_instansi = '$nama_instansi' and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_terima ASC")->result(),
                'isi'   => 'admin/laporan/tampil'
            );
            $this->load->view('admin/template/wrapper', $data);
        }
    }
    public function cetak()
    {
        $nama_instansi  = $this->input->get('nama_instansi');
        $tanggal_awal  = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        if ($nama_instansi != "" && $tanggal_awal != "" && $tanggal_akhir != "") {

            $data['instansi'] = $this->minstansi->listing();
            $data['pengajuan'] = $this->mpengajuan->listing();
            $data['konfig'] = $this->mkonfig->listing();
            $data['laporan'] = $this->db->query("SELECT * FROM pengajuan INNER JOIN instansi ON instansi.id_instansi = pengajuan.id_instansi WHERE status = 2 and nama_instansi = '$nama_instansi' and tgl_terima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_terima ASC")->result();

            $this->load->view('admin/laporan/cetak', $data);
        } else {
            redirect('admin/laporan');
        }
    }
}
