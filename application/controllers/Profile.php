<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php
class Profile extends CI_Controller {
//Varmistaa että käyttäjä on kirjautunu sisälle
  public function __construct(){
  parent::__construct();

  if (!$this->session->userdata('is_logged_in')) {
    $this->session->set_flashdata('error', 'Access Denied!');
    redirect('home/index');
  }
}
//Hakee käyttäjäntiedot, metatiedot ja kokemukset ja näkymän profiilisivulle
  public function index() {
    $user_id = $this->session->userdata('user_id');
    $Sposti = $this->session->userdata('sposti');

    $data['Palautteet'] = $this->Palaute_model->hae_palaute();

    $data['meta_tieto'] = $this->Profile_model->get_meta($user_id);

    $data['harrastus'] = $this->Profile_model->Get_harrastus($user_id);

    $data['tyohistoria'] = $this->Profile_model->Get_tyohistoria($user_id);

    $data['koulutus'] = $this->Profile_model->Get_koulutus($user_id);

    $data['kortit'] = $this->Profile_model->Get_kortit($user_id);

    $data['Prof_Info'] = $this->Profile_model->get_profile($user_id);

    $data['Prof_Settings'] = $this->Profile_model->get_settings($user_id);

    $data['User_Info'] = $this->Profile_model->get_user($user_id);

    $data['suosittelijat'] = $this->Profile_model->sousijat($Sposti);

    $data['suositeltu'] = $this->Profile_model->suositeltu($Sposti);

    $data['main_content'] = 'profile_page';
    $this->load->view('layouts/main',$data);
  }
//Hakee profiilin luonnin näkymän ja asettaa inputeille säännöt
  public function set_profile($w) {
    if ($this->session->userdata('is_logged_in') == 0) {
      redirect('home/index');
    }
    $user_id = $this->session->userdata('user_id');
    $data['Prof_Info'] = $this->Profile_model->get_profile($user_id);
    $data['Prof_Settings'] = $this->Profile_model->get_settings($user_id);

    $this->form_validation->set_rules('own_email', 'Henkilökohtainen sähköpostiosoite', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('f_name', 'Etunimi', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('l_name', 'Sukunimi', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('osoite', 'Osoite', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('posti_num', 'Postinumero', 'required|trim');
		$this->form_validation->set_rules('puh_num', 'Puhelinnumero', 'required|trim|numeric|max_length[100]');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'users/set_profile';
      $this->load->view('layouts/main',$data);
    } else {
      $User_id = $this->session->userdata('user_id');
      if ($w == "b") {
        if ($this->Profile_model->profile_setup() && $this->Profile_model->profile_settings($User_id)) {
          $this->Profile_model->Historiaa('Asetit perustietosi & asetukset');
          $this->session->set_flashdata('success', 'Perustiedot asetettu!');
          redirect('profile/index');
        }
      } else if ($w == "p") {
        if ($this->Profile_model->profile_setup()) {
          $this->Profile_model->Historiaa('Asetit perustietosi');
          $this->session->set_flashdata('success', 'Perustiedot asetettu!');
          redirect('profile/index');
        }
      }
    }
  }
  public function settings($User) {
    $data['Prof_Info'] = $this->Profile_model->get_profile($User);

    $data['main_content'] = "Settings";
    $this->load->view('layouts/main', $data);
  }
  public function Ajax_Test() {
    $data['main_content'] = "Ajax_test";
    $this->load->view('layouts/main', $data);
  }
  public function suos_hide($fact,$spot) {
    if($this->Profile_model->suos_hide($fact, $spot)) {
      $this->session->set_flashdata('success', 'Käyttäjä piiloitettu.');
      redirect('Profile/index');
    }
}
  public function suos_del($spot) {
    if($this->Profile_model->suos_del($spot)) {
      $this->session->set_flashdata('success', 'Suosittelija poistettu.');
      redirect('Profile/index');
    }
  }
  public function suosittelija() {
    $this->form_validation->set_rules('suosittelija', 'suosittelija', 'trim|required');
    if($this->form_validation->run() == true) {
      if($this->Profile_model->suosittelijat()) {
        $this->session->set_flashdata('success', 'Suosittelija lisätty!');
        redirect('Profile/index');
      } else {
        $this->session->set_flashdata('error', 'Suosittelijaa ei lisätty!');
        redirect('Profile/index');
      }
    } else {
      $this->session->set_flashdata('error', 'Täytä kenttä!');
      redirect('Profile/index');
    }
  }
  public function set_asetukset() {
      if($this->Profile_model->profile_settings()) {
        $this->session->set_flashdata('success', 'Profiili päivitetty!');
      } else {
        $this->session->set_flashdata('error', 'Asetus ongelmia!');
      }
    redirect('profile/index');
  }
  //Hakee Harrastuksen lisäys näkymän
  public function harrastus() {
    $this->form_validation->set_rules('harrastus', 'harrastus', 'trim|required');
    $this->form_validation->set_rules('vapaasana', 'vapaasana', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/Harrastus';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->harrastus($user_id)) {
        $this->Profile_model->Historiaa('Lisäsit harrastuksen');
        $this->session->set_flashdata('success', 'Harrastus lisätty!');
        $checkbox = $this->input->post('Uusi');
        if(isset($checkbox)){
           redirect('Profile/Harrastus');
        } else {
          redirect('Profile');
        }
      }
    }
  }
  //Poistaa harrastuksen
  public function harrastus_delete($id) {
    $this->Profile_model->Historiaa('Poistit harrastuksen');
    $this->Profile_model->harrastus_delete($id);
    redirect('profile/index');
  }
  //Muokkaa harrastuksen
  public function harrastus_update($id) {
    $data = array(
        'harrastus'       =>     filter_var($this->input->post('harrastus'), FILTER_SANITIZE_STRING),
        'vapaasana'       =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->harrastus_update($id,$data)) {
      $this->Profile_model->Historiaa('Päivitit harrastukset');
      redirect('profile/index');
    }
  }
  //Hakee Työhistorian lisäys näkymäm
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
        $this->Profile_model->Historiaa('Lisäsit työhistorian');
        $this->session->set_flashdata('success', 'Työhistoria lisätty!');
        $checkbox = $this->input->post('Uusi');
        if(isset($checkbox)){
           redirect('Profile/Tyohistoria');
        } else {
          redirect('Profile');
        }
      }
    }
  }
  //Poistaa Työhistorian
  public function tyohistoria_delete($id) {
    $this->Profile_model->Historiaa('Poistit työhistorian');
    $this->Profile_model->tyohistoria_delete($id);
    redirect('profile/index');
  }
  //Muokkaa Työhistorian
  public function tyohistoria_update($id) {
    $data = array(
      'tyopaikka'     =>     filter_var($this->input->post('tyopaikka'), FILTER_SANITIZE_STRING),
      'tehtava'       =>     filter_var($this->input->post('tehtava'), FILTER_SANITIZE_STRING),
      'alkoi'         =>     filter_var($this->input->post('Aloitit'), FILTER_SANITIZE_STRING),
      'loppui'        =>     filter_var($this->input->post('Lopetit'), FILTER_SANITIZE_STRING),
      'kuvaus'        =>     filter_var($this->input->post('vapaasana'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->tyohistoria_update($id,$data)) {
      $this->Profile_model->Historiaa('Päivitit työhistorian');
      redirect('profile/index');
    }
  }
  //Hakee Koulutuksen lisäämis näkymän
  public function koulutus() {
    $this->form_validation->set_rules('koulutusnimi', 'koulutusnimi', 'trim|required');
    $this->form_validation->set_rules('koulutusaste', 'koulutusaste', 'trim|required');
    $this->form_validation->set_rules('oppilaitos', 'oppilaitos', 'trim|required');
    $this->form_validation->set_rules('Aloitit', 'alkoi', 'trim|required');
    $this->form_validation->set_rules('Lopetit', 'loppui', 'trim|required');
    $this->form_validation->set_rules('Vapaasana', 'vapaasana', 'trim');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'Kokemukset/koulutus';
      $this->load->view('layouts/main',$data);
    } else {
      $user_id = $this->session->userdata('user_id');
      if ($this->Profile_model->koulutus($user_id)) {
        $this->Profile_model->Historiaa('Lisäsit koulutuksen');
        $this->session->set_flashdata('success', 'Koulutus lisätty!');
        $checkbox = $this->input->post('Uusi');
        if(isset($checkbox)){
           redirect('Profile/Koulutus');
        } else {
          redirect('Profile');
        }
      }
    }
  }
  //Poistaa Koulutuksen
  public function koulutus_delete($id) {
    $this->Profile_model->Historiaa('Poistit koulutuksen');
    $this->Profile_model->koulutus_delete($id);
    redirect('profile/index');
  }
  //Päivittää Koulutuksen
  public function koulutus_update($id) {
    $data = array(
        'koulutusnimi'    =>     filter_var($this->input->post('koulutusnimi'), FILTER_SANITIZE_STRING),
        'koulutusaste'    =>     filter_var($this->input->post('koulutusaste'), FILTER_SANITIZE_STRING),
        'oppilaitos'      =>     filter_var($this->input->post('oppilaitos'), FILTER_SANITIZE_STRING),
        'alkoi'           =>     filter_var($this->input->post('alkoi'), FILTER_SANITIZE_STRING),
        'loppui'          =>     filter_var($this->input->post('loppui'), FILTER_SANITIZE_STRING),
        'vapaasana'       =>     filter_var($this->input->post('K_vapaasana'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->koulutus_update($id,$data)) {
      $this->Profile_model->Historiaa('Päivitit koulutuksen');
      redirect('profile/index');
    }
  }
  //Hakee Korttien lisäys näkymän
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
        $this->Profile_model->Historiaa('Lisäsit kortin');
        $this->session->set_flashdata('success', 'Kortti lisätty!');
        $checkbox = $this->input->post('Uusi');
        if(isset($checkbox)){
           redirect('Profile/Kortit');
        } else {
          redirect('Profile');
        }
      }
    }
  }
  //Poistaa Korttien
  public function kortit_delete($id) {
    $this->Profile_model->Historiaa('Poistit kortin');
    $this->Profile_model->kortit_delete($id);
    redirect('profile/index');
  }
  //Vaihtaa progiilin tilaa
  public function hide($tila) {
    if ($tila == 'Kylla') {
      $data = array('Näytä_Profiili'  =>  'Kylla');
      $fd = $this->session->set_flashdata('success-Prof_Hide', 'Profiilisi on näkyvissä!');
    } else {
      $data = array('Näytä_Profiili'  =>  'Ei');
      $fd = $this->session->set_flashdata('error-Prof_Hide', 'Profiilisi on piilotettu!');
    }
    $user_id = $this->session->userdata('user_id');
    if ($this->Profile_model->hide($user_id,$data)) {
      $fb;
      redirect('profile/index');
    }
  }
  //Päivittää profiilin
  public function profile_update($user_id) {
    $data = array(
      'F_Name'          =>    filter_var($this->input->post('F_Name'), FILTER_SANITIZE_STRING),
      'L_Name'          =>    filter_var($this->input->post('L_Name'), FILTER_SANITIZE_STRING),
      'Kielitaito'      =>    filter_var($this->input->post('kielitaito'), FILTER_SANITIZE_STRING),
      'Own_Email'       =>    filter_var($this->input->post('email'), FILTER_SANITIZE_STRING),
      'Osoite'          =>    filter_var($this->input->post('address'), FILTER_SANITIZE_STRING),
      'Posti_Num'       =>    filter_var($this->input->post('p_num'), FILTER_SANITIZE_STRING),
      'Puh_Num'         =>    filter_var($this->input->post('puh'), FILTER_SANITIZE_STRING),
      'About'           =>    filter_var($this->input->post('about'), FILTER_SANITIZE_STRING)
    );
    if ($this->Profile_model->update_profile($user_id,$data)) {
      $this->Profile_model->Historiaa('Päivitit profiilisi');
      redirect('profile/index');
    }
  }
  //Lisää Metatiedon
  public function add_meta() {
    if (empty($this->input->post('Tieto'))) {
      $this->Profile_model->Historiaa('Yritit lisätä tyhjän metatiedon');
      $this->session->set_flashdata('error', 'Täytä tyhjä kohta!');
      redirect('profile?add_meta');
    } else {
      $data = array(
          'User_id'     =>     $this->session->userdata('user_id'),
          'Tieto'       =>     filter_var($this->input->post('Tieto'), FILTER_SANITIZE_STRING)
      );
      $this->Profile_model->Historiaa('Lisäsit metatiedon "'.filter_var($this->input->post('Tieto'), FILTER_SANITIZE_STRING).'"');
      if ($this->Profile_model->meta_add($data)) {
        redirect('profile?add_meta');
      }
    }
  }
  //Poistaa kaikki Metatiedot
  public function delete_all_meta($user_id) {
    $this->Profile_model->Historiaa('Poistit kaikki metatiedot');
    $this->Profile_model->delete_all_meta($user_id);
    redirect('profile/index');
  }
  //Poistaa Metatiedon
  public function delete_meta($id) {
    $this->Profile_model->Historiaa('Poistit metatiedon');
    $this->Profile_model->delete_meta($id);
    redirect('profile/index');
  }

  public function share() {
    $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');

  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'profile/share';
    $this->load->view('layouts/main',$data);
  } else {
    $us_id = $this->session->userdata($user_id);
    $email = filter_var($this->input->post('email'), FILTER_SANITIZE_STRING);
    $this->Profile_model->share($us_id, $email);
    $this->session->set_flashdata('success', 'Profiilin jakaminen onnistui!');
    redirect('profile/index');
  }
}
}
