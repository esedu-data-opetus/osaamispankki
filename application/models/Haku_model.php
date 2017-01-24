<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku_model extends CI_Model {
  //Hakee Profiilit
  public function Hae_Profiilit() {
    $this->db->where('Näytä_Profiili', "Kylla");
    $query = $this->db->get('profile');
    return $query->result();
  }
  public function hakee() {
    $haku = $this->input->post('haku');
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
    //Hakee hakutulokset
    public function Hakusi() {
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
