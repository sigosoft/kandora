<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_measure extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_android');
	}
	public function measurement()
	{
		$category = $_POST['category'];
		if ($category == 'kandora' || $category == 'kandora special') {
			$array = [
				'chest' => $_POST['chest'],
				'waist' => $_POST['waist'],
				'hips' => $_POST['hips'],
				'shoulder' => $_POST['shoulder'],
				'sleeve' => $_POST['sleeve'],
				'neck' => $_POST['neck'],
				'down' => $_POST['down'],
				'plate' => $_POST['plate']
			];
		}
		elseif ($category == 'shirt') {
			$array = [
				'chest' => $_POST['chest'],
				'length' => $_POST['length'],
				'waist' => $_POST['waist'],
				'hips' => $_POST['hips'],
				'shoulder' => $_POST['shoulder'],
				'sleeve' => $_POST['sleeve'],
				'neck' => $_POST['neck']
			];
		}
		elseif ($category == 'pants') {
			$array = [
				'length' => $_POST['length'],
				'waist' => $_POST['waist'],
				'hips' => $_POST['hips'],
				'inside_length' => $_POST['inside_length'],
				'knee' => $_POST['knee'],
				'thigh' => $_POST['thigh'],
				'bottom' => $_POST['bottom']
			];
		}
		$check = [
			'category' => $category,
			'member_id' => $_POST['member_id'],
			'customer_id' => $_POST['customer_id']
		];

		$num = $this->Common->get_details('measurements',$check)->num_rows();
		if ($num > 0) {
			if ($this->M_android->updateMeasurements($check,$array)) {
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
			$array['category'] = $check['category'];
			$array['member_id'] = $check['member_id'];
			$array['customer_id'] = $check['customer_id'];
			if ($this->Common->insert('measurements',$array)) {
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
		print_r(json_encode($return));
	}
	public function checkMeasurements()
	{
		$category = $_POST['category'];
		$array = [
			'category' => $category,
			'member_id' => $_POST['member_id'],
			'customer_id' => $_POST['customer_id']
		];
		$num = $this->Common->get_details('measurements',$array)->num_rows();
		if ($num > 0) {
			$data = $this->M_android->getMeasurements($array);
			$return = [
				'status' => 'yes',
				'data' => $data
			];
		}
		else {
			$return = [
				'status' => 'no'
			];
		}
		print_r(json_encode($return));
	}
}
