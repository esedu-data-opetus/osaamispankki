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
  public function get_profile($user_id) {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('User_id',$user_id);
        $query = $this->db->get();
        return $query->result();

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
  public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('kokemukset');
    return true;
  }
}
