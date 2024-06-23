<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pet extends CI_Controller
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
    $data['pet'] = $this->db->get('tb_pet')->result();
    $data['main_view'] = 'pet/index_view';
    $this->load->view('template_view', $data);
  }
  public function add()
  {
    $data['main_view'] = 'pet/add_view';
    $this->load->view('template_view', $data);
  }
  public function save_add()
  {
    $insert['name'] = $this->input->post('name');
    $this->db->insert('tb_pet', $insert);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Hewan Peliharaan berhasil ditambahkan !</div>');
    redirect('pet');
  }
  public function edit($id_pet)
  {
    $data['pet'] = $this->db->where('id_pet', $id_pet)->get('tb_pet')->row();
    $data['main_view'] = 'pet/edit_view';
    $this->load->view('template_view', $data);
  }
  public function save_edit($id_pet)
  {
    $update['name'] = $this->input->post('name');
    $this->db->where('id_pet', $id_pet)->update('tb_pet', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Hewan Peliharaan berhasil diperbaruhi !</div>');
    redirect('pet');
  }
  public function delete($id_pet)
  {
    // Check Package Grooming Pet
    $package_grooming_pet = $this->db->where('id_pet', $id_pet)->get('tb_package_grooming_pet')->num_rows();
    if ($package_grooming_pet > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Package Grooming tidak bisa dihapus karena masih dipakai di Paket grooming hewan peliharaan !</div>');
      redirect('pet');
    }

    // Check Order
    $package_grooming_pet = $this->db
      ->where('id_pet', $id_pet)
      ->join('tb_order_detail', 'tb_order_detail.id_package_grooming_pet = tb_package_grooming_pet.id_package_grooming_pet')
      ->get('tb_package_grooming_pet')
      ->num_rows();
    if ($package_grooming_pet > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Package Grooming tidak bisa dihapus karena sudah pernah dipesan oleh customer !</div>');
      redirect('pet');
    }

    $this->db->where('id_pet', $id_pet)->delete('tb_pet');

    $this->session->set_flashdata('message', '<div class="alert alert-success">Hewan Peliharaan berhasil dihapus !</div>');
    redirect('pet');
  }
}
