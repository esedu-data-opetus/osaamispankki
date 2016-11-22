<?php
class Profile_model extends CI_Model {
  public function profile_setup() {
    $Profile = array(
        'User_id'       =>     $Ui,
        'F_Name'        =>     $Email,
        'L_Name'        =>     $enc_password,
        'C_Key'         =>     $key,
        'Puh_Num'       =>     $Pn,
        'About'         =>     $About,
        'Own_Email'     =>     $Oe,
        'Osoite'        =>     $address,
        'Posti_Num'     =>     $An,
        'SukuP'         =>     $Sp
    );
    $insert = $this->db->insert('profile',$Profile);
  }
}
