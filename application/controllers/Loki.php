<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loki extends CI_Controller {
  public function index() {
    $User_id = $this->session->userdata('user_id');
    $data['Historia'] = $this->Loki_model->Hae_historia($User_id);

    $data['main_content'] = "Loki";
    $this->load->view('layouts/main', $data);
  }
}
