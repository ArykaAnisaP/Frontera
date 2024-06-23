<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
    $data['user'] = $this->db->where('role', 'user')->get('tb_user')->result();
    $data['main_view'] = 'user/index_view';
    $this->load->view('template_view', $data);
  }
}
