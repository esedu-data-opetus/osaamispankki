<?php
class Users extends CI_Controller {
  public function register() {
    if ($this->session->userdata('Logged_In')) {
      redicet('home/index');
    }
    $this->form_validation->set_rules('etunimi', 'Etunimi', 'trim|required|max_length[50]|min_length[2]|alpha');
    $this->form_validation->set_rules('sposti', 'Sposti', 'trim|required|max_length[100]|min_length[5]|valid_email');
    $this->form_validation->set_rules('salasana', 'Salasana', 'trim|required|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('salasanaconfirm', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[salasana]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/register';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->User_model->create_member()) {
        $this->session->set_flashdata('registered', 'Olet rekisteröitynyt ja valmis kirjautumaan');
        redirect('home/index');
      }
    }
  }
  public function login() {
    $this->form_validation->set_rules('sposti', 'Sposti', 'trim|required|callback_validate_credentials');
		$this->form_validation->set_rules('salasana', 'Salasana', 'trim|md5');

    if($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/login';
      $this->load->view('layouts/main',$data);
    } else {
      $username = $this->input->post('sposti');
      $password = $this->input->post('salasana');

      $user_id = $this->User_model->login_user($username,$password);

      if($user_id){
        $user_data = array(
          'sposti' => $this->input->post('sposti'),
					'is_logged_in' => 1,
					'usertype' => $this->model_sivu->getusertype()
        );
        $this->session->set_userdata($user_data);

        $this->session->set_flashdata('login_success', 'Kirjautuminen onnistui!');
        redirect('home/index');
      } else {
        $this->session->set_flashdata('login_failed', 'Käyttäjä nimi tai salasana väärin :/');
        redirect('home/index');
      }
    }

  }
}
