<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  //Ensimmäinen asia mikä tapahtuu koko sivulla!
  //index method hakee Welcome_message:n.
  public function index() {
    $data['main_content'] = 'Welcome_message';
    $this->load->view('layouts/main',$data);
  }
  public function admin() {
    $query = $this->db->get('users');
    foreach($query->result() as $row) {
      if(md5($this->session->userdata('sposti')) == md5($row->Email) && $this->session->userdata('user_id') == $row->id && $this->session->userdata('KT') == 3) {
        $isconfirmed = true;
      }
    }
    if(isset($isconfirmed)) {
      $data['Prof_Info'] = $this->Haku_model->everyuser();

      $data['main_content'] = 'templates/Tests';
      $this->load->view('layouts/main',$data);
    } else {
      $this->session->set_flashdata('error', 'Access Denied!');
      redirect('Home/index');
    }
  }
}
