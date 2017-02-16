<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku_model extends CI_Model {
  public function haku($value = '', $suodatin) {
    if(!isset($suodatin)) {
      $suodatin = 'Nothing!';
    }
    $this->db->select('F_Name, L_Name, Prof_Pic, Sposti, About, Näytä_Profiili, profile.User_id');
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
  public function User($User_id) {
    $this->db->select('*');
    $this->db->from('profile');
    $this->db->where('User_id', $User_id);
    $this->db->where('Näytä_Profiili', 'Kylla');
    $query = $this->db->get();
    return $query->result();
  }
}
