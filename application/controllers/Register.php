<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('logged_in') == TRUE) {
      redirect(base_url('profile'));
    }
    $this->load->view('register_view');
  }
  public function save()
  {
    // Check Email
    $check_email = $this->db->where('email', $this->input->post('email'))->get('tb_user')->row();
    if ($check_email != '') {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Email sudah terdaftar !</div>');
      redirect('register');
    }

    // Insert Database
    $data['nama_depan'] = $this->input->post('nama_depan');
    $data['nama_tengah'] = $this->input->post('nama_tengah');
    $data['nama_belakang'] = $this->input->post('nama_belakang');
    $data['no_hp'] = $this->input->post('no_hp');
    $data['address'] = $this->input->post('address');
    $data['email'] = $this->input->post('email');
    $data['password'] = $this->bcrypt->hash_password($this->input->post('password'));
    $data['role'] = 'user';
    $this->db->insert('tb_user', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat anda berhasil terdaftar, silahkan login !</div>');
    redirect('login');
  }
  public function admin()
  {
    // Insert Admin
    $data['nama_depan'] = 'admin';
    $data['nama_tengah'] = 'admin';
    $data['nama_belakang'] = 'admin';
    $data['no_hp'] = 'admin';
    $data['address'] = '';
    $data['email'] = 'admin@gmail.com';
    $data['role'] = 'admin';
    $data['password'] = $this->bcrypt->hash_password('admin');
    $this->db->insert('tb_user', $data);
    echo 'Created Successfully';
  }
}
