<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Palaute_model extends CI_Model {
  //Luo Palautteen
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
  //Hakee Palautteet
  public function hae_palaute() {
    $query = $this->db->get('palaute');
    return $query->result();
  }
  //Poistaa Palautteen
  public function palaute_delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('palaute');
    return true;
  }
  //Vaihtaa Palautteen tilaa
  public function palaute_tila($data, $id) {
    $this->db->where('id', $id);
    $this->db->update('palaute', $data);
    return true;
  }
}
