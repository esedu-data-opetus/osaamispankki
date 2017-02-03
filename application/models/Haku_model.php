<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku_model extends CI_Model {
  public function haku($value = '')
  {
    $this->db->select('*');
    $this->db->from('profile');
    $this->db->join('harrastukset', 'harrastukset.User_id = profile.User_id');
    $this->db->join('tyohistoria', 'tyohistoria.User_id = profile.User_id');
    $this->db->join('koulutus', 'koulutus.User_id = profile.User_id');
    $this->db->join('kkortit', 'kkortit.User_id = profile.User_id');
    $this->db->where("
      profile.F_Name LIKE '%$value%' OR
      profile.L_Name LIKE '%$value%' OR
      profile.Sposti LIKE '%$value%' OR
      profile.Own_Email LIKE '%$value%' OR
      profile.About LIKE '%$value%' OR
      harrastukset.harrastus LIKE '%$value%' OR
      harrastukset.vapaasana LIKE '%$value%' OR
      tyohistoria.tyopaikka LIKE '%$value%' OR
      tyohistoria.tehtava LIKE '%$value%' OR
      tyohistoria.kuvaus LIKE '%$value%' OR
      koulutus.koulutusnimi LIKE '%$value%' OR
      koulutus.koulutusaste LIKE '%$value%' OR
      koulutus.oppilaitos LIKE '%$value%'
    ");
    $query = $this->db->get();
    return $query->result();
  }


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
  public function Hae_Tyohistoriat() {
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
  //Hakee Koulutukset
  public function Hae_Koulutukset() {
    $query = $this->db->get('koulutus');
    return $query->result();
  }
  //Hakee Käyttäjien Kortit
  public function Hae_KKortit() {
    $query = $this->db->get('kkortit');
    return $query->result();
  }
  //Hakee Käyttäjien Kortit
  public function Hae_Metatiedot() {
    $query = $this->db->get('metatieto');
    return $query->result();
  }
}
