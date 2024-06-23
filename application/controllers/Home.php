<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['main_view'] = 'home_view';
		$this->load->view('template_home_view', $data);
	}
	public function grooming()
	{
		$data['main_view'] = 'grooming_view';
		$this->load->view('template_home_view', $data);
	}
	public function help()
	{
		$data['main_view'] = 'help';
		$this->load->view('template_home_view', $data);
	}
	public function order()
	{
		redirect('order');
	}
}
