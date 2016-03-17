<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu2 extends CI_Controller
	 {
		public function index(){
		$this->load->model('Model_sivu');
		$tarkistatiedot = $this->Model_sivu->tarkistatiedot($this->session->userdata('sposti'));


		foreach ($tarkistatiedot->result() as $row) {
     		$asd = $row->privSposti;
     	}
		$this->load->template("perustiedot");
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

