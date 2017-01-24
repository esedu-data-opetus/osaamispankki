<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Users extends CI_Controller {
// Method index estää errorin näkymistä jos menee url osoitteeseen "Users/index"
public function index() {
  redirect('home/index');
}
//Luo käyttäjän
public function Register() {
  //Varmistaa että käyttäjä ei ole kirjautunut
  if ($this->session->userdata('is_logged_in') == 1) {
    redirect('home/index');
  }
  //Inputtien säännöt mitä niitten pitää noudattaa
  $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|min_length[2]');
  $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
	$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');
  //Hakee register sivun jos inputit ei noudata sääntöjä
  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'users/register';
    $this->load->view('layouts/main',$data);
  } else {
    //Luo avaimen
    $key = md5(uniqid());
    //Lähettää sähköposti varmennuksen
    if ($this->User_model->send_mail($key)) {
      //Luo käyttäjän
      if ($this->User_model->create_member($key)) {
        //Varmistaa että käyttäjä menee sivulle missä
        //hän täyttää profiilitietonsa.
        $data = array(
					'First_login' =>  True,
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('success', 'Käyttäjä Luotu!');
        redirect('home/index');
      }
    } else {
      $this->session->set_flashdata('error', 'Sähköpostia ei voitu lähettää!');
      redirect('home/index');
    }
  }
}
//Kirjautuu sisälle
public function Login() {
  //Varmistaa että käyttäjä ei ole kirjautunut
  if ($this->session->userdata('is_logged_in') == 1) {
    redirect('home/index');
  }
  //Inputtien säännöt mitä niitten pitää noudattaa
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
  //Hakee login sivun jos inputit ei noudata sääntöjä
  if($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'users/login';
    $this->load->view('layouts/main',$data);
  } else {
    $username = filter_var($this->input->post('email'), FILTER_SANITIZE_STRING);
    $password = $this->input->post('password');
    //Hakee käyttäjän id:n inputtiin laitetuilla tiedoilla
    $user_id = $this->User_model->login_user($username,$password);
    //Hakee käyttäjän tyypin inputtiin laitetuilla tiedoilla
    $KT = $this->User_model->User_type($username);
    //Hakee käyttäjän avaimen inputtiin laitetuilla tiedoilla
    $user_key = $this->User_model->fetch_key($username,$password);
      if($user_id){
          $data = array(
            'Key'          =>  $user_key,
            'user_id'      =>  $user_id,
            'KT'           =>  $KT,
            'sposti'       =>  $this->input->post('email'),
            'is_logged_in' =>  1
          );
      $this->session->set_userdata($data);
      //Vie profiilin luonti sivulle jos ei ole sitä vielä tehnyt
      if ($this->session->userdata('First_login')) {
        $this->session->set_flashdata('success', 'Kirjautuminen onnistui! Kirjoita henkilötietosi seuraavaksi!');
        redirect('profile/set_profile');
      } else {
        $this->session->set_flashdata('success', 'Kirjautuminen onnistui!');
        redirect('home/index');
      }
    } else {
      $this->session->set_flashdata('error', 'Käyttäjä nimi tai salasana väärin :/');
      redirect('home/index');
      }
    }
  }
//Tuhoaa kaikki sessionit
public function Logout() {
  $this->session->unset_userdata('is_logged_in');
  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('sposti');
  $this->session->sess_destroy();
if ($this->uri->segment('proff')) {
    redirect('home/index');
} else {
    redirect('home/index');
  }
}
//Jos käyttäjä ei ole tehnyt profiilia hänet ohjataan tänne
//Ja profiili kirjautuu ulos ja antaa mahdollisuuden luoda profiilin uudestaan
public function Proff_error() {
  $data = array(
    'Key'          =>  'undefined',
    'user_id'      =>  'undefined',
    'sposti'       =>  'undefined',
    'First_login'  =>  True,
    'is_logged_in' =>  0
  );
    $this->session->set_userdata($data);
    $this->session->set_flashdata('error', 'Profiilisi Ei Ole Sinun!<br>Jos Luulet Toisin Lähetä Palautetta');
    redirect('home/index');
}
//Sähköpostin varmennus
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
