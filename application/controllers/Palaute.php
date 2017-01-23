<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Palaute extends CI_Controller {
//Vie pois palautteista
public function index() {
  redirect('home/index');
}
//Asettaa inputeilla säännot ja hakee palautteen lisäys näkymän
public function Palautteesi() {
  $this->form_validation->set_rules('Sposti', 'Sposti', 'trim|required|valid_email');
  $this->form_validation->set_rules('Aihe', 'Aihe', 'trim|required');
  $this->form_validation->set_rules('Palaute', 'Palaute', 'trim|required');
  if ($this->form_validation->run() !== True) {
    $data['main_content'] = "Luo_palaute";
    $this->load->view('layouts/main', $data);
  } else {
    if ($this->session->userdata('user_id')) {
      $User_id = $this->session->userdata('user_id');
    } else {
      $User_id = 0;
    }
    if($this->Palaute_model->Palaute($User_id)) {
      $this->session->set_flashdata('success', 'Kiitos Palautteesta!');
      redirect('Home/index');
    } else {
      $this->session->set_flashdata('error', 'Jotain Meni Pieleen :/');
      redirect('Home/index');
    }
  }
}
//Hakee käyttäjille palautteensa
public function hae_palaute_user() {
  $data['Palautteet'] = $this->Profile_model->hae_palaute();

  $data['main_content'] = 'Palautteesi';
  $this->load->view('layouts/main',$data);
}
//Hakee kaikki palautteet
public function hae_palaute() {
  $data['Palautteet'] = $this->Profile_model->hae_palaute();

  $data['main_content'] = 'Palautteet';
  $this->load->view('layouts/main',$data);
}
//Vaihtaa palautteen tilaa
public function palaute_tila($Tila, $id) {
  $data = array(
    'Tila' => $Tila,
  );
  if ($this->Profile_model->palaute_tila($data, $id)) {
    $this->session->set_flashdata('success', 'Palaute luettu!');
  } else {
    $this->session->set_flashdata('error', 'Tuli ongelma!');
  }
  redirect('Palaute/hae_palaute');
}
//Poistaa palautteen
public function palaute_delete($id) {
  if ($this->Profile_model->palaute_delete($id)) {
    $this->session->set_flashdata('success', 'Palaute poistettu!');
  } else {
    $this->session->set_flashdata('error', 'Palautetta ei voitu poistaa!');
  }
  redirect('Palaute/hae_palaute');
  }
}
