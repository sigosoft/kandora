<?php

class M_admin extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }
  function getStaffs()
  {
    $this->db->select('profile.*,auth.username');
    $this->db->from('profile');
    $this->db->join('auth','auth.profile_id=profile.profile_id');
    $this->db->where('type','staff');
    $this->db->order_by('profile_id','desc');
    $result=$this->db->get();
    return $result->result();
  }
  function getStaffById($id)
  {
    $this->db->select('profile.*,auth.username');
    $this->db->from('profile');
    $this->db->join('auth','auth.profile_id=profile.profile_id');
    $this->db->where('profile.profile_id',$id);
    $result=$this->db->get();
    return $result->row_array();
  }
  function checkParentById($id)
  {
    $this->db->select('customer_id,customer_name');
    $this->db->from('customer');
    $this->db->where('customer_id',$id);
    return $this->db->get();
  }
  function getPrice($product,$category,$size)
  {
    $this->db->select('price');
    $this->db->from('price');
    $this->db->where('product',$product);
    $this->db->where('category',$category);
    $this->db->where('size',$size);
    return $this->db->get()->row()->price;
  }
  function getOrders()
  {
    $this->db->select('invoice.invoice_id,customer.customer_name,members.member_name,invoice.inserted_at,invoice.product,profile.name,customer.customer_mobile');
    $this->db->from('invoice');
    $this->db->join('customer','customer.customer_id=invoice.customer_id');
    $this->db->join('members','members.member_id=invoice.member_id');
    $this->db->join('profile','profile.profile_id=invoice.staff_id');
    $this->db->where('invoice.order','1');
    $this->db->where('invoice.status','order');
    $this->db->order_by('invoice.invoice_id','desc');
    $result=$this->db->get();
    return $result->result();
  }
  function getCompletedOrders()
  {
    $this->db->select('invoice.invoice_id,customer.customer_name,members.member_name,invoice.inserted_at,invoice.product,profile.name,customer.customer_mobile');
    $this->db->from('invoice');
    $this->db->join('customer','customer.customer_id=invoice.customer_id');
    $this->db->join('members','members.member_id=invoice.member_id');
    $this->db->join('profile','profile.profile_id=invoice.staff_id');
    $this->db->where('invoice.order','1');
    $this->db->where('invoice.status','complete');
    $result=$this->db->get();
    return $result->result();
  }
  function getCustomerDetails($member)
  {
    $this->db->select('members.member_name,members.member_mobile,customer.*');
    $this->db->from('members');
    $this->db->join('customer','customer.customer_id=members.customer_id');
    $this->db->where('members.member_id',$member);
    $result=$this->db->get();
    return $result->row();
  }
}

?>
