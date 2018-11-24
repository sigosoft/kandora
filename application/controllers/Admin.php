<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		//$data['users'] = $this->M_admin->getUserDetails();
		$this->load->view('admin/sample');
	}

}
