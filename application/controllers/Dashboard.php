<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  // construct membuat proses awal dalam mempersiapkan objek, seperti memberi nilai awal kepada property, 
  // memanggil method internal dan beberapa proses lainnya yang digunakan untuk mempersiapkan objek.
  public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {			
			redirect('login');
			//redirect mangalihkan user dari satu halaman ke halaman lainnya.
		}
	}
	public function index()
	{
    $data['main_view'] = 'dashboard_view';
		$this->load->view('template_view', $data);
	}
}
