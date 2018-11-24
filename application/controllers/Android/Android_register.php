<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_register extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_android');
	}
	public function registerCustomer()
	{
		$data = $this->input->post();
		$member = [
			'member_name' => $data['customer_name'],
			'member_mobile' => $data['customer_mobile']
		];
		if ($id = $this->Common->insert('customer',$data)) {
			$member['customer_id'] = $id;
			if ($this->Common->insert('members',$member)) {
				$return = [
					'message' => 'success'
				];
			}
			else {
				$return = [
					'message' => 'failed'
				];
			}
		}
		else {
			$return = [
				'message' => 'failed'
			];
		}
		print_r(json_encode($return));
	}
	public function registerMember()
	{
		$data = $this->input->post();
		$data['type'] = 'member';
		if ($this->Common->insert('members',$data)) {
			$return = [
				'message' => 'success'
			];
		}
		else {
			$return = [
				'message' => 'failed'
			];
		}
		print_r(json_encode($return));
	}
	public function getMembersByCustomerId()
	{
		$customer = $_POST['customer_id'];
		$data = $this->M_android->getMembersByCustomerId($customer);
		print_r(json_encode($data));
	}
}
