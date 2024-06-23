<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_cost extends CI_Controller {
  public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {			
			redirect('login');
		}
	}
	public function index()
	{
    $data['delivery_cost'] = $this->db->get('tb_delivery_cost')->result();
    $data['main_view'] = 'delivery_cost/index_view';
		$this->load->view('template_view', $data);
	}
  public function add()
  {
    $data['main_view'] = 'delivery_cost/add_view';
		$this->load->view('template_view', $data);
  }
  public function save_add()
  { 
    $insert['place'] = $this->input->post('place');
    $insert['price'] = $this->input->post('price');
    $this->db->insert('tb_delivery_cost', $insert);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Biaya antar jemput berhasil ditambahkan !</div>');
    redirect('delivery_cost');
  }
  public function edit($id_delivery_cost)
  {
    $data['delivery_cost'] = $this->db->where('id_delivery_cost', $id_delivery_cost)->get('tb_delivery_cost')->row();
    $data['main_view'] = 'delivery_cost/edit_view';
		$this->load->view('template_view', $data);
  }
  public function save_edit($id_delivery_cost)
  {
    $update['place'] = $this->input->post('place');
    $update['price'] = $this->input->post('price');
    $this->db->where('id_delivery_cost', $id_delivery_cost)->update('tb_delivery_cost', $update);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Biaya antar jemput berhasil diperbaruhi !</div>');
    redirect('delivery_cost');
  }
  public function delete($id_delivery_cost)
  { 
    // Check Order
    $package_grooming_delivery_cost = $this->db
    ->where('id_delivery_cost', $id_delivery_cost)
    ->get('tb_order')
    ->num_rows();
    if($package_grooming_delivery_cost > 0){
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Biaya antar jemput tidak bisa dihapus karena sudah pernah dipesan oleh customer !</div>');
      redirect('delivery_cost');
    }

    $this->db->where('id_delivery_cost', $id_delivery_cost)->delete('tb_delivery_cost');

    $this->session->set_flashdata('message', '<div class="alert alert-success">Biaya antar jemput berhasil dihapus !</div>');
    redirect('delivery_cost');
  }
}
