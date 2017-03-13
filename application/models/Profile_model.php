<?php
class Profile_model extends CI_Model {
  public function profile_setup() {

    if(strpos($this->session->userdata('sposti'), "esedulainen.fi")) {
      $KT = 0;
    } elseif(strpos($this->session->userdata('sposti'), "esedu.fi")) {
      $KT = 2;
    } else {
      $KT = 1;
    }

    $Profile = array(
        'User_id'       =>     $this->session->userdata('user_id'),
        'F_Name'        =>     $this->input->post('f_name'),
        'L_Name'        =>     $this->input->post('l_name'),
        'C_Key'         =>     $this->session->userdata('Key'),
        'Puh_Num'       =>     $this->input->post('puh_num'),
        'About'         =>     'Muu',
        'Own_Email'     =>     $this->input->post('own_email'),
        'Sposti'        =>     $this->session->userdata('sposti'),
        'Osoite'        =>     $this->input->post('osoite'),
        'Posti_Num'     =>     $this->input->post('posti_num'),
        'KT'            =>     $KT,
        'Näytä_Profiili'=>     'Kylla'
    );
    $insert = $this->db->insert('profile',$Profile);
    if ($insert) {
      return true;
    }
  }
  public function profile_settings() {
    $settings = array(
        'User_id'       =>     $this->session->userdata('user_id'),
        'Del_Vahvistus' =>     true
    );
    $insert = $this->db->insert('asetukset', $settings);
    if ($insert) {
      return true;
    }
  }
  public function suosittelijat() {
    $data = array(
      'User_id'       =>  $this->session->userdata('user_id'),
      'Suosittelija'  =>  $this->session->userdata('sposti'),
      'Suositeltu'    =>  $this->input->post('suosittelija'),
    );
    $insert = $this->db->insert('suosittelijat',$data);
    if ($insert) {
      return true;
    }
  }
  public function suos_del($spot) {
    $this->db->where('id', $spot);
    $this->db->delete('suosittelijat');
    return true;
  }
  public function suos_hide($fact, $spot) {
    $data = array(
      'Show'  =>  $fact,
    );
    if (strlen($spot) == 32) {
      $this->db->where('md5(Suositeltu)', $spot);
    } else {
      $this->db->where('id', $spot);
    }
    $this->db->update('suosittelijat', $data);
    return true;
  }
  public function suositukset() {
    $this->db->select('*');
    $this->db->from('suosittelijat');
    $this->db->where('Show', 'Kylla');
    $query = $this->db->get();
    return $query->result();
  }
  public function sousijat($Sposti) {
    $this->db->select('*');
    $this->db->from('suosittelijat');
    $this->db->where('Suositeltu', $Sposti);
    $query = $this->db->get();
    return $query->result();
  }
  public function suositeltu($Sposti) {
    $this->db->select('*');
    $this->db->from('suosittelijat');
    $this->db->where('Suosittelija', $Sposti);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_settings($user_id) {
    $this->db->where('User_id',$user_id);
    $query = $this->db->get('asetukset');
    return $query->result();
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
        $this->db->where('User_id', $user_id);
        $query = $this->db->get();
        return $query->result();
  }
  public function get_user($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
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
        'loppui'          =>     $this->input->post('Lopetit'),
        'vapaasana'          =>     $this->input->post('vapaasana')
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
  public function hide($user_id, $data) {
    $this->db->where('User_id',$user_id);
    $this->db->update('profile',$data);
    return TRUE;
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
  public function update_profile($user_id,$data) {
    $this->db->where('User_id',$user_id);
    $this->db->update('profile',$data);
    return TRUE;
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
  public function meta_add($data) {
    $insert = $this->db->insert('metatieto',$data);
    if ($insert) {
      return true;
    }
  }
  //Lisää historiaa
  public function Historiaa($Toiminta) {
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

public function getUsername($sposti) {
  $this->db->select('F_Name', 'L_Name');
  $this->db->from('profile');
  $this->db->where('Sposti', $sposti);
  $query = $this->db->get();
  return $query->result();
}

  public function share($us_id, $email, $sposti, $username) {
    // $username = $data['uname'];
    foreach($username as $uname) {
      $dataset[] = implode(', ', $uname);
    }
    $content = implode("\n", $dataset);
    $message = "<p>".$uname." jakoi profiilinsa. Profiiliin pääset <a href='".base_url()."Haku/User/".$us_id."/".md5($sposti)."' >tästä</a>!</p>";
    $this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
    $this->email->from('osaamispankki@esedu.fi', 'Osaamispankki');
    $this->email->to($email);
    $this->email->subject("Käyttäjä jakoi profiilin.");
    $this->email->message($message);
    if ($this->email->send()) {
      return true;
    } else {
      return false;
    }
  }
}
