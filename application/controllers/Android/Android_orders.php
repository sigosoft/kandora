<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_orders extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_android');
	}
	public function getOrdersByMemberId()
	{
		$member = $_POST['member_id'];
		$data = $this->M_android->getOrdersByMemberId($member);
		foreach ($data as $val) {
			$arr = explode(' ',trim($val->inserted_at));
			$val->date = date("d/m/Y", strtotime($arr[0]) );
		}
		print_r(json_encode($data));
	}
	public function getOrdersByStaffId()
    {
      $staff = $_POST['staff_id'];
      $data = $this->M_android->getOrdersByStaffId($staff);
      foreach ($data as $val) {
    	$arr = explode(' ',trim($val->inserted_at));
    	$val->date = date("d/m/Y", strtotime($arr[0]) );
      }
      print_r(json_encode($data));
    }
    public function getOrderDetails()
    {
        $invoice_id = $_POST['invoice_id'];
        $invoice = $this->Common->get_details('invoice',array('invoice_id' => $invoice_id))->row();
        $product = $invoice->product;
        $member = $invoice->member_id;
        $data['measurements'] = $this->M_android->getMeasurementsByMemberId($product,$member);
        $data['details'] = $invoice;
        print_r(json_encode($data));
    }
}
