<?php
class Profile extends CI_Controller {
  public function __construct(){
  parent::__construct();

  if (!$this->session->userdata('is_logged_in') && !$this->session->userdata('First_login')) {
    $this->session->set_flashdata('error', 'Access Denaid!');
    redirect('home/index');
  }
}
  public function index() {
    $user_id = $this->session->userdata('user_id');

    $data['meta_tieto'] = $this->Profile_model->get_meta($user_id);

    $data['kokemus'] = $this->Profile_model->Get_kokemukset($user_id);

    $data['User_Info'] = $this->Profile_model->get_profile($user_id);

    $data['main_content'] = 'profile_page';
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
  public function prototype() {
    if (!isset($kokemus)) {
      $kokemus = $this->uri->segment(3);
    }
    if (empty($kokemus)) {
      $kokemus = $this->input->post('Aihe');
    }
    $this->form_validation->set_rules('Aihe', 'Aihe', 'trim|required');
    $this->form_validation->set_rules('Loota_1', 'Loota_1', 'trim|required');
    $this->form_validation->set_rules('Loota_2', 'Loota_2', 'trim|required');
    $this->form_validation->set_rules('Loota_3', 'Loota_3', 'trim|required');
    $this->form_validation->set_rules('Aloitit', 'Aloitit', 'trim|required');
    $this->form_validation->set_rules('Lopetit', 'Lopetit', 'trim|required');
    $this->form_validation->set_rules('vapaasana', 'Mielipide', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = $kokemus;
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->prototype($user_id)) {
        $this->session->set_flashdata('success', 'Harrastus lisätty!');
        redirect('profile/index');
      }
    }
  }
  public function kokemus_update($id) {
    $data = array(
        'Loota_1'       =>     $this->input->post('Loota_1'),
        'Loota_2'       =>     $this->input->post('Loota_2'),
        'Loota_3'       =>     $this->input->post('Loota_3'),
        'Aloitit'       =>     $this->input->post('Aloitit'),
        'Lopetit'       =>     $this->input->post('Lopetit'),
        'Mielipide'     =>     $this->input->post('Mielipide')
    );
    if ($this->Profile_model->update_kokemus($id,$data)) {
      redirect('profile/index');
    }
  }

  public function profile_update($user_id) {
    $data = array(
      'F_Name'          =>    $this->input->post('f_name'),
      'L_Name'          =>    $this->input->post('l_name'),
      'Own_Email'       =>    $this->input->post('email'),
      'Osoite'          =>    $this->input->post('address'),
      'Posti_Num'       =>    $this->input->post('p_num'),
      'Puh_Num'         =>    $this->input->post('puh'),
      'About'           =>    $this->input->post('about')
    );
    if ($this->Profile_model->update_profile($user_id,$data)) {
      redirect('profile/index');
    }
  }

  public function delete($id) {
    $this->Profile_model->delete($id);
    redirect('profile/index');
  }
  public function haku() {
    $this->form_validation->set_rules('haku', 'hakusana', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'haku_uusi';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->Profile_model->hakee()) {
        $data['main_content'] = 'haku_uusi';
        $this->load->view('layouts/main',$data);
        return true;
      }
    }
  }
  public function add_meta() {
    if (empty($this->input->post('Tieto'))) {
      $this->session->set_flashdata('error', 'Sinun pitää täyttää loota!');
      redirect('profile/index');
    } else {
      $data = array(
          'User_id'     =>     $this->session->userdata('user_id'),
          'Tieto'       =>     $this->input->post('Tieto')
      );
      if ($this->Profile_model->meta_add($data)) {
        redirect('profile/index');
      }
    }
  }
  public function delete_meta($id) {
    $this->Profile_model->delete_meta($id);
    redirect('profile/index');
  }
}
