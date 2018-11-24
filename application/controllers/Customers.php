<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
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
		$data['customers'] = $this->Common->get_details('customer',array())->result();
		$this->load->view('admin/customers',$data);
	}
	public function members($customer=0)
	{
		$check = $this->M_admin->checkParentById($customer);
		if ($check->num_rows() > 0) {
			$data['customer'] = $check->row()->customer_name;
			$data['members'] = $this->Common->get_details('members',array('customer_id' => $customer))->result();
			$this->load->view('admin/members',$data);
		}
		else {
			redirect('customers');
		}
	}
	function getMemberById()
	{
		$id = $_POST['id'];
		$data = $this->Common->get_details('members',array('member_id' => $id))->row_array();
		print_r(json_encode($data));
	}
	function editMember()
	{
		$data = $this->input->post();
		$id = $data['member_id'];
		$type = $data['type'];
		$customer_id = $data['customer_id'];
		unset($data['member_id'],$data['type'],$data['customer_id']);
		if ($this->Common->update('member_id',$id,'members',$data)) {
			if ($type == 'parent') {
				$customer = [
					'customer_name' => $data['member_name'],
					'customer_mobile' => $data['member_mobile']
				];
				$this->Common->update('customer_id',$customer_id,'customer',$customer);
			}
		}
		redirect('customers/members/'.$customer_id);
	}
}
