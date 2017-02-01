<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Palaute extends CI_Controller {

public function __construct(){
parent::__construct();

  if (!$this->session->userdata('is_logged_in')) {
    $this->session->set_flashdata('error', 'Access Denied!');
    redirect('home/index');
  }
}
  //Hakee kaikki palautteet
  public function index() {
    if (!$this->session->userdata('is_logged_in') || $this->session->userdata('KT') == 0) {
      $this->session->set_flashdata('error', 'Access Denaid!');
      redirect('home/index');
    }

    $data['Palautteet'] = $this->Palaute_model->hae_palaute();

    $data['main_content'] = 'Palautteet';
    $this->load->view('layouts/main',$data);
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
      $this->Palaute_model->Historiaa('Lisäsit palautteen aiheella "'.filter_var($this->input->post('Aihe'), FILTER_SANITIZE_STRING).'"');
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
  $data['Palautteet'] = $this->Palaute_model->hae_palaute();

  $data['main_content'] = 'Palautteesi';
  $this->load->view('layouts/main',$data);
}
//Vaihtaa palautteen tilaa
public function palaute_tila($Tila, $id) {
  if (!$this->session->userdata('is_logged_in') || $this->session->userdata('KT') == 0) {
    $this->session->set_flashdata('error', 'Access Denaid!');
    redirect('home/index');
  }
  $data = array(
    'Tila' => $Tila,
  );
  if ($this->Palaute_model->palaute_tila($data, $id)) {
    $this->session->set_flashdata('success', 'Palaute luettu!');
  } else {
    $this->session->set_flashdata('error', 'Tuli ongelma!');
  }
  redirect('Palaute');
}
//Poistaa palautteen
public function palaute_delete($id) {
  if (!$this->session->userdata('is_logged_in') || $this->session->userdata('KT') == 0) {
    $this->session->set_flashdata('error', 'Access Denaid!');
    redirect('home/index');
  }
  if ($this->Palaute_model->palaute_delete($id)) {
    $this->session->set_flashdata('success', 'Palaute poistettu!');
  } else {
    $this->session->set_flashdata('error', 'Palautetta ei voitu poistaa!');
  }
  redirect('Palaute');
  }
}
