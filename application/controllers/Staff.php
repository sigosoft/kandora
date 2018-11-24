<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_admin');
			$check = is_login();
			if ($check != 'staff') {
				redirect('login');
			}
	}
	public function index()
	{
		$data['orders'] = $this->M_admin->getOrders();
		$this->load->view('staff/orders',$data);
	}

}
