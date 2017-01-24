<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Haku extends CI_Controller {
//Hakee profiilit, metatiedot ja kaikki kokemukset(Harrastukset, Työhistoria, Koulutukset ja Kortit)
public function index() {
  $this->form_validation->set_rules('haku', 'Hakusana', 'trim');
  $data['Profile'] = $this->Haku_model->Hae_Profiilit();
  $data['Harrastukset'] = $this->Haku_model->Hae_Harrastukset();
  $data['Tyohistoria'] = $this->Haku_model->Hae_Tyohistoria();
  // $data['Koulutus'] = $this->Haku_model->Hae_Koulutus();
  // $data['KKortit'] = $this->Haku_model->Hae_KKortit();
  if ($this->form_validation->run() == FALSE) {
    $data['main_content'] = 'Haku';
    $this->load->view('layouts/main',$data);
  } else {
    if ($this->Haku_model->hakee()) {
      $data['haut'] = $this->Haku_model->hakee();
      $data['main_content'] = 'Haku';
      $this->load->view('layouts/main',$data);
    } else {
      $data['Prof'] = $this->Haku_model->hae_profiilit();
      $data['main_content'] = 'Haku';
      $this->load->view('layouts/main',$data);
      }
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
