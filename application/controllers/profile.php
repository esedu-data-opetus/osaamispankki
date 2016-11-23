<?php
class Profile extends CI_Controller {
  public function index() {
    $data['main_content'] = 'users/profile';
    $this->load->view('layouts/main',$data);
  }

  public function set_profile() {
    if ($this->session->userdata('is_logged_in') == 0) {
      redirect('home/index');
    }

    $this->form_validation->set_rules('own_email', 'Henkilökohtainen sähköpostiosoite', 'valid_email|max_length[30]');
		$this->form_validation->set_rules('f_name', 'Etunimi', 'trim|max_length[30]');
		$this->form_validation->set_rules('l_name', 'Sukunimi', 'trim|max_length[30]');
		$this->form_validation->set_rules('osoite', 'Osoite', 'trim|max_length[30]');
		$this->form_validation->set_rules('posti_num', 'Postinumero', 'trim');
		$this->form_validation->set_rules('puh_num', 'Puhelinnumero', 'trim|numeric|max_length[12]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/set_profile';
      $this->load->view('layouts/main',$data);
    } else {
      $key = $this->session->userdata('Key');
      if ($this->Profile_model->profile_setup($key)) {
        $this->session->set_flashdata('success', 'Perustiedot asetettu!');
        redirect('profile/index');
      }
    }
  }

  public function edit() {
    $data['main_content'] = 'users/profile_edit';
    $this->load->view('layouts/main',$data);
  }
}
