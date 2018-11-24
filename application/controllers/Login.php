<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function check()
	{
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$user = $_POST['username'];
			$pass = md5($_POST['password']);
			$check = $this->Common->get_details('auth',array('username' => $user , 'password' => $pass));
			if ($check->num_rows() > 0) {
				$profile = $this->Common->get_details('profile',array('profile_id' => $check->row()->profile_id))->row();
				if ($profile->status == 'Blocked') {
					$this->session->set_flashdata('message', 'Account deactivated');
					redirect('login');
				}
				else {
					$type = $profile->type;
					if ($type == 'admin') {
						$app_user=array(
								'user' => $profile->name,
								'type' => 'admin',
								'user_id' => $profile->profile_id,
							);
						$this->session->set_userdata('kandora_user',$app_user);
						redirect('staffs');
					}
					elseif ($type == 'staff') {
						$app_user=array(
								'user' => $profile->name,
								'type' => 'staff',
								'user_id' => $profile->profile_id,
							);
						$this->session->set_userdata('kandora_user',$app_user);
						redirect('staff');
					}
				}
			}
			else {
				$this->session->set_flashdata('message', 'Invalid username or password');
				redirect('login');
			}
		}
		else {
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('sms_user');
		redirect('login');
	}
}
