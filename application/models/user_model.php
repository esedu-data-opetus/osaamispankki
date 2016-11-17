<?php
class User_model extends CI_Model {
  public function create_member() {
    $key = md5(uniqid());
    $enc_password = md5($this->input->post('password'));
      $data = array(
          'Name'       => $this->input->post('name'),
          'Email'      => $this->input->post('email'),
          'Password'   => $enc_password,
          'C_Key'      => $key
      );
      $insert = $this->db->insert('users',$data);
      return $insert;
  }
  public function login_user($username,$password) {
    $enc_password = md5($password);

    $this->db->where('Email',$username);
    $this->db->where('Password',$enc_password);

    $result = $this->db->get('users');
    if($result->num_rows() == 1){
        return $result->row(0)->id;
    } else {
        return false;
    }
  }
}
