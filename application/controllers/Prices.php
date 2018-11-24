<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prices extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Common');
			$this->load->model('M_admin');
	}
	public function manage()
	{
		$product = $_GET['type'];
		if ($product == 'kandora' || $product == 'shirt' || $product == 'pants') {
			$data['diamond'] = [
				'adult' => $this->M_admin->getPrice($product,'diamond','adult'),
				'child' => $this->M_admin->getPrice($product,'diamond','child')
			];
			$data['gold'] = [
				'adult' => $this->M_admin->getPrice($product,'gold','adult'),
				'child' => $this->M_admin->getPrice($product,'gold','child')
			];
			$data['silver'] = [
				'adult' => $this->M_admin->getPrice($product,'silver','adult'),
				'child' => $this->M_admin->getPrice($product,'silver','child')
			];
		}
		else {
			redirect('products');
		}
		$data['product'] = $product;

		$this->load->view('admin/kandora',$data);
	}
	public function kandoraPrice()
	{
		$product = $_POST['product'];
		$cat = $_POST['category'];
		$adult_price = $_POST['adult'];
		$child_price = $_POST['child'];
		if ($cat == 'diamond') {
			// INSERT/UPDATE PRICE OF TYPE DIAMOND ADULT
			$adult = [
				'product' => $product,
				'category' => 'diamond',
				'size' => 'adult'
			];
			$check = $this->Common->get_details('price',$adult);
			$adult['price'] = $adult_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$adult)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$adult)) {
					echo "inserted";
				}
				else {
					echo "failed to insert";
				}
			}
			// INSERT/UPDATE PRICE OF TYPE DIAMOND CHILD
			$child = [
				'product' => $product,
				'category' => 'diamond',
				'size' => 'child'
			];
			$check = $this->Common->get_details('price',$child);
			$child['price'] = $child_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$child)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$child)) {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
		}
		elseif ($cat == 'gold') {
			// INSERT/UPDATE PRICE OF TYPE GOLD ADULT
			$adult = [
				'product' => $product,
				'category' => 'gold',
				'size' => 'adult'
			];
			$check = $this->Common->get_details('price',$adult);
			$adult['price'] = $adult_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$adult)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$adult)) {
					$this->session->set_flashdata('message', 'Price inserted');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to add price');
				}
			}
			// INSERT/UPDATE PRICE OF TYPE GOLD CHILD
			$child = [
				'product' => $product,
				'category' => 'gold',
				'size' => 'child'
			];
			$check = $this->Common->get_details('price',$child);
			$child['price'] = $child_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$child)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$child)) {
					$this->session->set_flashdata('message', 'Price added');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to add price');
				}
			}
		}
		else {
			// INSERT/UPDATE PRICE OF TYPE SILVER ADULT
			$adult = [
				'product' => $product,
				'category' => 'silver',
				'size' => 'adult'
			];
			$check = $this->Common->get_details('price',$adult);
			$adult['price'] = $adult_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$adult)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$adult)) {
					$this->session->set_flashdata('message', 'Price added');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to insert');
				}
			}
			// INSERT/UPDATE PRICE OF TYPE SILVER CHILD
			$child = [
				'product' => $product,
				'category' => 'silver',
				'size' => 'child'
			];
			$check = $this->Common->get_details('price',$child);
			$child['price'] = $child_price;
			if ($check->num_rows() > 0) {
				if ($this->Common->update('price_id',$check->row()->price_id,'price',$child)) {
					$this->session->set_flashdata('message', 'Changes made successfully');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to save changes');
				}
			}
			else {
				if ($this->Common->insert('price',$child)) {
					$this->session->set_flashdata('message', 'Price added');
				}
				else {
					$this->session->set_flashdata('message', 'Failed to insert');
				}
			}
		}
		redirect('prices/manage?type='.$product);
	}
}
