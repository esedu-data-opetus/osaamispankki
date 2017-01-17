<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php
// $this->uri->segment('');
class Users extends CI_Controller {
public function index() {
  redirect('home/index');
}
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
          $this->session->set_flashdata('success', 'Käyttäjä Luotu!');
          redirect('home/index');
        }
      } else {
        $this->session->set_flashdata('error', 'Unknown!');
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
      $KT = $this->User_model->User_type($username);
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
  public function Proff_error() {
    $data = array(
      'Key'          =>  'undefined',
      'user_id'      =>  'undefined',
      'sposti'       =>  'undefined',
      'is_logged_in' =>  0
    );
      $this->session->set_userdata($data);
      $this->session->set_flashdata('error', 'Profiilisi Ei Ole Sinun!<br>Jos Lulet Toisin Lähetä Palautetta');
      redirect('home/index');
  }
  public function logout() {
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
  public function palaute() {
    $this->form_validation->set_rules('Sposti', 'Sposti', 'trim|required|valid_email');
    $this->form_validation->set_rules('Aihe', 'Aihe', 'trim|required');
    $this->form_validation->set_rules('Palaute', 'Palaute', 'trim|required');

    if ($this->form_validation->run() !== True) {
      $data['main_content'] = "Palaute";
      $this->load->view('layouts/main', $data);
    } else {
      if ($this->session->userdata('user_id')) {
        $User_id = $this->session->userdata('user_id');
      } else {
        $User_id = 0;
      }
      if($this->User_model->Palaute($User_id)) {
        $this->session->set_flashdata('success', 'Kiitos Palautteesta!');
        redirect('Home/index');
      } else {
        $this->session->set_flashdata('error', 'Jotain Meni Pieleen :/');
        redirect('Home/index');
      }
    }
  }
  public function haku() {
    $this->form_validation->set_rules('haku', 'hakusana', 'trim');

    if (empty($data['haku'])) {
      $data['haku'] = $this->User_model->hae_profiilit();
    }
    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'haku';
      $this->load->view('layouts/main',$data);
    } else {
      if ($this->User_model->hakee()) {
      $data['haku'] = $this->User_model->hakee();
      $data['main_content'] = 'haku';
      $this->load->view('layouts/main',$data);
    } else {
      $data['haku'] = "Ei haku paria!";

      $data['main_content'] = 'haku';
      $this->load->view('layouts/main',$data);
      }
    }
  }
  // public function haku()
  //  	{
  // 	  	//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
  //  		//if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
  //  		$this->load->model('model_sivu');
  //  		//$data['query'] = $this->model_sivu->tee_haku();
  //  		$this->load->template('haku');
  //  		//}
  //  		//else {
  // 		//redirect('sivu/restricted');
  // 	//}
  //  	//}
  //  }
  //  	public function hakutulokset()
  //  	{
  //  		//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
  //  		//if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
  //  	 	$this->load->model('model_sivu');
  //  		$data['query'] = $this->model_sivu->tee_haku();
  //  		$this->load->template('hakutulokset', $data);
  //  	//}
  //  	//else
  // 	 	//{
  // 	 	//redirect('sivu/restricted');
  // 	 	//}
  //  	}
}
