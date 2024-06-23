<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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

    $order = $this->db
      ->select('tb_order.*,tb_user.nama_depan,nama_tengah,nama_belakang, tb_user.no_hp, SUM(tb_package_grooming_pet.price) as package_grooming_pet_price, tb_delivery_cost.id_delivery_cost , tb_delivery_cost.place as delivery_cost_place, tb_delivery_cost.price as delivery_cost_price, GROUP_CONCAT(DISTINCT  tb_package_grooming.title SEPARATOR ",") as package_grooming_title, GROUP_CONCAT(DISTINCT  tb_pet.name SEPARATOR ",") as pet_name');
    if ($this->session->role == 'user') {
      $order = $this->db
        ->where('tb_order.id_user', $this->session->id_user);
    }

    $order = $this->db
      ->join('tb_order_detail', 'tb_order_detail.id_order = tb_order.id_order')
      ->join('tb_package_grooming_pet', 'tb_package_grooming_pet.id_package_grooming_pet = tb_order_detail.id_package_grooming_pet')
      ->join('tb_package_grooming', 'tb_package_grooming.id_package_grooming = tb_package_grooming_pet.id_package_grooming')
      ->join('tb_pet', 'tb_pet.id_pet = tb_package_grooming_pet.id_pet')
      ->join('tb_delivery_cost', 'tb_delivery_cost.id_delivery_cost = tb_order.id_delivery_cost', 'left')
      ->join('tb_user', 'tb_user.id_user = tb_order.id_user')
      ->group_by('tb_order_detail.id_order')
      ->get('tb_order')
      ->result();
      // print_r($order);
    $data['order'] = $order;
    $data['main_view'] = 'order/index_view';
    $this->load->view('template_view', $data);
  }
  public function add($id_package_grooming = '')
  {
    $data['id_package_grooming'] = $id_package_grooming;
    $data['package_grooming'] = $this->db->get('tb_package_grooming')->result();
    $data['pet'] = $this->db->get('tb_pet')->result();
    $data['delivery_cost'] = $this->db->get('tb_delivery_cost')->result();
    $data['main_view'] = 'order/add_view';
    $this->load->view('template_view', $data);
  }
  public function get_package_grooming_pet($id_package_grooming = '')
  {
    $data = $this->db->where('id_package_grooming', $id_package_grooming)->join('tb_pet', 'tb_pet.id_pet = tb_package_grooming_pet.id_pet')->get('tb_package_grooming_pet')->result();
    echo json_encode($data);
  }
  public function save_add()
  {


    // Upload File
    $destination_path = 'uploads/image_pet/';
    $config['upload_path'] = './' . $destination_path;
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image')) {
      $fileData = $this->upload->data();
      $insert['image'] = $destination_path . $fileData['file_name'];
    }

    $insert['id_user'] = $this->session->id_user;
    $insert['id_delivery_cost'] = $this->input->post('id_delivery_cost');
    $insert['notes'] = $this->input->post('notes');
    $insert['status'] = "didaftarkan";
    $this->db->insert('tb_order', $insert);
    $id_order = $this->db->insert_id();

    $id_package_grooming_pet = $this->input->post('id_package_grooming_pet');
    for ($i = 0; $i < count($id_package_grooming_pet); $i++) {
      $insert_order_detail['id_order'] = $id_order;
      $insert_order_detail['id_package_grooming_pet'] = $id_package_grooming_pet[$i];
      $this->db->insert('tb_order_detail', $insert_order_detail);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success">Pesanan berhasil ditambahkan !</div>');
    redirect('order');
  }
  public function update_order($status, $id_order)
  {
    $update['status'] = $status;
    $this->db->where('id_order', $id_order)->update('tb_order', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Pesanan berhasil diperbaruhi !</div>');
    redirect('order');
  }
}
