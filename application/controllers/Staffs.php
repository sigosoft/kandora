<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffs extends CI_Controller {
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
		$data['staffs'] = $this->M_admin->getStaffs();
		$this->load->view('admin/staffs',$data);
	}
	public function add()
	{
		$data = $this->input->post();
		$profile = [
			'name' => $data['name'],
			'mobile' => $data['mobile'],
			'email' => $data['email'],
			'location' => $data['location'],
			'status' => $data['status'],
			'role' => $data['role'],
			'type' => 'staff'
		];
		if ($id = $this->Common->insert('profile',$profile)) {
			$auth = [
				'username' => $data['username'],
				'password' => md5($data['password']),
				'profile_id' => $id
			];
			if ($this->Common->insert('auth',$auth)) {
				$this->session->set_flashdata('message', 'Staff added..!');
				redirect('staffs');
			}
			else {
				$this->session->set_flashdata('message', 'Failed to add staff..!');
				redirect('staffs');
			}
		}
	}
	public function edit()
	{
		$data = $this->input->post();
		$profile = [
			'name' => $data['name'],
			'mobile' => $data['mobile'],
			'email' => $data['email'],
			'location' => $data['location'],
			'status' => $data['status'],
			'role' => $data['role'],
		];
		$this->Common->update('profile_id',$data['profile_id'],'profile',$profile);
		$auth = [
			'username' => $data['username']
		];
		$this->Common->update('profile_id',$data['profile_id'],'auth',$auth);
		redirect('staffs');
	}
	public function getStaffById()
	{
		$id = $_POST['id'];
		$data = $this->M_admin->getStaffById($id);
		echo json_encode($data);
	}
	public function password()
	{
		$id = $_POST['profile_id'];
		$pass = md5($_POST['password']);
		$array = [
			'password' => $pass
		];
		if ($this->Common->update('profile_id',$id,'auth',$array)) {
			$this->session->set_flashdata('message', 'Password changed');
			redirect('staffs');
		}
		else {
			$this->session->set_flashdata('message', 'Failed to update password');
			redirect('staffs');
		}
	}
}
