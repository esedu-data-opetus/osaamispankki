<?php
class User_model extends CI_Model {
  public function send_mail() {
    // $message = "<a href='".base_url()."sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";
    //
    // $this->load->library('email');
    //
    // $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    // $this->email->to($this->input->post('email'));
    // $this->email->subject('Vahvista käyttäjätilisi.');
    // $this->email->message($message);
    //
    // if ($this->email->send()) {
    $key = md5(uniqid());
    $data = array(
          'Vahvistus' =>  0,
          'Key'       =>  $key
        );
        $this->session->set_userdata($data);
      return True;
    // }

  //   $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
  //
  //   $this->email->from('osaamispankki@esedu.fi', "Osaamispankki");
  //   $this->email->to($this->input->post('sposti'));
  //   $this->email->subject("Vahvista käyttäjätilisi.");
  //
  //   $message = "";
  //   $message = "<a href='".base_url()."sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";
  //
  //   $this->email->message($message);
  //
  //   //Lähettää sähköpostivarmistuksen käyttäjälle
  //   if ($this->model_sivu->add_temp_user($key)) {
  //     if ($this->email->send()){
  //       echo "<center><h2 style='font-weight:bold;color:green;'>Vahvistus on lähetetty sähköpostiisi!</h2>";
  //       echo "<p><a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a></p></center>";
  //   } else {
  //     echo "<h2 style='font-weight:bold;color:red;'>Sähköpostin lähetys ei onnistunut.</h2>";
  //     echo '<h4>Mutta pystyt kuitenkin kirjautumaan sisään</h4>';
  //     echo "<a href='".base_url()."users/login' >Takaisin kirjautumiseen</a>";
  //   }
  // }
  }
  public function create_member() {
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
          'C_Key'      => $this->session->userdata('Key')
      );
      $insert = $this->db->insert('users',$data);
      return $insert;
      echo "email was not found!<br>";
    } else {
      echo "email was found!<br>";
      $this->session->set_flashdata('Email',$C);
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
}
