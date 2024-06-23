<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
      redirect(base_url('profile'));
    }
		$this->load->view('login_view');
	}
	public function process()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Check User By Email
		$user = $this->db->where('email', $email)->get('tb_user')->row();
		if ($user == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Pengguna tidak ditemukan !</div>');
			redirect('login');
			//set flashdata session yang hanya bersifat sementara
		}

		// Invalid Password
		if ($this->bcrypt->check_password($password, $user->password) == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah !</div>');
			redirect('login');
			//bcrypt algoritma bawaan untuk melakukan hash yaitu menggunakan BCRYPT dan akan 
			//menghasilkan output sepanjang 60 karakter.

		}

		// Set Session
		$sess_data['logged_in'] = TRUE;
		$sess_data['id_user'] = $user->id_user;
		$sess_data['role'] = $user->role;
		$this->session->set_userdata($sess_data);

		if ($user->role == 'admin') {
			redirect('dashboard');
		} else {
			redirect('home');
		}
	}

	public function logout()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->session->sess_destroy();
			redirect('login');
		} else {
			redirect('login');
		}
	}
}
