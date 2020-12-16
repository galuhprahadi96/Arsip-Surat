<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends Ci_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mkonfig');
	}
	public function index()
	{
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Login Page';
			$data['konfig'] =  $this->mkonfig->listing();
			$this->load->view('admin/login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		//jika username ada
		if ($user) {
			if (password_verify($password, $user['password'])) {
				//password sama
				$data = array(
					'name'	   => $user['name'],
					'username' => $user['username']
				);

				$this->session->set_userdata($data);
				$this->session->set_flashdata('success', 'selamat datang di dashboard');
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('Message', 'Password yang anda masukkan salah');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('Message', 'Username/Password salah');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('Message', 'Terimakasi anda berhasil log out');
		redirect('login');
	}
}
