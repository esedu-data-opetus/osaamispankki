<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loki_model extends CI_Model {
  public function Hae_historia($User_id) {
    $this->db->where('User_id', $User_id);
    $query = $this->db->get('loki');
    return $query->result();
  }
  public function Clear($User_id) {
    $this->db->where('User_id', $User_id);
    $this->db->delete('loki');
    return true;
  }
  public function Uusi_toiminto($Toiminta) {
    $User_id = $this->session->userdata('user_id');
    $Sposti = $this->session->userdata('sposti');
    $Time = date('H') + 1 . date(':i');
    $Date = date('d.m.Y');

    $data = array(
      'User_id'   =>    $User_id,
      'Sposti'    =>    $Sposti,
      'Aika'      =>    $Time,
      'Paiva'     =>    $Date,
      'Toiminta'  =>    $Toiminta,
    );
    $insert = $this->db->insert('loki', $data);
    if ($insert) {
      return true;
    }
  }
}
