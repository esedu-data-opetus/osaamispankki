<?php
class Users extends CI_Controller {
  public function register() {
    if ($this->session->userdata('Logged_In')) {
      redicet('home/index');
    }
    $this->form_validation->set_rules('password2', 'Confirm Password','');


    $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|min_length[2]');
    $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/register';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->User_model->create_member()) {
        $this->session->set_flashdata('registered', 'Olet rekisteröitynyt ja valmis kirjautumaan');
        redirect('home');
      }
    }
  }
  public function login() {
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

    if($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/login';
      $this->load->view('layouts/main',$data);
    } else {
      $username = $this->input->post('email');
      $password = $this->input->post('password');

      $user_id = $this->User_model->login_user($username,$password);

      if($user_id){
        $data = array(
          'sposti' => $this->input->post('email'),
					'is_logged_in' => 1
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('login_success', 'Kirjautuminen onnistui!');
        redirect('home');
      } else {
        $this->session->set_flashdata('login_failed', 'Käyttäjä nimi tai salasana väärin :/');
        redirect('home');
      }
    }

  }
}
