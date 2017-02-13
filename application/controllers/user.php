<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct() {
  parent::__construct();
  if (!$this->session->userdata('is_logged_in')) {
    $this->session->set_flashdata('error', 'Access Denied!');
    redirect('home/index');
  }
}
public function index() {
    $data['main_content'] = 'user';
    $this->load->view('layouts/main',$data);
  }
}
