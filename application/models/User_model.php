<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
        $from = $Email;
        $esedulainen = "esedulainen.fi";
        $esedu = "esedu.fi";
        $pos = strpos($from, $esedu);
        $pos2 = strpos($from, $esedulainen);
        if ($pos === false) {
        if ($pos2 === false) {
          $C = "Sinun pitää käyttää esedulainen sähköpostia!";
          echo "The string '$esedulainen' was not found in the string '$from'<br>";
        }
          echo "The string '$esedu' was not found in the string '$from'<br>";
        } else {
          echo "The string '$esedulainen' or '$esedu' was found in the string '$from'<br>";
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
      echo "Email was not found!<br>";
    } else {
      echo "Email was found!<br>";
      $this->session->set_flashdata('error',$C);
      redirect('users/register');
    }
  }
  public function login_user($username,$password) {
    $enc_password = md5($password);

    $this->db->where('Email',$username);
    $this->db->where('Password',$enc_password);
    $this->db->where('Status',1);

    $result = $this->db->get('users');
    if($result->num_rows() == 1){
        return $result->row(0)->id;
    } else {
        return false;
    }
  }
  //Hakee käyttäjän tyypin
   public function User_type($username) {
     $this->db->where('Sposti', $username);
     $result = $this->db->get('profile');
     if($result->num_rows() == 1){
         return $result->row(0)->KT;
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
  public function test_send_mail($key) {
    $message = "<p>Vahvista sähköpostiosoite <a href='".base_url()."Users/confirmed/".md5($key)."' >tästä</a>!</p>";
    $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
    $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    $this->email->to($this->input->post('email'));
    $this->email->subject('Vahvista käyttäjätilisi.');
    $this->email->message($message);
    if ($this->email->send()) {
      return true;
    } else {
      return false;
    }
  }

  public function test_create_member() {
    return true;
  }

  // public function send_mail($key) {
  //   $message = "<p>Vahvista sähköpostiosoite <a href='".base_url()."Users/confirmed/".md5($Key)."' >tästä</a>!</p>";
  //   $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
  //   $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
  //   $this->email->to($this->input->post('email'));
  //   $this->email->subject('Vahvista käyttäjätilisi.');
  //   $this->email->message($message);
  //   if ($this->email->send()) {
  //     return true;
  //   } else {
  //     return false;
  //   }
  // }
  //activate user account
  function verifyEmail($key) {
    $data = array('Status' => 1);
    $this->db->where('md5(C_Key)', $key);
    return $this->db->update('users', $data);
  }

  // function verifyUser($username,$password) {
  //   $enc_password = md5($password);
  //
  //   $this->db->select('Status');
  //   $this->db->where('Email',$username);
  //   $this->db->where('Password',$enc_password);
  //   return $this->db->update('users', $data);
  // }
  public function send_password_reset($email, $data) {
    $message = "<p>Vaihda salasana <a href='".base_url()."Users/new_password/".md5($email)."/".$data['rs']."' >tästä</a>!</p>";
    $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
    $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    $this->email->to($email);
    $this->email->subject('Salasanan palautus.');
    $this->email->message($message);
    if ($this->email->send()) {
      return true;
    } else {
      return false;
    }
  }
  public function checkEmail($email) {
    $this->db->where('Email', $email);
    $result = $this->db->get('users');
    if($result->num_rows() == 1){
        return true;
    } else {
        return false;
    }
  }
  public function resetPassword($Pw_Email, $data) {
    $this->db->where('md5(Email)', $Pw_Email);
    $this->db->update('users', $data);
    return true;
  }
}
