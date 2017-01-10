<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php
class User_model extends CI_Model {
  public function create_member($key) {
    $Name = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
    $Email = filter_var($this->input->post('email'), FILTER_SANITIZE_STRING);
    $enc_password = md5($this->input->post('password'));

    $n = 1;
    $query = $this->db->get('users');
        foreach ($query->result() as $row) {
            if ($Email == $row->Email) {
              $C = "Sähköposti on jo käytössä!";
              echo $n++.". MATCH FOUND<br>";
            } else {
              echo $n++.". non match found<br>";
            }
        }
        $from = $this->input->post('email');
        $needs = "esedulainen.fi";
        $pos = strpos($from, $needs);
        if ($pos === false) {
          $C = "Sinun pitää käyttää sinun esedulainen sähköpostia!";
          echo "The string '$needs' was not found in the string '$from'<br>";
        } else {
          echo "The string '$needs' was found in the string '$from'<br>";
        }
    if (!isset($C)) {
      $data = array(
          'Name'       => $Name,
          'Email'      => $Email,
          'Password'   => $enc_password,
          'C_Key'      => $key
      );
      $insert = $this->db->insert('users',$data);
      return $insert;
      echo "email was not found!<br>";
    } else {
      echo "email was found!<br>";
      $this->session->set_flashdata('error',$C);
      redirect('users/register');
    }
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
  public function fetch_key($username,$password) {
    $enc_password = md5($password);

    $this->db->where('Email',$username);
    $this->db->where('Password',$enc_password);

    $result = $this->db->get('users');
    if($result->num_rows() == 1){
        return $result->row(0)->C_Key;
    } else {
        return false;
    }
  }
  public function send_mail($key) {
    // $message = "";
    // $message = "<a href='".base_url()."sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";
    // $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
    // $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    // $this->email->to($this->input->post('email'));
    // $this->email->subject('Vahvista käyttäjätilisi.');
    // $this->email->message($message);

    // if ($this->email->send()) {
    return true;
    // }
  }
  public function C_Email($key) {
      return true;
  }
  public function Palaute($User_id) {
    $data = array(
      'User_id'   =>    $User_id,
      'Sposti'    =>    $this->input->post('Sposti'),
      'palaute'   =>    $this->input->post('Palaute')
    );
    $insert = $this->db->insert('palaute',$data);
    if ($insert) {
      return True;
    }
  }
}
