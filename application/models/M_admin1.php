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
}

?>
