<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_admin');
	}
	public function index()
	{
		$data['orders'] = $this->M_admin->getOrders();
		$this->load->view('staff/orders',$data);
	}
	public function completed()
	{
		$data['orders'] = $this->M_admin->getCompletedOrders();
		$this->load->view('staff/orders',$data);
	}
	public function view($invoice)
	{
		$check = $this->Common->get_details('invoice',array('invoice_id' => $invoice));
		if ($check->num_rows() > 0) {
			$invoice = $check->row();
			$data['customer'] = $this->M_admin->getCustomerDetails($invoice->member_id);
			$data['invoice'] = $invoice;
			$data['measure'] = $this->Common->get_details('measurements',array('member_id' => $invoice->member_id , 'category' => $invoice->product))->row();
		}
		else {
			redirect('order');
		}
		$this->load->view('staff/orders_view',$data);
	}
	function change_status()
	{
		$data['status'] = $_POST['status'];
		$invoice_id = $_POST['invoice_id'];
		if ($this->Common->update('invoice_id',$invoice_id,'invoice',$data)) {
			redirect('order');
		}
		else {
			redirect('order');
		}
	}
	public function showInvoice($invoice)
	{
		$check = $this->Common->get_details('invoice',array('invoice_id' => $invoice));
		if ($check->num_rows() > 0) {
			$invoice = $check->row();
			$date = $invoice->inserted_at;
			$arr = explode(' ',trim($date));
			$invoice->date = date("d/m/Y",strtotime($arr[0]));
			$data['customer'] = $this->M_admin->getCustomerDetails($invoice->member_id);
			$data['invoice'] = $invoice;
		}
		else {
			redirect('order');
		}
		$this->load->view('staff/inv',$data);
	}
}
