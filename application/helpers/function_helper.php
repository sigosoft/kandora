<?php
  function pr($data)
  {
    echo "<pre>";
	  print_r($data);
	  echo "</pre>";
	  die();
  }
  function is_login()
  {
    $ci =& get_instance();
	  $ci->load->library('session');
	  $user = $ci->session->userdata('kandora_user');
    if (isset($user)) {
      if ($user['type'] == 'admin') {
        return 'admin';
      }
      else{
        return 'staff';
      }
    }
    else {
      return false;
    }
  }
  function get_session()
  {
    $ci =& get_instance();
	  $ci->load->library('session');
	  $user = $ci->session->userdata('dof_user');
    return $user;
  }
 ?>
