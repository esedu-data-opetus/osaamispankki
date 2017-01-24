<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
  //Luo käyttäjän niilä vaatimuksilla mitä on asetettu
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
          $C = "Sinun pitää käyttää esedulainen sähköpostia!";
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
  //Kirjaa käyttäjän sivulle
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
  //Hakee käyttäjän tyypin
  public function User_type($username) {
    $this->db->where('Sposti',$username);

    $result = $this->db->get('profile');
    if($result->num_rows() == 1){
        return $result->row(0)->KT;
    } else {
        return false;
    }
  }
  //Hakee käyttäjän avaimen
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
  //Lähettää Sähköposti varmennuksen
  public function send_mail($key) {
    // $message = "";
    // $message = "<a href='".base_url()."$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";
    // $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
    // $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    // $this->email->to($this->input->post('email'));
    // $this->email->subject('Vahvista käyttäjätilisi.');
    // $this->email->message($message);

    // if ($this->email->send()) {
    return true;
    // }
  }
  //Varmistaa sähköpostin
  public function C_Email($key) {
      return true;
  }
  //Hakee Harrastukset
  public function Hae_Harrastukset() {
    $query = $this->db->get('harrastukset');
    return $query->result();
  }
  //Hakee Työhistorian
  public function Hae_Tyohistoria() {
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
  //Hakee Koulutukset
  public function Hae_Koulutukset() {
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
  //Hakee Käyttäjien Kortit
  public function Hae_KKortit() {
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
  //Hakee Profiilit
  public function Hae_Profiilit() {
    $this->db->where('Näytä_Profiili', "Kylla");
    $query = $this->db->get('profile');
    return $query->result();
  }
  //Hakee hakutulokset
  public function hakee() {
    $data = $this->input->post('haku');
    return $data;
  }
  // Esimerkki
  public function tee_haku() {
		$match = trim($this->input->post('haku'));
		$str = preg_replace( "/\s+/", " ", $match);
		if($str === '' OR $str === ' '){
		$kysely ="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.privSposti, henkilotiedot.etunimi, henkilotiedot.osoite, henkilotiedot.postinro, henkilotiedot.puhelinnro, henkilotiedot.sNimi, henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva, henkilotiedot.aktiivisuus
		FROM henkilotiedot
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		WHERE henkilotiedot.aktiivisuus = 1
		LIKE '%%' ESCAPE '!'";
		$query = $this->db->query($kysely);
		return $query->result();
		}
		else
		{
		$haku_explode = explode(' ', $str);
		$kysely="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.privSposti, henkilotiedot.etunimi, henkilotiedot.osoite, henkilotiedot.postinro, henkilotiedot.puhelinnro, henkilotiedot.sNimi,  henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva, henkilotiedot.aktiivisuus
		FROM henkilotiedot
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		LEFT JOIN hakusanat ON henkilotiedot.sposti = hakusanat.sposti
		LEFT JOIN harrastukset ON henkilotiedot.sposti = harrastukset.sposti
		WHERE henkilotiedot.etunimi REGEXP '".implode("|", $haku_explode)."'
		OR henkilotiedot.sNimi REGEXP'".implode("|", $haku_explode)."'
		OR koulutukset.koulutusnimi REGEXP'".implode("|", $haku_explode)."'
		OR tyo.tyopaikka REGEXP'".implode("|", $haku_explode)."'
		OR harrastukset.harrastus REGEXP'".implode("|", $haku_explode)."'
		OR hakusanat.hakusana REGEXP'".implode("|", $haku_explode)."'";

		$query = $this->db->query($kysely);

		return $query->result();
	 }
  }
}
