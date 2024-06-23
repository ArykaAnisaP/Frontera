<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') != TRUE) {
      redirect('login');
    }
  }
  public function index()
  {
    $data['user'] = $this->db->where('id_user', $this->session->id_user)->get('tb_user')->row();
    $data['main_view'] = 'profile_view';
    $this->load->view('template_view', $data);
  }
  public function save()
  {
    // Upload File
    $destination_path = 'uploads/avatar/';
    $config['upload_path'] = './' . $destination_path;
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('avatar')) {
      $fileData = $this->upload->data();
      $update['avatar'] = $destination_path . $fileData['file_name'];
    }
    $update['nama_depan,nama_tengah,nama_belakang'] = $this->input->post('nama_depan,nama_tengah,nama_belakang');
    $update['no_hp'] = $this->input->post('no_hp');
    $update['address'] = $this->input->post('address');
    $this->db->where('id_user', $this->session->id_user)->update('tb_user', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diperbaruhi !</div>');
    redirect('profile');
  }
}
