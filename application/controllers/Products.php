<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_admin');
			$check = is_login();
			if ($check != 'admin') {
				redirect('login');
			}
	}
	public function index()
	{
		//$data['staffs'] = $this->M_admin->getStaffs();
		$this->load->view('admin/products');
	}

}
