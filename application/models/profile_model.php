<?php
class Profile_model extends CI_Model {
  public function profile_setup() {
    $Profile = array(
        'User_id'       =>     $this->session->userdata('user_id'),
        'F_Name'        =>     $this->input->post('f_name'),
        'L_Name'        =>     $this->input->post('l_name'),
        'C_Key'         =>     $this->session->userdata('Key'),
        'Puh_Num'       =>     $this->input->post('puh_num'),
        'About'         =>     'Muu',
        'Own_Email'     =>     $this->input->post('own_email'),
        'Osoite'        =>     $this->input->post('osoite'),
        'Posti_Num'     =>     $this->input->post('posti_num'),
        'SukuP'         =>     'Muu'
    );
    $insert = $this->db->insert('profile',$Profile);
    if ($insert) {
      return true;
    }
  }
  public function Get_harrastus($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('harrastukset');
    return $query->result();
  }
  public function Get_tyohistoria($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('tyohistoria');
    return $query->result();
  }
  public function Get_koulutus($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('koulutus');
    return $query->result();
  }
  public function Get_kortit($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('kkortit');
    return $query->result();
  }
  public function get_meta($user_id) {
    $this->db->select('*');
    $this->db->from('metatieto');
    $this->db->where('User_id',$user_id);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_profile($user_id) {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('User_id',$user_id);
        $query = $this->db->get();
        return $query->result();
  }
  public function tyohistoria($user_id) {
    $data = array(
        'User_id'       =>     $user_id,
        'tyopaikka'     =>     $this->input->post('tyopaikka'),
        'tehtava'       =>     $this->input->post('tehtava'),
        'alkoi'         =>     $this->input->post('Aloitit'),
        'loppui'        =>     $this->input->post('Lopetit'),
        'kuvaus'        =>     $this->input->post('vapaasana')
    );
    $insert = $this->db->insert('tyohistoria',$data);
    if ($insert) {
      return true;
    }
  }
  public function koulutus($user_id) {
    $data = array(
        'User_id'         =>     $user_id,
        'koulutusnimi'    =>     $this->input->post('koulutusnimi'),
        'koulutusaste'    =>     $this->input->post('koulutusaste'),
        'oppilaitos'      =>     $this->input->post('oppilaitos'),
        'alkoi'           =>     $this->input->post('Aloitit'),
        'loppui'          =>     $this->input->post('Lopetit')
    );
    $insert = $this->db->insert('koulutus',$data);
    if ($insert) {
      return true;
    }
  }
  public function kortit($user_id) {
    $data = array(
        'User_id'     =>     $user_id,
        'kortti'      =>     $this->input->post('kortti'),
        'loppuu'      =>     $this->input->post('Lopetit'),
        'vapaasana'   =>     $this->input->post('vapaasana')
    );
    $insert = $this->db->insert('kkortit',$data);
    if ($insert) {
      return true;
    }
  }
  public function koulutus_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('koulutus');
    return true;
  }
  public function kortit_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('kkortit');
    return true;
  }
  public function koulutus_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('koulutus',$data);
    return TRUE;
  }
  public function tyohistoria_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('tyohistoria');
    return true;
  }
  public function tyohistoria_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('tyohistoria',$data);
    return TRUE;
  }
  public function harrastus($user_id) {
    $data = array(
        'User_id'       =>     $user_id,
        'harrastus'     =>     $this->input->post('harrastus'),
        'vapaasana'     =>     $this->input->post('vapaasana')
    );
    $insert = $this->db->insert('harrastukset',$data);
    if ($insert) {
      return true;
    }
  }
  public function harrastus_update($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('harrastukset',$data);
    return TRUE;
  }
  public function harrastus_delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('harrastukset');
    return true;
  }
  public function prototype($user_id) {
    $Prototype = array(
        'User_id'       =>     $user_id,
        'Aihe'          =>     $this->input->post('Aihe'),
        'Loota_1'       =>     $this->input->post('Loota_1'),
        'Loota_2'       =>     $this->input->post('Loota_2'),
        'Loota_3'       =>     $this->input->post('Loota_3'),
        'Aloitit'       =>     $this->input->post('Aloitit'),
        'Lopetit'       =>     $this->input->post('Lopetit'),
        'Mielipide'     =>     $this->input->post('vapaasana')
    );
    $insert = $this->db->insert('kokemukset',$Prototype);
    if ($insert) {
      return true;
    }
  }
  public function Get_kokemukset($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('kokemukset');
    return $query->result();
  }
  public function update_kokemus($id,$data) {
    $this->db->where('id',$id);
    $this->db->update('kokemukset',$data);
    return TRUE;
  }
  public function update_profile($user_id,$data) {
    $this->db->where('User_id',$user_id);
    $this->db->update('profile',$data);
    return TRUE;
  }
  public function delete($id) {
    $this->db->where('id',$id);
    $this->db->delete('kokemukset');
    return true;
  }
  public function delete_all_meta($user_id) {
    $this->db->where('User_id',$user_id);
    $this->db->delete('metatieto');
    return true;
  }
  public function delete_meta($id) {
    $this->db->where('id',$id);
    $this->db->delete('metatieto');
    return true;
  }
  public function hakee() {
    $haku = $this->input->post('haku');
    $data = array(
      'harrastukset',
      'kkortit',
      'kortit',
      'koulutus',
      'profile',
      'tyohistoria',
    );
    foreach ($data as $haku) {
      echo "<h1><i>".$haku."</i></h1>";
    }
  }
  public function meta_add($data) {
    $insert = $this->db->insert('metatieto',$data);
    if ($insert) {
      return true;
    }
  }
}
