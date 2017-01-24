<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 
<?php
class Profile_model extends CI_Model {
//Luo Profiilin
  public function profile_setup() {
    $Profile = array(
        'User_id'       =>     filter_var($this->session->userdata('user_id'), FILTER_SANITIZE_STRING),
        'F_Name'        =>     filter_var($this->input->post('f_name'), FILTER_SANITIZE_STRING),
        'L_Name'        =>     filter_var($this->input->post('l_name'), FILTER_SANITIZE_STRING),
        'C_Key'         =>     filter_var($this->session->userdata('Key'), FILTER_SANITIZE_STRING),
        'Puh_Num'       =>     filter_var($this->input->post('puh_num'), FILTER_SANITIZE_STRING),
        'About'         =>     'Muu',
        'Own_Email'     =>     filter_var($this->input->post('own_email'), FILTER_SANITIZE_STRING),
        'Sposti'        =>     filter_var($this->session->userdata('sposti'), FILTER_SANITIZE_STRING),
        'Osoite'        =>     filter_var($this->input->post('osoite'), FILTER_SANITIZE_STRING),
        'Posti_Num'     =>     filter_var($this->input->post('posti_num'), FILTER_SANITIZE_STRING),
        'Näytä_Profiili'=>     'Ei'
    );
    $insert = $this->db->insert('profile',$Profile);
    if ($insert) {
      return true;
    }
  }
//Hakee Harrastukset
  public function Get_harrastus($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('harrastukset');
    return $query->result();
  }
//Hakee Työhistorian
  public function Get_tyohistoria($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
//Hakee Koulutukset
  public function Get_koulutus($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('koulutus');
    return $query->result();
  }
//Hakee Kortit
  public function Get_kortit($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('kkortit');
    return $query->result();
  }
//Hakee Metatiedot
  public function get_meta($user_id) {
    $this->db->select('*');
    $this->db->from('metatieto');
    $this->db->where('User_id',$user_id);
    $query = $this->db->get();
    return $query->result();
  }
//Hakee käyttäjän Profiilin
  public function get_profile($user_id) {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('User_id',$user_id);
        $query = $this->db->get();
        return $query->result();
  }
//Hakee Käyttäjän
  public function get_user($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$user_id);
        $query = $this->db->get();
        return $query->result();
  }
//Luo Työhistorian
  public function tyohistoria($user_id) {
    $data = array(
        'User_id'       =>     $user_id,
        'tyopaikka'     =>     filter_var($this->input->post('tyopaikka'), FILTER_SANITIZE_STRING),
        'tehtava'       =>     filter_var($this->input->post('tehtava'), FILTER_SANITIZE_STRING),
        'alkoi'         =>     filter_var($this->input->post('Aloitit'), FILTER_SANITIZE_STRING),
        'loppui'        =>     filter_var($this->input->post('Lopetit'), FILTER_SANITIZE_STRING),
        'kuvaus'        =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    $insert = $this->db->insert('tyohistoria',$data);
    if ($insert) {
      return true;
    }
  }
//Luo Koulutuksen
  public function koulutus($user_id) {
    $data = array(
        'User_id'         =>     $user_id,
        'koulutusnimi'    =>     filter_var($this->input->post('koulutusnimi'), FILTER_SANITIZE_STRING),
        'koulutusaste'    =>     filter_var($this->input->post('koulutusaste'), FILTER_SANITIZE_STRING),
        'oppilaitos'      =>     filter_var($this->input->post('oppilaitos'), FILTER_SANITIZE_STRING),
        'alkoi'           =>     filter_var($this->input->post('Aloitit'), FILTER_SANITIZE_STRING),
        'loppui'          =>     filter_var($this->input->post('Lopetit'), FILTER_SANITIZE_STRING)
    );
    $insert = $this->db->insert('koulutus',$data);
    if ($insert) {
      return true;
    }
  }
//Luo Kortin
  public function kortit($user_id) {
    $data = array(
        'User_id'     =>     $user_id,
        'kortti'      =>     filter_var($this->input->post('kortti'), FILTER_SANITIZE_STRING),
        'loppuu'      =>     filter_var($this->input->post('Lopetit'), FILTER_SANITIZE_STRING),
        'vapaasana'   =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    $insert = $this->db->insert('kkortit',$data);
    if ($insert) {
      return true;
    }
  }
//Poistaa Koulutuksen
  public function koulutus_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('koulutus');
    return true;
  }
//Poistaa Kortin
  public function kortit_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('kkortit');
    return true;
  }
//Päivittää Koulutuksen
  public function koulutus_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('koulutus',$data);
    return TRUE;
  }
//Poistaa Työhistorian
  public function tyohistoria_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('tyohistoria');
    return true;
  }
//Päivittää Työhistorian
  public function tyohistoria_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('tyohistoria',$data);
    return TRUE;
  }
//Luo Harrastuksen
  public function harrastus($user_id) {
    $data = array(
        'User_id'       =>     $user_id,
        'harrastus'     =>     filter_var($this->input->post('harrastus'), FILTER_SANITIZE_STRING),
        'vapaasana'     =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    $insert = $this->db->insert('harrastukset',$data);
    if ($insert) {
      return true;
    }
  }
//Vaihtaa Profiilin tilaa
  public function hide($user_id, $data) {
    $this->db->where('User_id',$user_id);
    $this->db->update('profile',$data);
    return TRUE;
  }
//Päivittää Harrastuksen
  public function harrastus_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('harrastukset',$data);
    return TRUE;
  }
//Poistaa Harrastuksen
  public function harrastus_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('harrastukset');
    return true;
  }
//Päivittää Profiilin
  public function update_profile($user_id,$data) {
    $this->db->where('User_id',$user_id);
    $this->db->update('profile',$data);
    return TRUE;
  }
//Poistaa kaikki Metatiedot
  public function delete_all_meta($user_id) {
    $this->db->where('User_id',$user_id);
    $this->db->delete('metatieto');
    return true;
  }
//Poistaa Metatiedon
  public function delete_meta($id) {
    $this->db->where('id',$id);
    $this->db->delete('metatieto');
    return true;
  }
//Luo Metatiedon
  public function meta_add($data) {
    $insert = $this->db->insert('metatieto',$data);
    if ($insert) {
      return true;
    }
  }
//Hakee Käyttäjän Palautteen
  public function hae_palaute_user($user_id) {
    $this->db->where('User_id', $user_id);
    $query = $this->db->get('palaute');
    return $query->result();
  }
//Hakee kaikki Palautteet
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
//Vaihtaa Palautteen tilan
  public function palaute_tila($data, $id) {
    $this->db->where('id', $id);
    $this->db->update('palaute', $data);
    return true;
  }
}
