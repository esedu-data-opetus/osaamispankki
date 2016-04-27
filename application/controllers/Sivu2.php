<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu2 extends CI_Controller
	 {
		public function index(){
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('perustiedot');
		} 
		else{
		redirect('sivu/restricted');
		}
		}


		public function paivita_perustiedot()
		{
		$this->load->model('model_sivu');

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('privSposti', 'Henkilökohtainen sähköpostiosoite', 'valid_email|max_length[30]');
		$this->form_validation->set_rules('eNimi', 'Etunimi', 'alpha|trim|max_length[30]');
		$this->form_validation->set_rules('sNimi', 'Sukunimi', 'alpha|trim|max_length[30]');
		$this->form_validation->set_rules('osoite', 'Osoite', 'trim|max_length[30]');
		$this->form_validation->set_rules('postinro', 'Postinumero', 'trim');
		$this->form_validation->set_rules('puhelinnro', 'Puhelinnumero', 'trim|numeric|max_length[12]');


		$this->form_validation->set_message('alpha', "<p style='color:red;''>Nimessä voi olla vain aakkosia.</p>");
		$this->form_validation->set_message('valid_email', "<p style='color:red;''>Sähköpostiosoite ei ole kelvollinen.</p>");
		$this->form_validation->set_message('max_length', "<p style='color:red;''>Jokin kenttä on liian pitkä</p>");
		$this->form_validation->set_message('min_length', "<p style='color:red;''>Jokin kenttä on liian lyhyt</p>");
		$this->form_validation->set_message('numeric', "<p style='color:red;''>Virheellinen puhelinnumero</p>");


			if ($this->form_validation->run())
			{

						if($this->model_sivu->paivitatiedot())
								{
									redirect('sivu/index');
								}
								else
								{
									echo 'Jotain meni pieleen.';
								}
			}
			$this->load->template('perustiedot');


		}
}
