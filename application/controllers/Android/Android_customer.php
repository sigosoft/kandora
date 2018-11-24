<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_customer extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_android');
	}
	public function search()
	{
		$mobile = $_POST['mobile'];
		$check = $this->M_android->getCustomersByMobile($mobile);
		if ($check->num_rows() > 0) {
			$member = $check->row();
			if ($member->type == 'parent') {
				$return = [
					'message' => 'success',
					'user' => 'parent'
				];
			}
			else {
				$return = [
					'message' => 'success',
					'user' => 'member',
					'member' => [
						'name' => $member->member_name,
						'mobile' => $member->member_mobile,
						'member_id' => $member->member_id
					]
				];
			}
			$parent = $this->M_android->getParentById($member->customer_id);
			$return['customer'] = $parent;
		}
		else {
			$return = [
				'message' => 'No user found'
			];
		}
		print_r(json_encode($return));
	}
	public function getCustomerDetails()
	{
	    $id = $_POST['customer_id'];
	    $data = $this->Common->get_details('customer',array('customer_id' => $id))->result();
	    print_r(json_encode($data));
	}
}
