<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php
class Home extends CI_Controller {
  public function index() {
    $data['main_content'] = 'Welcome_message';
    $this->load->view('layouts/main',$data);
  }
}
