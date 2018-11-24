<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_login extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
	}
	public function check()
	{
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$check = $this->Common->get_details('auth',array('username' => $user , 'password' => $pass));
		if ($check->num_rows() > 0) {
			$profile = $this->Common->get_details('profile',array('profile_id' => $check->row()->profile_id))->row();
			if ($profile->status == 'Blocked') {
				$data = [
					'status' => 'failed',
					'message' => 'Account blocked'
				];
			}
			else {
				$type = $profile->type;
				if ($type == 'staff') {
					$data = [
						'status' => 'success',
						'staff_id' => $profile->profile_id,
						'name' => $profile->name
					];
				}
			}
		}
		else {
			$data = [
				'status' => 'failed',
				'message' => 'Invalid username or password'
			];
		}
		print_r(json_encode($data));
	}
}
