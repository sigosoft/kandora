<?php

class M_android extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }
  function getCustomersByMobile($mobile)
  {
    $this->db->select('member_id,customer_id,type,member_mobile,member_name');
    $this->db->from('members');
    $this->db->where('member_mobile',$mobile);
    return $this->db->get();
  }

  function getParentById($id)
  {
    $this->db->select('customer_id,customer_name,customer_mobile');
    $this->db->from('customer');
    $this->db->where('customer_id',$id);
    return $this->db->get()->row_array();
  }
  
  function getMembersByCustomerId($customer)
  {
    $this->db->select('member_id,member_name,member_mobile');
    $this->db->from('members');
    $this->db->where('customer_id',$customer);
    return $this->db->get()->result_array();
  }
  function getMeasurements($array)
  {
    if ($array['category'] == 'kandora') {
      $this->db->select('chest,waist,hips,shoulder,sleeve,neck,down,plate');
    }
    elseif ($array['category'] == 'shirt') {
      $this->db->select('length,chest,waist,hips,shoulder,sleeve,neck');
    }
    elseif ($array['category'] == 'pants') {
      $this->db->select('waist,hips,length,inside_length,knee,thigh,bottom');
    }
    $this->db->from('measurements');
    $this->db->where('customer_id',$array['customer_id']);
    $this->db->where('member_id',$array['member_id']);
    $this->db->where('category',$array['category']);
    return $this->db->get()->result();
  }
  function updateMeasurements($check,$array)
  {
    $this->db->where('category', $check['category']);
    $this->db->where('member_id', $check['member_id']);
    $this->db->where('customer_id', $check['customer_id']);
    $this->db->update('measurements', $array);
    return true;
  }
  function getOrdersByMemberId($member)
  {
    $this->db->select('product,quantity,grand_total,inserted_at');
    $this->db->from('invoice');
    $this->db->where('member_id',$member);
    $this->db->where('order','1');
    return $this->db->get()->result();
  }
  function getOrdersByStaffId($staff)
  {
    $this->db->select('invoice.invoice_id,invoice.product,invoice.quantity,invoice.grand_total,invoice.inserted_at,customer.customer_name,members.member_name,customer.latitude,customer.longitude');
    $this->db->from('invoice');
    $this->db->join('customer','customer.customer_id=invoice.customer_id');
    $this->db->join('members','members.member_id=invoice.member_id');
    $this->db->where('staff_id',$staff);
    $this->db->where('order','1');
    $this->db->order_by('invoice.invoice_id','desc');
    return $this->db->get()->result();
  }
  function getMeasurementsByMemberId($product,$member)
  {
      /*if( $product == 'kandora' )
      {
          $this->db->select('chest,waist,hips,shoulder,sleeve,neck,down,plate');
      }
      elseif( $product == 'shirt' )
      {
          $this->db->select('length,chest,waist,hips,shoulder,sleeve,neck');
      }
      elseif( $product == 'pants' )
      {
          $this->db->select('waist,hips,length,inside_length,knee,thigh,bottom');
      }*/
      $this->db->select('*');
      $this->db->from('measurements');
      $this->db->where('member_id',$member);
      $this->db->where('category',$product);
      return $this->db->get()->row();
  }
}

?>
