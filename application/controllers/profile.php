<?php
class Profile extends CI_Controller {
  public function index() {
    $data['main_content'] = 'profile';
    $this->load->view('layouts/main',$data);
  }
}
