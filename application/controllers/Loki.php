<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loki extends CI_Controller {
  public function index() {
    $data['main_content'] = "Loki";
    $this->load->view('layouts/main', $data);
  }
}
