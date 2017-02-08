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

  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'Haku2';
    $this->load->view('layouts/main',$data);
  } else {
    $hakusana =  $this->input->post('haku');
    $data['haku_tulokset'] = $this->Haku_model->haku($hakusana);
    $data['main_content'] = 'Haku2';
    $this->load->view('layouts/main',$data);
    }
  }
}
