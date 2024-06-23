<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package_grooming extends CI_Controller
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
    $data['package_grooming'] = $this->db->get('tb_package_grooming')->result();
    $data['main_view'] = 'package_grooming/index_view';
    $this->load->view('template_view', $data);
  }
  public function add()
  {
    $data['main_view'] = 'package_grooming/add_view';
    $this->load->view('template_view', $data);
  }
  public function save_add()
  {
    // Upload File
    $destination_path = 'uploads/package_grooming/';
    $config['upload_path'] = './' . $destination_path;
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image')) {
      $fileData = $this->upload->data();
      $insert['image'] = $destination_path . $fileData['file_name'];
    }

    $insert['title'] = $this->input->post('title');
    $this->db->insert('tb_package_grooming', $insert);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Paket grooming berhasil ditambahkan !</div>');
    redirect('package_grooming');
    //redirect mangalihkan user dari satu halaman ke halaman lainnya.
  }
  public function edit($id_package_grooming)
  {
    $data['package_grooming'] = $this->db->where('id_package_grooming', $id_package_grooming)->get('tb_package_grooming')->row();
    $data['main_view'] = 'package_grooming/edit_view';
    $this->load->view('template_view', $data);
  }
  public function save_edit($id_package_grooming)
  {
    // Upload File
    $destination_path = 'uploads/package_grooming/';
    $config['upload_path'] = './' . $destination_path;
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image')) {
      $fileData = $this->upload->data();
      $update['image'] = $destination_path . $fileData['file_name'];
    }
    $update['title'] = $this->input->post('title');
    $this->db->where('id_package_grooming', $id_package_grooming)->update('tb_package_grooming', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Paket grooming berhasil diperbaruhi !</div>');
    redirect('package_grooming');
  }
  public function delete($id_package_grooming)
  {
    // Check Package Grooming Pet
    $package_grooming_pet = $this->db->where('id_package_grooming', $id_package_grooming)->get('tb_package_grooming_pet')->num_rows();
    if ($package_grooming_pet > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Package Grooming tidak bisa dihapus karena masih dipakai di paket grooming hewan peliharaan !</div>');
      redirect('package_grooming');
    }

    // Check Order
    $package_grooming_pet = $this->db
      ->where('id_package_grooming', $id_package_grooming)
      ->join('tb_order_detail', 'tb_order_detail.id_package_grooming_pet = tb_package_grooming_pet.id_package_grooming_pet')
      ->get('tb_package_grooming_pet')
      ->num_rows();
    if ($package_grooming_pet > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Package Grooming tidak bisa dihapus karena sudah pernah dipesan oleh customer !</div>');
      redirect('package_grooming');
    }

    $this->db->where('id_package_grooming', $id_package_grooming)->delete('tb_package_grooming');

    $this->session->set_flashdata('message', '<div class="alert alert-success">Paket grooming berhasil dihapus !</div>');
    redirect('package_grooming');
  }
}
