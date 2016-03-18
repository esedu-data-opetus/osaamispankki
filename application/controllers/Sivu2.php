<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu2 extends CI_Controller{
	$this->load->model('model_Sivu');
	if(
	$this->session->userdata('is_logged_in')) {
	$this->load->template('perustiedot');
	} else {
	redirect('sivu/restricted');
	}
		}


		public function paivita_perustiedot(){
		$this->load->model('Model_sivu');

		if($this->Model_sivu->paivitatiedot())
				{
					redirect('sivu2/index');
				}
				else
				{
					echo 'Jotain meni pieleen.';
				}
		}
}

