<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku extends CI_Controller {
  public function __construct() {
  parent::__construct();
  if (!$this->session->userdata('is_logged_in') || $this->session->userdata('KT') == 0) {
    $this->session->set_flashdata('error', 'Access Denied!');
    redirect('home/index');
  }
}
//Hakee profiilit, metatiedot ja kaikki kokemukset(Harrastukset, Työhistoria, Koulutukset ja Kortit)
public function index() {
  $this->form_validation->set_rules('haku', 'Hakusana', 'trim');
  $data['Profile'] = $this->Haku_model->Hae_Profiilit();
  $data['Harrastukset'] = $this->Haku_model->Hae_Harrastukset();
  $data['Tyohistoria'] = $this->Haku_model->Hae_Tyohistoriat();
  $data['Koulutus'] = $this->Haku_model->Hae_Koulutukset();
  $data['Kortit'] = $this->Haku_model->Hae_KKortit();
  $data['Metatieto'] = $this->Haku_model->Hae_Metatiedot();
  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'Haku';
    $this->load->view('layouts/main',$data);
  } else {
    if ($this->Haku_model->hakee()) {
      $data['haut'] = $this->Haku_model->hakee();
      $data['main_content'] = 'Haku';
      $this->load->view('layouts/main',$data);
    } else {
      $data['Prof'] = $this->Haku_model->hae_profiilit();
      $data['main_content'] = 'Haku';
      $this->load->view('layouts/main',$data);
      }
    }
  }
}
