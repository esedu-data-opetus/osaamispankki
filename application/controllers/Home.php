<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Home extends CI_Controller {
  //Ensimmäinen asia mikä tapahtuu koko sivulla!
  //index method hakee Welcome_message:n.
  public function index() {
    $data['main_content'] = 'Welcome_message';
    $this->load->view('layouts/main',$data);
  }
}
