<?php
class Users extends CI_Controller {

  public function register() {
    if ($this->session->userdata('is_logged_in') == 1) {
      redirect('home/index');
    }

    $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|min_length[2]');
    $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/register';
      $this->load->view('layouts/main',$data);
    } else {
      $key = md5(uniqid());
      if ($this->User_model->send_mail($key)) {
        if ($this->User_model->create_member($key)) {
          $data = array(
  					'First_login' =>  True,
          );
          $this->session->set_userdata($data);
          $this->session->set_flashdata('registered', 'Sähköposti lähetetty! <br>Käy vahvistamassa se sähköpostissasi!');
          redirect('home/index');
        }
      } else {
        $this->session->set_flashdata('error', 'Sähköpostin lähetyksessä on ongelma!');
        redirect('home/index');
      }
    }
  }
  public function login() {
    if ($this->session->userdata('is_logged_in') == 1) {
      redirect('home/index');
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

    if($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/login';
      $this->load->view('layouts/main',$data);
    } else {
      $username = filter_var($this->input->post('email'), FILTER_SANITIZE_STRING);
      $password = $this->input->post('password');
      $user_id = $this->User_model->login_user($username,$password);
      $user_key = $this->User_model->fetch_key($username,$password);

        if($user_id){
        $data = array(
          'Key'          =>  $user_key,
          'user_id'      =>  $user_id,
          'sposti'       =>  $this->input->post('email'),
					'is_logged_in' =>  1
        );
        $this->session->set_userdata($data);
        if ($this->session->userdata('First_login')) {
          $this->session->set_flashdata('login_success', 'Kirjautuminen onnistui! Kirjoita henkilötietosi seuraavaksi!');
          redirect('profile/set_profile');
        } else {
          redirect('home/index');
          $this->session->set_flashdata('login_success', 'Kirjautuminen onnistui!');
          redirect('home/index');
        }
      } else {
        $this->session->set_flashdata('login_failed', 'Käyttäjä nimi tai salasana väärin :/');
        redirect('home/index');
      }
    }
  }
  public function logout() {
    $this->session->unset_userdata('is_logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('sposti');
    $this->session->sess_destroy();
    redirect('home/index');
  }
  public function C_Key($key) {
    if ($this->User_model->C_Email($key)) {
      $data = array(
            'C_Email'   =>    TRUE
          );
      $this->session->set_userdata($data);
      $this->session->set_flashdata('success', 'Käyttäjä on vahvistettu ja voit kirjautua!');
      redirect('home/index');
    }
  }
}
