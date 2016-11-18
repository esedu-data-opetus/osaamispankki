<?php
class Profile extends CI_Controller {
  public function index() {
    $data['main_content'] = 'users/profile';
    $this->load->view('layouts/main',$data);
  }

  public function set_profile() {
    // if ($this->session->userdata('is_logged_in') == 1) {
    //   redirect('home/index');
    // }
    //
    // $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|min_length[2]');
    // $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');
    // $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
		// $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');
    //
    // if ($this->form_validation->run() == FALSE) {
    //   $data['main_content'] = 'users/register';
    //   $this->load->view('layouts/main',$data);
    // } else {
    //   if ($this->Profile_model->) {
    //     $this->session->set_flashdata('registered', 'Olet rekisteröitynyt ja valmis kirjautumaan');
    //     redirect('home/index');
    //   }
    // }
  }

  public function edit() {
  }
}
