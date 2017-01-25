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
