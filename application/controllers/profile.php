<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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

    $data['Palautteet'] = $this->Profile_model->hae_palaute();

    $data['meta_tieto'] = $this->Profile_model->get_meta($user_id);

    $data['harrastus'] = $this->Profile_model->Get_harrastus($user_id);

    $data['tyohistoria'] = $this->Profile_model->Get_tyohistoria($user_id);

    $data['koulutus'] = $this->Profile_model->Get_koulutus($user_id);

    $data['kortit'] = $this->Profile_model->Get_kortit($user_id);

    $data['User_Info'] = $this->Profile_model->get_profile($user_id);

    $data['main_content'] = 'profile_page';
    $this->load->view('layouts/main',$data);
  }

  public function set_profile() {
    if ($this->session->userdata('is_logged_in') == 0) {
      redirect('home/index');
    }

    $this->form_validation->set_rules('own_email', 'Henkilökohtainen sähköpostiosoite', 'required|valid_email|max_length[30]');
		$this->form_validation->set_rules('f_name', 'Etunimi', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('l_name', 'Sukunimi', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('osoite', 'Osoite', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('posti_num', 'Postinumero', 'required|trim');
		$this->form_validation->set_rules('puh_num', 'Puhelinnumero', 'required|trim|numeric|max_length[12]');

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
  public function harrastus() {
    $this->form_validation->set_rules('harrastus', 'harrastus', 'trim|required');
    $this->form_validation->set_rules('vapaasana', 'vapaasana', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/Harrastus';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->harrastus($user_id)) {
        $this->session->set_flashdata('success', 'Harrastus lisätty!');
        redirect('profile/harrastus');
      }
    }
  }
  public function harrastus_delete($id) {
    $this->Profile_model->harrastus_delete($id);
    redirect('profile/index');
  }
  public function harrastus_update($id) {
    $data = array(
        'harrastus'       =>     filter_var($this->input->post('harrastus'), FILTER_SANITIZE_STRING),
        'vapaasana'       =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->harrastus_update($id,$data)) {
      redirect('profile/index');
    }
  }
  public function tyohistoria() {
    $this->form_validation->set_rules('tyopaikka', 'tyopaikka', 'trim|required');
    $this->form_validation->set_rules('tehtava', 'tehtava', 'trim|required');
    $this->form_validation->set_rules('Aloitit', 'alkoi', 'trim|required');
    $this->form_validation->set_rules('Lopetit', 'loppui', 'trim|required');
    $this->form_validation->set_rules('vapaasana', 'vapaasana', 'trim');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/tyohistoria';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->tyohistoria($user_id)) {
        $this->session->set_flashdata('success', 'Työhistoria lisätty!');
        redirect('profile/tyohistoria');
      }
    }
  }
  public function tyohistoria_delete($id) {
    $this->Profile_model->tyohistoria_delete($id);
    redirect('profile/index');
  }
  public function tyohistoria_update($id) {
    $data = array(
      'tyopaikka'     =>     filter_var($this->input->post('tyopaikka'), FILTER_SANITIZE_STRING),
      'tehtava'       =>     filter_var($this->input->post('tehtava'), FILTER_SANITIZE_STRING),
      'alkoi'         =>     filter_var($this->input->post('Aloitit'), FILTER_SANITIZE_STRING),
      'loppui'        =>     filter_var($this->input->post('Lopetit'), FILTER_SANITIZE_STRING),
      'kuvaus'        =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->tyohistoria_update($id,$data)) {
      redirect('profile/index');
    }
  }
  public function koulutus() {
    $this->form_validation->set_rules('koulutusnimi', 'koulutusnimi', 'trim|required');
    $this->form_validation->set_rules('koulutusaste', 'koulutusaste', 'trim|required');
    $this->form_validation->set_rules('oppilaitos', 'oppilaitos', 'trim|required');
    $this->form_validation->set_rules('Aloitit', 'alkoi', 'trim|required');
    $this->form_validation->set_rules('Lopetit', 'loppui', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/koulutus';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->koulutus($user_id)) {
        $this->session->set_flashdata('success', 'Koulutus Lisätty!');
        redirect('profile/koulutus');
      }
    }
  }
  public function koulutus_delete($id) {
      $this->Profile_model->koulutus_delete($id);
      redirect('profile/index');
  }
  public function koulutus_update($id) {
    $data = array(
        'koulutusnimi'    =>     filter_var($this->input->post('koulutusnimi'), FILTER_SANITIZE_STRING),
        'koulutusaste'    =>     filter_var($this->input->post('koulutusaste'), FILTER_SANITIZE_STRING),
        'oppilaitos'      =>     filter_var($this->input->post('oppilaitos'), FILTER_SANITIZE_STRING),
        'alkoi'           =>     filter_var($this->input->post('alkoi'), FILTER_SANITIZE_STRING),
        'loppui'          =>     filter_var($this->input->post('loppui'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->koulutus_update($id,$data)) {
      redirect('profile/index');
    }
  }
  public function kortit() {
    $this->form_validation->set_rules('kortti', 'kortti', 'trim|required');
    $this->form_validation->set_rules('Lopetit', 'Lopetit', 'trim|required');
    $this->form_validation->set_rules('vapaasana', 'vapaasana', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/kortit';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->kortit($user_id)) {
        $this->session->set_flashdata('success', 'Kortti Lisätty!');
        redirect('profile/kortit');
      }
    }
  }
  public function kortit_delete($id) {
    $this->Profile_model->kortit_delete($id);
    redirect('profile/index');
  }
  public function hide($tila, $user_id) {
    if ($tila == 'Kylla') {
      $data = array('Näytä_Profiili'  =>  'Kylla');
      $fd = $this->session->set_flashdata('success', 'Profiili Näkyy Muilla');
    } else {
      $data = array('Näytä_Profiili'  =>  'Ei');
      $fd = $this->session->set_flashdata('error', 'Profiili Ei Näy Muilla');
    }

    if ($this->Profile_model->hide($user_id,$data)) {
      $fb;
      redirect('profile/index');
    }
  }
  public function profile_update($user_id) {
    $data = array(
      'F_Name'          =>    filter_var($this->input->post('F_Name'), FILTER_SANITIZE_STRING),
      'L_Name'          =>    filter_var($this->input->post('L_Name'), FILTER_SANITIZE_STRING),
      'Own_Email'       =>    filter_var($this->input->post('email'), FILTER_SANITIZE_STRING),
      'Osoite'          =>    filter_var($this->input->post('address'), FILTER_SANITIZE_STRING),
      'Posti_Num'       =>    filter_var($this->input->post('p_num'), FILTER_SANITIZE_STRING),
      'Puh_Num'         =>    filter_var($this->input->post('puh'), FILTER_SANITIZE_STRING),
      'About'           =>    filter_var($this->input->post('about'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->update_profile($user_id,$data)) {
      redirect('profile/index');
    }
  }
  public function haku() {
    $this->form_validation->set_rules('haku', 'hakusana', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'haku';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->Profile_model->hakee()) {
        $data['main_content'] = 'haku';
        $this->load->view('layouts/main',$data);
        return true;
      }
    }
  }
  public function add_meta() {
    if (empty($this->input->post('Tieto'))) {
      $this->session->set_flashdata('error', 'Täytä Tyhjä Kohta!');
      redirect('profile?add_meta');
    } else {
      $data = array(
          'User_id'     =>     $this->session->userdata('user_id'),
          'Tieto'       =>     filter_var($this->input->post('Tieto'), FILTER_SANITIZE_STRING)
      );
      if ($this->Profile_model->meta_add($data)) {
        redirect('profile?add_meta');
      }
    }
  }
  public function delete_all_meta($user_id) {
    $this->Profile_model->delete_all_meta($user_id);
    redirect('profile/index');
  }
  public function delete_meta($id) {
    $this->Profile_model->delete_meta($id);
    redirect('profile/index');
  }
  public function hae_palaute_user($user_id) {
    $data['Palautteet'] = $this->Profile_model->hae_palaute_user($user_id);

    $data['main_content'] = 'Palautteesi';
    $this->load->view('layouts/main',$data);
  }
  public function hae_palaute() {
    $data['Palautteet'] = $this->Profile_model->hae_palaute();

    $data['main_content'] = 'Palautteet';
    $this->load->view('layouts/main',$data);
  }
  public function palaute_tila($Tila, $id) {
    $data = array(
      'Tila' => $Tila,
    );
    if ($this->Profile_model->palaute_tila($data, $id)) {
      $this->session->set_flashdata('success', 'Palaute Luettu!');
    } else {
      $this->session->set_flashdata('error', 'Tuli Ongelma!');
    }
    redirect('profile/hae_palaute');
  }
  public function palaute_delete($id) {
    if ($this->Profile_model->palaute_delete($id)) {
      $this->session->set_flashdata('success', 'Palaute Poistettu!');
    } else {
      $this->session->set_flashdata('error', 'Palautetta Ei voitu Poistaa!');
    }
    redirect('profile/hae_palaute');
  }
}
