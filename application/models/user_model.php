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
  public function User_type($username) {
    $this->db->where('Sposti',$username);

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
      'Sposti'    =>    filter_var($this->input->post('Sposti'), FILTER_SANITIZE_STRING),
      'Aihe'      =>    filter_var($this->input->post('Aihe'), FILTER_SANITIZE_STRING),
      'palaute'   =>    filter_var($this->input->post('Palaute'), FILTER_SANITIZE_STRING)
    );
    $insert = $this->db->insert('palaute',$data);
    if ($insert) {
      return True;
    }
  }
  public function Hae_Tyohistoria() {
    $this->db->select('
    tyohistoria.tyopaikka,
    tyohistoria.tehtava,
    tyohistoria.alkoi,
    tyohistoria.loppui,
    tyohistoria.kuvaus,
    tyohistoria.id as tyo_id,
    tyohistoria.User_id,
    profile.Näytä_Profiili,
    profile.User_id
    ');
    $this->db->from('tyohistoria');
    $this->db->join('profile','profile.User_id = tyohistoria.User_id');
    $this->db->where('profile.Näytä_Profiili', "Kylla");
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
    return FALSE;
    }
  return $query->result();
  }
  public function Hae_Harrastukset() {
    $this->db->select('
    harrastukset.harrastus,
    harrastukset.vapaasana,
    harrastukset.id,
    harrastukset.User_id,
    profile.Näytä_Profiili,
    profile.User_id as U_id
    ');
    $this->db->from('harrastukset');
    $this->db->join('profile','profile.User_id = harrastukset.User_id');
    $this->db->where('profile.Näytä_Profiili', "Kylla");
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
    return FALSE;
    }
  return $query->result();
  }
  public function Hae_Profiilit() {
    $this->db->where('Näytä_Profiili', "Kylla");
    $query = $this->db->get('profile');
    return $query->result();
  }
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
