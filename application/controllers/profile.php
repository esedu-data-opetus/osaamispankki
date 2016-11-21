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
		$this->form_validation->set_rules('F_Name', 'Etunimi', 'alpha|trim|max_length[30]');
		$this->form_validation->set_rules('L_Name', 'Sukunimi', 'alpha|trim|max_length[30]');
		$this->form_validation->set_rules('osoite', 'Osoite', 'trim|max_length[30]');
		$this->form_validation->set_rules('postinro', 'Postinumero', 'trim');
		$this->form_validation->set_rules('p_nro', 'Puhelinnumero', 'trim|numeric|max_length[12]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/set_profile';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->Profile_model->add_prof()) {
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
