<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_invoice extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_admin');
	}
	public function getInvoiceNumber()
	{
		$type = $_POST['type'];
		$member = $_POST['member_id'];
		$customer = $_POST['customer_id'];

		$array = [
			'product' => $type,
			'customer_id' => $customer,
			'member_id' => $member
		];
		if ($id = $this->Common->insert('invoice',$array)) {
			$return = [
				'message' => 'success',
				'invoice_no' => $id
			];
		}
		else {
			$return = [
				'message' => 'failed'
			];
		}
		print_r(json_encode($return));
	}
	public function getPriceKandora()
	{
		$category = $_POST['category'];
		$size = $_POST['size'];
		$data = $this->Common->get_details('price',array('category' => $category , 'size' => $size))->row();
		print_r(json_encode($data));
	}
	public function addInvoice()
	{
		$invoice_id = $_POST['invoice_no'];
		$array = [
			'material' => $_POST['material'],
			'size' => $_POST['size'],
			'quantity' => $_POST['quantity'],
			'total' => $_POST['total'],
			'vat' => $_POST['vat'],
			'grand_total' => $_POST['grand_total'],
			'order' => '1',
			'staff_id' => $_POST['staff_id'],
			'discount_percent' => $_POST['discount_percent'],
			'discount' => $_POST['discount']
		];

		if (isset($_POST['category'])) {
			$array['category'] = $_POST['category'];
		}
		if ($this->Common->update('invoice_id',$invoice_id,'invoice',$array)) {
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
}
