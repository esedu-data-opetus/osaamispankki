<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }
//Hakee profiilit, metatiedot ja kaikki kokemukset(Harrastukset, Työhistoria, Koulutukset ja Kortit)
public function index() {
  if (!$this->session->userdata('is_logged_in') || $this->session->userdata('KT') == 0) {
    $this->session->set_flashdata('error', 'Access Denied!');
    redirect('home/index');
  }
  $this->form_validation->set_rules('haku', 'Hakusana', 'trim');

  if ($this->form_validation->run() == FALSE) {
    $hakusana =  $this->input->post('haku');
    $data['all_users'] = $this->Haku_model->allUsers($hakusana);
    $data['main_content'] = 'Haku2';
    $this->load->view('layouts/main',$data);
  } else {
    $hakusana =  $this->input->post('haku');
    $suodatin = array(
      'Harrastukset' => $this->input->post('harrastukset'),
      'Työhistoria' => $this->input->post('tyohistoria'),
      'Koulutus' => $this->input->post('koulutus'),
      'Kortit' => $this->input->post('kortit'),
      'Metatieto' => $this->input->post('metatieto'),
    );
    $data['haku_tulokset'] = $this->Haku_model->haku($hakusana, $suodatin);
    $data['main_content'] = 'Haku2';
    $this->load->view('layouts/main',$data);
    }
  }
  public function User($User_id, $user) {
    if ($this->Haku_model->User($user)) {
      $data['user_data'] = $this->Haku_model->User($user);
      $data['suositukset'] = $this->Profile_model->suositukset();
      $data['harrastus'] = $this->Profile_model->Get_harrastus($User_id);
      $data['tyohistoria'] = $this->Profile_model->Get_tyohistoria($User_id);
      $data['koulutus'] = $this->Profile_model->Get_koulutus($User_id);
      $data['kortit'] = $this->Profile_model->Get_kortit($User_id);

      $data['main_content'] = "user";
      $this->load->view('layouts/main', $data);
    } else {
      $this->session->set_flashdata('error', 'Käyttäjä on olemattomissa tai piilossa.');
      redirect('Haku');
    }
  }
//   public function haku_proto() {
//     $this->form_validation->set_rules('search', 'Search', 'trim');
//
//   if ($this->form_validation->run() == FALSE) {
//     $data['main_content'] = "haku_proto";
//     $this->load->view('layouts/main', $data);
// } else {
//     $search =  $this->input->post('search');
//     $query = $this->Haku_model->searchProto($search);
//     header('Content-Type: application/json');
//     echo json_encode ($query);
//     $data['main_content'] = "haku_proto";
//     $this->load->view('layouts/main',$data);
//   }
//   }
}
