<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package_grooming_pet extends CI_Controller
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
    $data['package_grooming_pet'] = $this->db->select('tb_package_grooming_pet.id_package_grooming_pet, tb_package_grooming_pet.price ,tb_pet.name as pet_name, tb_package_grooming.title as package_grooming_title')
      ->join('tb_pet', 'tb_pet.id_pet = tb_package_grooming_pet.id_pet')
      ->join('tb_package_grooming', 'tb_package_grooming.id_package_grooming = tb_package_grooming_pet.id_package_grooming')
      ->get('tb_package_grooming_pet')->result();
    $data['main_view'] = 'package_grooming_pet/index_view';
    $this->load->view('template_view', $data);
  }
  public function add()
  {
    $data['package_grooming'] = $this->db->get('tb_package_grooming')->result();
    $data['pet'] = $this->db->get('tb_pet')->result();
    $data['main_view'] = 'package_grooming_pet/add_view';
    $this->load->view('template_view', $data);
  }
  public function save_add()
  {
    $id_package_grooming = $this->input->post('id_package_grooming');
    $id_pet = $this->input->post('id_pet');
    $price = $this->input->post('price');

    // Check Duplicate
    $check_duplicate = $this->db->where('id_package_grooming', $id_package_grooming)->where('id_pet', $id_pet)->get('tb_package_grooming_pet')->num_rows();
    if ($check_duplicate > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data sudah pernah dibuat !</div>');
      redirect('package_grooming_pet');
    }

    $insert['id_package_grooming'] = $id_package_grooming;
    $insert['id_pet'] = $id_pet;
    $insert['price'] = $price;
    $this->db->insert('tb_package_grooming_pet', $insert);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Harga grooming berhasil ditambahkan !</div>');
    redirect('package_grooming_pet');
  }
  public function edit($id_package_grooming_pet)
  {
    $data['package_grooming_pet'] = $this->db->where('id_package_grooming_pet', $id_package_grooming_pet)->get('tb_package_grooming_pet')->row();
    $data['package_grooming'] = $this->db->get('tb_package_grooming')->result();
    $data['pet'] = $this->db->get('tb_pet')->result();
    $data['main_view'] = 'package_grooming_pet/edit_view';
    $this->load->view('template_view', $data);
  }
  public function save_edit($id_package_grooming_pet)
  {
    $id_package_grooming = $this->input->post('id_package_grooming');
    $id_pet = $this->input->post('id_pet');
    $price = $this->input->post('price');

    // Check Duplicate
    $check_duplicate = $this->db->where('id_package_grooming_pet !=', $id_package_grooming_pet)->where('id_package_grooming', $id_package_grooming)->where('id_pet', $id_pet)->get('tb_package_grooming_pet')->num_rows();
    if ($check_duplicate > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data sudah pernah dibuat !</div>');
      redirect('package_grooming_pet');
    }

    $update['id_package_grooming'] = $id_package_grooming;
    $update['id_pet'] = $id_pet;
    $update['price'] = $price;
    $this->db->where('id_package_grooming_pet', $id_package_grooming_pet)->update('tb_package_grooming_pet', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Harga grooming berhasil diperbaruhi !</div>');
    redirect('package_grooming_pet');
  }
  public function delete($id_package_grooming_pet)
  {
    // Check Order
    $package_grooming_pet = $this->db
      ->where('id_package_grooming', $id_package_grooming_pet)
      ->join('tb_order_detail', 'tb_order_detail.id_package_grooming_pet = tb_package_grooming_pet.id_package_grooming_pet')
      ->get('tb_package_grooming_pet')
      ->num_rows();
    if ($package_grooming_pet > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Harga Grooming tidak bisa dihapus karena sudah pernah dipesan oleh customer !</div>');
      redirect('package_grooming_pet');
    }

    $this->db->where('id_package_grooming_pet', $id_package_grooming_pet)->delete('tb_package_grooming_pet');

    $this->session->set_flashdata('message', '<div class="alert alert-success">Harga grooming berhasil dihapus !</div>');
    redirect('package_grooming_pet');
  }
}
