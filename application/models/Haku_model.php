<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku_model extends CI_Model {
  public function haku($value = '')
  {
    $this->db->select('F_Name, L_Name, Prof_Pic, Sposti, About, Näytä_Profiili');
    $this->db->distinct();
    $this->db->from('profile');
    $this->db->where('profile.Näytä_Profiili', 'Kylla');
    // $this->db->join('harrastukset', 'harrastukset.User_id = profile.User_id');
    // $this->db->join('tyohistoria', 'tyohistoria.User_id = profile.User_id');
    // $this->db->join('koulutus', 'koulutus.User_id = profile.User_id');
    // $this->db->join('kkortit', 'kkortit.User_id = profile.User_id');
    // $this->db->join('metatieto', 'metatieto.User_id = profile.User_id');
    $this->db->like('profile.F_Name', $value);
    $this->db->or_like('profile.L_Name', $value);
    $this->db->or_like('profile.Sposti', $value);
    $this->db->or_like('profile.Own_Email', $value);
    $this->db->or_like('profile.About', $value);
    // $this->db->or_like('harrastukset.harrastus', $value);
    // $this->db->or_like('harrastukset.vapaasana', $value);
    // $this->db->or_like('tyohistoria.tyopaikka', $value);
    // $this->db->or_like('tyohistoria.tehtava', $value);
    // $this->db->or_like('tyohistoria.kuvaus', $value);
    // $this->db->or_like('koulutus.koulutusnimi', $value);
    // $this->db->or_like('koulutus.koulutusaste', $value);
    // $this->db->or_like('koulutus.oppilaitos', $value);
    // $this->db->or_like('kkortit.kortti', $value);
    // $this->db->or_like('kkortit.vapaasana', $value);
    // $this->db->or_like('metatieto.Tieto', $value);
    $this->db->order_by('profile.L_Name', "asc");
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
