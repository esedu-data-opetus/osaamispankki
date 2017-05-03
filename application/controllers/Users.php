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
  $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[4]');
	$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[4]|matches[password]');
  //Hakee register sivun jos inputit ei noudata sääntöjä
  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'users/register';
    $this->load->view('layouts/main',$data);
  } else {
    //Luo avaimen
    $key = md5(uniqid());
      //Luo käyttäjän
      if ($this->User_model->test_send_mail($key)) {
        if ($this->User_model->create_member($key)) {
          $this->session->set_flashdata('success', 'Käyttäjä luotu!');
          $this->session->set_flashdata('success', 'Sähköposti lähetetty! Käy vahvistamassa sähköpostisi!');
          redirect('Home');
        } else {
          $this->session->set_flashdata('error', 'Sähköpostia ei voitu lähettää!');
          $this->session->set_flashdata('error', 'Käyttäjä ei voitu luoda!');
          redirect('Home');
        }
      } else {
        $this->session->set_flashdata('error', 'Sähköpostia ei voitu lähettää!');
        redirect('Home');
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
    // if ($this->User_model->verifyUser($username,$password)) {
    //Hakee käyttäjän id:n inputtiin laitetuilla tiedoilla
    $user_id = $this->User_model->login_user($username,$password);
  // } else {
  //   $User_e = "Kala"
  // }
    //Hakee käyttäjän tyypin inputtiin laitetuilla tiedoilla
    if (!$this->User_model->User_type($username)) {
      if(strpos($username, "@esedulainen.fi")) {
        $KT = 0;
      } elseif(strpos($username, "@esedu.fi")) {
        $KT = 2;
      } else {
        $KT = 1;
      }
    } else {
      $KT = $this->User_model->User_type($username);
    }
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
      //Vie profiilin luonti sivulle jos sitä ei ole vielä tehty
      if ($this->session->userdata('First_login')) {
        $this->session->set_flashdata('success', 'Kirjautuminen onnistui! Kirjoita henkilötietosi seuraavaksi!');
        redirect('profile/set_profile');
      } else {
        $this->session->set_flashdata('success', 'Kirjautuminen onnistui!');
        redirect('home/index');
      }
    } else {
      // if ($User_e !== "Kala") {
      $this->session->set_flashdata('error', 'Käyttäjä nimi tai salasana väärin :/');
    // } else {
    //   $this->session->set_flashdata('error', 'Käyttäjää ei ole vielä vahvistettu!');
    // }
      redirect('users/login');
      }
    }
  }
//Tuhoaa kaikki sessionit
public function Logout() {
  $this->session->unset_userdata('is_logged_in');
  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('sposti');
  $this->session->sess_destroy();
    redirect('home/index');
}
//Jos käyttäjä ei ole tehnyt profiilia hänet ohjataan tänne
//Ja profiili kirjautuu ulos ja antaa mahdollisuuden luoda profiilin uudestaan
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
  public function test() {
    if ($this->session->userdata('KT') == 3) {
      $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|min_length[2]');
      $this->form_validation->set_rules('email', 'Email','trim|required|max_length[100]|min_length[5]|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
      $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');
      if ($this->form_validation->run() == FALSE) {
        $data['main_content'] = 'users/register';
        $this->load->view('layouts/main',$data);
      } else {
        $key = md5(uniqid());
      if ($this->User_model->test_send_mail($Key)) {
        if ($this->User_model->test_create_member($key)) {
          $this->session->set_flashdata('success', 'Sähköposti lähetetty! Käy vahvistamassa se sähköpostissasi!');
          redirect('Profile');
        } else {
          $this->session->set_flashdata('error', 'Käyttäjää ei luotu!');
          redirect('Profile');
        }
      } else {
        $this->session->set_flashdata('error', 'Sähköpostia ei voitu lähettää!');
        redirect('Profile');
      }
    }
  }
}
  public function confirmed($hash) {
    if ($this->User_model->verifyEmail($hash)) {
      $this->session->set_flashdata('success', 'Käyttäjä on vahvistettu!');
      redirect('Users/login');
		}		else {
			$this->session->set_flashdata('error','Sorry! There is error verifying your Email Address!');
			redirect('user/register');
		}
  }
  public function forgot_password() {
    $email = $this->input->post('email');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|min_length[5]|valid_email');
      if ($this->form_validation->run() == FALSE) {
        $data['main_content'] = 'users/forgot_password';
        $this->load->view('layouts/main',$data);
      } else {
        if ($this->User_model->checkEmail($email)) {
          $this->User_model->send_password_reset($email);
          $this->session->set_flashdata('success', 'Salasanan palautus sähköposti lähetetty!');
          redirect('home/index');
        } else {
          $this->session->set_flashdata('error','Sähköpostiosoite on virheellinen tai sitä ei ole olemassa!');
          redirect('users/forgot_password');
        }
    }
  }
  public function new_password($email) {
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[1]');
    $this->form_validation->set_rules('password_c', 'Confirm Password', 'trim|required|max_length[50]|min_length[1]|matches[password]');
    if ($this->form_validation->run() == FALSE) {
      $data = array(
        'Pw_Email' => $email,
      );
      $this->session->set_userdata($data);
      $data['main_content'] = 'users/new_password';
      $this->load->view('layouts/main',$data);
    } else {
      $data = array(
        'Password' => md5($this->input->post('password')),
      );
      $Pw_Email = $this->session->userdata('Pw_Email');
      if ($this->User_model->resetPassword($Pw_Email, $data)) {
      $this->session->set_flashdata('success', 'Salasana vaihdettiin onnistuneesti!');
      redirect('home/index');
    } else {
      $this->session->set_flashdata('success', 'Salasanaa ei voitu vaihtaa!');
      redirect('home/index');
    }
    }
    }
}
