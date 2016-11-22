<?php
class Profile extends CI_Controller {
  public function index() {
    $data['main_content'] = 'users/profile';
    $this->load->view('layouts/main',$data);
  }

  public function set_profile() {
    if ($this->session->userdata('is_logged_in') == 1) {
      redirect('home/index');
    }

    $this->form_validation->set_rules('Email', 'Henkilökohtainen sähköpostiosoite', 'valid_email|max_length[30]');
		$this->form_validation->set_rules('F_Name', 'Etunimi', 'trim|max_length[30]');
		$this->form_validation->set_rules('L_Name', 'Sukunimi', 'trim|max_length[30]');
		$this->form_validation->set_rules('Osoite', 'Osoite', 'trim|max_length[30]');
		$this->form_validation->set_rules('Posti_Num', 'Postinumero', 'trim');
		$this->form_validation->set_rules('Puh_Num', 'Puhelinnumero', 'trim|numeric|max_length[12]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/set_profile';
      $this->load->view('layouts/main',$data);
    } else {
      $key = $this->session->userdata('Key');
      if ($this->Profile_model->profile_setup($key)) {
        $this->session->set_flashdata('registered', 'Olet rekisteröitynyt ja valmis kirjautumaan');
        redirect('home/index');
      }
    }
  }

  public function edit() {
    $data['main_content'] = 'users/profile_edit';
    $this->load->view('layouts/main',$data);
  }
}
