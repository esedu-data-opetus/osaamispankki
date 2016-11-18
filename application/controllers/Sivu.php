<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu extends CI_Controller {

	public function welcome_message()
	{
		$this->load->helper('url');
		$this->load->template('welcome_message');

	}

	public function welcome_message_english()
	{
		$this->load->helper('url');
		$this->load->template('welcome_message_english');

	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('login');
	}
	public function login_english()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('login_english');
	}

	public function register()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('register');
	}

	public function register_english()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('register_english');
	}

	public function register_successful()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('register_successful');
		header( "refresh:2;url=login" );
	}

	public function register_successful_english()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('register_successful_english');
		header( "refresh:2;url=login" );
	}


	//Estää pääsyn profiilisivulle jos sisään ei ole kirjauduttu
	public function members()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('members');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function members_edit()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('members_edit');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function index()
	{
		if ($this->session->userdata('is_logged_in')){
		$this->load->template('perustiedot');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function members_english()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('members_english');
	} else {
		redirect('sivu/restricted_english');
	}

	}


	public function harrastukset()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('harrastukset');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function harrastukset_english()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('harrastukset_english');
	} else {
		redirect('sivu/restricted_english');
	}

	}

	//Estää pääsyn tälle sivulle jos ei ole kirjauduttu sisään
	public function tyohistoria()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function tyohistoria_english()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria_english');
	} else {
		redirect('sivu/restricted_english');
	}

	}

	//Estää pääsyn tälle sivulle jos ei ole kirjauduttu sisään
	public function koulutukset_()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
	}

	}

	public function koulutukset_english()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria_english');
	} else {
		redirect('sivu/restricted_english');
	}

	}

	// Access denied sivu
	public function restricted()
	{
		$this->load->view('restricted');
	}

	public function restricted_english()
	{
		$this->load->view('restricted_english');
	}

	public function login_validation()
	{

		$this->load->library('form_validation');


		$this->form_validation->set_rules('sposti', 'Sposti', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('salasana', 'Salasana', 'md5|trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Syötä sähköposti.</b>");


		if ($this->form_validation->run()){

			$data = array(
					'sposti' => $this->input->post('sposti'),
					'is_logged_in' => 1,
					'usertype' => $this->model_sivu->getusertype()
				);
			$this->session->set_userdata($data);

				if($this->session->userdata('usertype') == 1) {
					redirect('sivu/paivita_perustiedot');
				}
				elseif($this->session->userdata('usertype') == 2){
					redirect('sivu/members');
				}
				else {
					redirect('sivu/members');
				}

			redirect('sivu/members');
		} else {
			$this->load->template('login');
		}
	}

	public function login_validation_english()
	{

		$this->load->library('form_validation');


		$this->form_validation->set_rules('sposti', 'Sposti', 'required|trim|callback_validate_credentials_english');
		$this->form_validation->set_rules('salasana', 'Salasana', 'md5|trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Enter an email.</b>");

		if ($this->form_validation->run()){

			$data = array(
					'sposti' => $this->input->post('sposti'),
					'is_logged_in' => 1
				);
			$this->session->set_userdata($data);
			redirect('sivu/members_english');
		} else {
			$this->load->template('login_english');
		}
	}

	public function members_edit2()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('privSposti', 'Sposti', 'trim');
		$this->form_validation->set_rules('etunimi', 'Etunimi', 'trim');
		$this->form_validation->set_rules('sNimi', 'Sukunimi', 'trim');
		$this->form_validation->set_rules('osoite', 'Osoite', 'trim');
		$this->form_validation->set_rules('postinro', 'Postinumero', 'trim');
		$this->form_validation->set_rules('puhelinnro', 'Puhelinnumero', 'trim');
		$this->form_validation->set_rules('lyhytKuvaus', 'Lyhyt kuvaus', 'trim');
		$this->form_validation->set_rules('hakusanat', 'Hakusanat', 'trim');


		if ($this->form_validation->run())
		{


				if($this->model_sivu->edit_members())
				{

					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Perustiedot päivitetty</p>';
					redirect('profile');
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Perustietoja ei päivitetty</p>';
				}
		}

		$this->load->template('members');
	}

	public function members_edit_english()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('privSposti', 'Sposti', 'trim');
		$this->form_validation->set_rules('etunimi', 'Etunimi', 'trim');
		$this->form_validation->set_rules('sNimi', 'Sukunimi', 'trim');
		$this->form_validation->set_rules('osoite', 'Osoite', 'trim');
		$this->form_validation->set_rules('postinro', 'Postinumero', 'trim');
		$this->form_validation->set_rules('puhelinnro', 'Puhelinnumero', 'trim');
		$this->form_validation->set_rules('lyhytKuvaus', 'Lyhyt kuvaus', 'trim');


		if ($this->form_validation->run())
		{


				if($this->model_sivu->edit_members())
				{

					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Basic information updated</p>';
					redirect('sivu/members_english');
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Basic information was not updated</p>';
				}
		}

		$this->load->template('members_edit_english');
	}

	public function edit_tyohistoria($id)
	{

		$this->load->model('model_sivu');
		$tyodata = $this->model_sivu->get_tyohistoria($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 	'trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 	'trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 	'trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 	'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Tyopaikka on pakollinen.</b>");

		if ($this->form_validation->run())
		{


				if($this->model_sivu->edit_tyohistoria($id))
				{
					$this->output->set_header('sivu/members');
					$tyodata = $this->model_sivu->get_tyohistoria($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Tyohistoria päivitetty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Tyohistoriaa ei päivitetty</p>';
				}
		}

		$this->load->template('edit_tyohistoria', $tyodata);

	}

	public function edit_tyohistoria_english($id)
	{

		$this->load->model('model_sivu');
		$tyodata = $this->model_sivu->get_tyohistoria($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 	'trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 	'trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 	'trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 	'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Workplace field is required.</b>");

		if ($this->form_validation->run())
		{


				if($this->model_sivu->edit_tyohistoria($id))
				{
					$this->output->set_header('sivu/members_english');
					$tyodata = $this->model_sivu->get_tyohistoria($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Work history updated</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Work history was not updated</p>';
				}
		}

		$this->load->template('edit_tyohistoria_english', $tyodata);

	}



	public function tyohistoria_lisaus()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 	'trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 	'trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 	'trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 	'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Tyopaikka on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_tyohistoria())
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Tyohistoria lisätty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Tyohistoriaa ei lisätty</p>';
				}
		}
		$this->load->template('tyohistoria_lisaus');
	}

	public function tyohistoria_lisaus_english()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 	'trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 	'trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 	'trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 	'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Workplace field is required.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_tyohistoria())
				{
					$this->output->set_header('sivu/members_english');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Work history added</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Work history was not added</p>';
				}
		}
		$this->load->template('tyohistoria_lisaus_english');
	}

	public function harrastukset_lisaus()
	{

		$this->load->model('Model_harrastus');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('harrastus', 'Harrastus', 'required|trim');
		$this->form_validation->set_rules('vapaasana', 'Vapaasana', 'trim');


		$this->form_validation->set_message('required', "<b style='color:red;'>Harrastus on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->Model_harrastus->add_harrastus())
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Harrastus lisätty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Harrastusta ei lisätty</p>';
				}
		}
		$this->load->template('harrastukset_lisaus');
	}

	public function kortit_lisaus()
	{

		$this->load->model('model_sivu');
		$data['kortit'] = $this->model_sivu->get_kortit();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('knimi', 'Kortti', 'trim');
		$this->form_validation->set_rules('voimassa', 'Voimassaoloaika', 'trim');
		$this->form_validation->set_rules('kommentti', 'Kommentti', 'trim');



		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_kortti())
				{
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Kortti lisätty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Korttia ei lisätty</p>';
				}
		}
		$this->load->template('kortit_lisaus');
	}

	public function kortit_lisaus_english()
	{

		$this->load->model('model_sivu');
		$data['kortit'] = $this->model_sivu->get_kortit();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('knimi', 'Kortti', 'trim');
		$this->form_validation->set_rules('voimassa', 'Voimassaoloaika', 'trim');
		$this->form_validation->set_rules('kommentti', 'Kommentti', 'trim');



		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_kortti())
				{
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Card added</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Card was not added</p>';
				}
		}
		$this->load->template('kortit_lisaus_english');
	}

	public function harrastukset_lisaus_english()
	{

		$this->load->model('Model_harrastus');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('harrastus', 'Harrastus', 'required|trim');
		$this->form_validation->set_rules('vapaasana', 'Vapaasana', 'trim');


		$this->form_validation->set_message('required', "<b style='color:red;'>Hobby is required.</b>");

		if ($this->form_validation->run())
		{

				if($this->Model_harrastus->add_harrastus())
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Harrastus lisätty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Harrastusta ei lisätty</p>';
				}
		}
		$this->load->template('harrastukset_lisaus_english');
	}


	public function edit_harrastukset($id)
	{

		$this->load->model('Model_harrastus');
		$harrastusdata = $this->Model_harrastus->get_harrastus($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('harrastus', 'Harrastus', 'trim');
		$this->form_validation->set_rules('vapaasana', 'Vapaasana', 'trim');


		$this->form_validation->set_message('required', "<b style='color:red;'>Harrastus on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->Model_harrastus->edit_harrastus($id))
				{
					$this->output->set_header('sivu/members');
					$harrastusdata = $this->Model_harrastus->get_harrastus($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Harrastukset on päivitetty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Harrastusta ei päivitetty</p>';
				}
		}
		$this->load->template('edit_harrastukset', $harrastusdata);

	}

	public function edit_harrastukset_english($id)
	{

		$this->load->model('Model_harrastus');
		$harrastusdata = $this->Model_harrastus->get_harrastus($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('harrastus', 'Harrastus', 'trim');
		$this->form_validation->set_rules('vapaasana', 'Vapaasana', 'trim');


		$this->form_validation->set_message('required', "<b style='color:red;'>Hobby is required.</b>");

		if ($this->form_validation->run())
		{

				if($this->Model_harrastus->edit_harrastus($id))
				{
					$this->output->set_header('sivu/members');
					$harrastusdata = $this->Model_harrastus->get_harrastus($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Hobby is updated</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Harrastusta ei päivitetty</p>';
				}
		}
		$this->load->template('edit_harrastukset_english', $harrastusdata);

	}

	public function edit_koulutukset($id)
	{

		$this->load->model('model_sivu');
		$tyodata = $this->model_sivu->get_koulutukset($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('koulutusnimi', 'Koulutus',     'required|trim');
		$this->form_validation->set_rules('koulutusaste', 'Koulutusaste', 'trim');
		$this->form_validation->set_rules('oppilaitos',   'Oppilaitos',   'trim');
		$this->form_validation->set_rules('alkoi', 	      'alkoi', 		  'trim');
		$this->form_validation->set_rules('loppui', 	  'Loppui', 	  'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Koulutus on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->edit_koulutus($id))
				{
					$this->output->set_header('sivu/members');
					$tyodata = $this->model_sivu->get_koulutukset($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Koulutus päivitetty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Koulutusta ei päivitetty</p>';
				}
		}
		$this->load->template('edit_koulutukset', $tyodata);
	}

	public function edit_koulutukset_english($id)
	{

		$this->load->model('model_sivu');
		$tyodata = $this->model_sivu->get_koulutukset($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('koulutusnimi', 'Koulutus',     'required|trim');
		$this->form_validation->set_rules('koulutusaste', 'Koulutusaste', 'trim');
		$this->form_validation->set_rules('oppilaitos',   'Oppilaitos',   'trim');
		$this->form_validation->set_rules('alkoi', 	      'alkoi', 		  'trim');
		$this->form_validation->set_rules('loppui', 	  'Loppui', 	  'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Education is required.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->edit_koulutus($id))
				{
					$this->output->set_header('sivu/members_english');
					$tyodata = $this->model_sivu->get_koulutukset($id);
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Education updated</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Education was not updated</p>';
				}
		}
		$this->load->template('edit_koulutukset_english', $tyodata);
	}

	public function koulutukset_lisaus()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('koulutusnimi', 'Koulutus',     'required|trim');
		$this->form_validation->set_rules('koulutusaste', 'Koulutusaste', 'trim');
		$this->form_validation->set_rules('oppilaitos',   'Oppilaitos',   'trim');
		$this->form_validation->set_rules('alkoi', 	      'alkoi', 		  'trim');
		$this->form_validation->set_rules('loppui', 	  'Loppui', 	  'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Koulutus on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_koulutus())
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Koulutus lisätty</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Koulutusta ei lisätty</p>';
				}
		}
		$this->load->template('koulutukset_lisaus');
	}

	public function koulutukset_lisaus_english()
	{

		$this->load->model('model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('koulutusnimi', 'Koulutus',     'required|trim');
		$this->form_validation->set_rules('koulutusaste', 'Koulutusaste', 'trim');
		$this->form_validation->set_rules('oppilaitos',   'Oppilaitos',   'trim');
		$this->form_validation->set_rules('alkoi', 	      'alkoi', 		  'trim');
		$this->form_validation->set_rules('loppui', 	  'Loppui', 	  'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Education is required.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_koulutus())
				{
					$this->output->set_header('sivu/members_english');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Education added</p>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Education was not added</p>';
				}
		}
		$this->load->template('koulutukset_lisaus_english');
	}

	public function delete_kortit($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_kortti($id);
			redirect('sivu/members');

		}

	public function delete_kortit_english($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_kortti($id);
			redirect('sivu/members_english');

		}

	public function delete_harrastukset($id)
		{
			$this->load->model('Model_harrastus');
			$this->Model_harrastus->delete_harrastus($id);
			redirect('sivu/members');

		}

	public function delete_harrastukset_english($id)
	{
		$this->load->model('Model_harrastus');
		$this->Model_harrastus->delete_harrastus($id);
		redirect('sivu/members');

	}

	public function delete_tyohistoria($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_tyohistoria($id);
			redirect('sivu/members');

		}

	public function delete_tyohistoria_english($id)
	{
		$this->load->model('model_sivu');
		$this->model_sivu->delete_tyohistoria($id);
		redirect('sivu/members_english');

	}

	public function delete_koulutukset($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_koulutukset($id);
			redirect('sivu/members');

		}

	public function delete_koulutukset_english($id)
	{
		$this->load->model('model_sivu');
		$this->model_sivu->delete_koulutukset($id);
		redirect('sivu/members_english');

	}

	public function register_validation()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('etunimi', 'Etunimi', 'required|alpha');
		$this->form_validation->set_rules('sposti', 'Sposti', 'trim|is_unique[vahvistamattomatkayttajat.sposti]|is_unique[kirjautumistiedot.sposti]|callback_sposti_check');
		$this->form_validation->set_rules('salasana', 'Salasana', 'trim|min_length[1]');
		$this->form_validation->set_rules('salasanaconfirm', 'Confirm Password', 'trim|min_length[1]|matches[salasana]');

		$this->form_validation->set_message('required', "<b style='color:red;'>Etunimi on pakollinen.</b>");
		$this->form_validation->set_message('is_unique', "<b style='color:red;'>Tämä sähköpostiosoite on jo käytössä.</b>");
		$this->form_validation->set_message('min_length', "<b style='color:red;''>Salasana kentät ovat pakollisia.</b>");
		$this->form_validation->set_message('matches', "<b style='color:red;''>Salasanat eivät täsmää.</b>");
		$this->form_validation->set_message('alpha', "<b style='color:red;''>Etunimessä ei voi olla muuta kuin kirjaimia.</b>");

		if ($this->form_validation->run())
		{

			//Luo satunnaisen avaimen
			$key = md5(uniqid());

			$this->load->library('email', array('mailtype'=>'html','protocol'=>'mail'));
			$this->load->model('model_sivu');

			$this->email->from('osaamispankki@esedu.fi', "Osaamispankki");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Vahvista käyttäjätilisi.");

			$message = "";
			$message = "<a href='".base_url()."sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";

			$this->email->message($message);

			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->add_temp_user($key)) {
				if ($this->email->send()){
					echo "<center><h2 style='font-weight:bold;color:green;'>Vahvistus on lähetetty sähköpostiisi!</h2>";
					echo "<p><a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a></p></center>";
			} else {
				echo "<h2 style='font-weight:bold;color:red;'>Sähköpostin lähetys ei onnistu localhostilla.</h2>";
				echo '<h4>Mutta pystyt kuitenkin kirjautumaan sisään</h4>';
				echo "<a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a>";
			}
		} else echo "Ongelma tietokantaan lisätessä.";

		} else {
			$this->load->template('register');
		}
	}

	public function register_validation_english()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('etunimi', 'Etunimi', 'required|alpha');
		$this->form_validation->set_rules('sposti', 'Sposti', 'trim|is_unique[vahvistamattomatkayttajat.sposti]|is_unique[kirjautumistiedot.sposti]|callback_sposti_check_english');
		$this->form_validation->set_rules('salasana', 'Salasana', 'trim|min_length[1]');
		$this->form_validation->set_rules('salasanaconfirm', 'Confirm Password', 'trim|min_length[1]|matches[salasana]');

		$this->form_validation->set_message('required', "<b style='color:red;'>First name is required.</b>");
		$this->form_validation->set_message('is_unique', "<b style='color:red;'>This e-mail address is already in use.</b>");
		$this->form_validation->set_message('min_length', "<b style='color:red;''>Password fields are required.</b>");
		$this->form_validation->set_message('matches', "<b style='color:red;''>The passwords do not match.</b>");
		$this->form_validation->set_message('alpha', "<b style='color:red;''>First name cannot contain other characters than letters.</b>");

		if ($this->form_validation->run())
		{

			//Luo satunnaisen avaimen
			$key = md5(uniqid());

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_sivu');

			$this->email->from('osaamispankki@esedu.fi', "Osaamispankki");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Confirm your account.");

			$message = "";
			$message .= "<a href='".base_url()."sivu/register_user/$key' >Click here</a> to confirm your account";

			$this->email->message($message);

			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->add_temp_user($key)) {
				if ($this->email->send()){
					echo "<center><h2 style='font-weight:bold;color:green;'>A confirmation has been sent to your email!</h2>";
					echo "<p><a href='".base_url()."sivu/login_english' >Back to login</a></p></center>";
			} 	else echo "<h2 style='font-weight:bold;color:red;'>Unable to send an email.</h2>";

		} else echo "Ongelma tietokantaan lisätessä.";

		} else {
			$this->load->template('register_english');
		}
	}


    //Tarkistaa että pystyy rekisteröitymään vain @esedulainen.fi päätteisellä sähköpostiosoitteella
    public function sposti_check($str)
    {

        if(stristr($str,'@esedulainen.fi') !== false) return true;
        if(stristr($str,'@esedu.fi') !== false) return true;

        $this->form_validation->set_message('sposti_check', '<p style="color:red;">Voit käyttää vain <b>@esedulainen.fi</b> päätteistä osoitetta.</p>');
        return FALSE;
    }

	public function sposti_check_english($str)
    {

        if(stristr($str,'@esedulainen.fi') !== false) return true;
        //if(stristr($str,'@esedu.fi') !== false) return true;

        $this->form_validation->set_message('sposti_check_english', '<p style="color:red;">You can only use an email that ends with <b>@esedulainen.fi</b></p>');
        return FALSE;
    }

    //Kirjautuminen
	public function validate_credentials()
	{
		$this->load->model('model_sivu');

		if ($this->model_sivu->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', "<p style='color:red;'>Väärä sähköposti/salasana.</p>");
			echo "<a style='text-align:center;margin-left:42.5%;position:fixed;z-index: 1;margin-top:210px;font-weight:bold;' href='".base_url()."sivu/forgotpassword'>Unohtuiko salasana?</a>";
			return false;
		}
	}

	public function validate_credentials_english()
	{
		$this->load->model('model_sivu');

		if ($this->model_sivu->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials_english', "<p style='color:red;'>Incorrect username/password.</p>");
			return false;
		}
	}

	public function lastt_login()
	{
		$this->load->model('model_sivu');
		$this->model_sivu->last_login2();
		$this->model_sivu->last_login3();

		redirect('sivu/login');

	}

	//Uloskirjautuminen
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('sivu/login');
	}
	public function logout_english()
	{
		$this->session->sess_destroy();
		redirect('sivu/login_english');
	}

	public function register_user($key)
	{

		$this->load->model('model_sivu');

		if ($this->model_sivu->is_key_valid($key)){
			if ($newemail = $this->model_sivu->add_user($key)){

				$data = array(
						'email' => $newemail,
						'is_logged_in' => 1,
					);

					$this->session->set_userdata($data);
					redirect('sivu/register_successful');
			} else echo 'failed to add user, please try again.';

		} else echo '<center><b><h1>Käyttäjätili on jo vahvistettu</h1></b>';
		echo "<p><a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a></p></center>";
	}

	public function register_user_english($key)
	{

		$this->load->model('model_sivu');

		if ($this->model_sivu->is_key_valid($key)){
			if ($newemail = $this->model_sivu->add_user($key)){

				$data = array(
						'email' => $newemail,
						'is_logged_in' => 1,
					);

					$this->session->set_userdata($data);
					redirect('sivu/register_successful_english');
			} else echo 'failed to add user, please try again.';

		} else echo '<center><b><h1>Your account has already been confirmed</h1></b>';
		echo "<p><a href='".base_url()."sivu/login_english' >Back to login</a></p></center>";
	}

	public function haku()
 	{
	  	//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
 		//if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
 		$this->load->model('model_sivu');
 		//$data['query'] = $this->model_sivu->tee_haku();
 		$this->load->template('haku');
 		//}
 		//else {
		//redirect('sivu/restricted');
	//}
 	//}
 }

 	public function hakutulokset()
 	{
 		//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
 		//if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
 	 	$this->load->model('model_sivu');
 		$data['query'] = $this->model_sivu->tee_haku();
 		$this->load->template('hakutulokset', $data);
 	//}
 	//else
	 	//{
	 	//redirect('sivu/restricted');
	 	//}
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
									redirect('sivu/members');
								}
								else
								{
									redirect('sivu/members');
								}
			}
			$this->load->template('perustiedot');


		}

		public function changepassword()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('changepassword');
		}
		else {
		redirect('sivu/welcome_message');
	}
	}
public function changepassword_validation()
 	{
	if ($this->session->userdata('is_logged_in')) {
 		$this->load->helper(array('form', 'url'));
 		$this->load->library('form_validation');
 		$this->load->model('model_sivu');

 		$this->form_validation->set_rules('currentpwd', 'Vanha salasana', 'trim|min_length[1]|callback_passwd_check');
 		$this->form_validation->set_rules('newpwd', 'Uusi salasana', 'trim|min_length[1]');
 		$this->form_validation->set_rules('confirmnewpdw', 'Vahvista uusi salasana', 'trim|min_length[1]|matches[newpwd]');

 		$this->form_validation->set_message('min_length', "<p style='color:red;''>Salasana kentät ovat pakollisia.</p>");
 		$this->form_validation->set_message('matches', "<p style='color:red;''>Salasanat eivät täsmää.</p>");

 		if ($this->form_validation->run()){
  			if($this->model_sivu->changepassword()){
  				redirect('sivu/members');
  			}
  			else
  			{
  				echo'Salanan vaihto epäonnistui';
  			}


 		} else {
 			$this->load->template('changepassword');
  		}
  	}
  	else{
		redirect('sivu');
  	}
  			}

	public function passwd_check()
	{
		$this->load->model('model_sivu');
		if ($this->model_sivu->checkpassword()){
			return true;
		} else {
			$this->form_validation->set_message('passwd_check', "<p style='color:red;'>Nykyinen salasana on väärin.</p>");
			return false;
		}
	}

 	public function forgotpassword()
 	{
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->template('forgottenpassword');
 	}
	public function forgotpassword_validation()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('model_sivu');
		$this->form_validation->set_rules('currentpwd', 'Vanha salasana', 'trim|min_length[1]|callback_forgotpasswordemailcheck');
		if ($this->form_validation->run()){

			//Generoi satunnaisen avaimen
			$key = md5(uniqid());
			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_sivu');
			$this->email->from('op@paja.esedu.fi', "Osaamispankki");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Aseta uusi salasana");
			$message = "";
			$message .= "<a href='".base_url()."sivu/resetpassword/$key' >Klikkaa tästä</a> asettaaksesi uuden salasanan";
			$this->email->message($message);
			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->passwordresetkey($key)) {
				if ($this->email->send()){
					$this->load->template('forgottenpassword');
					//echo "<p><a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a></p>";
							echo $this->email->print_debugger();
			} 	else echo "<p style='color:red;'>Sähköpostin lähetys ei onnistu.</p>";
					// echo "<p><a href='".base_url()."sivu/login' >Takaisin kirjautumiseen</a></p>";
					 		echo $this->email->print_debugger();
		} else echo "Ongelma tietokantaan lisätessä.";
		} else {
			$this->load->template('forgottenpassword');
		}
	}
 	public function forgotpasswordemailcheck()
 	{
 		$this->load->model('model_sivu');

 		if ($this->model_sivu->tarkistasposti()){
 			echo "<center><h2 id='message' style='font-weight:bold;color:green;'>A confirmation has been sent to your email!</h2></center>";
 			return true;
 		}
  		else
  		{

 			$this->form_validation->set_message('forgotpasswordemailcheck', "<p style='color:red;font-weight:bold;'>Väärä sähköposti.</p>");
 			return false;
  		}
 	}

 	public function resetpassword($key)
 	{
 		$this->load->helper(array('form', 'url'));
 		$this->load->library('form_validation');
 		$this->load->model('model_sivu');

 		$this->form_validation->set_rules('newpwd', 'Uusi salasana', 'trim|min_length[1]');
 		$this->form_validation->set_rules('confirmnewpdw', 'Vahvista uusi salasana', 'trim|min_length[1]|matches[newpwd]');

 				if ($this->model_sivu->check_key($key)){
 				$data = array('key' => $key);

 				$this->load->template('forgottenpasswordreset', $data);

 				}
 				else{
 				redirect('sivu/login');

 				}



  	}

 	public function changeforgottenpassword()
 		{
 		$this->load->helper(array('form', 'url'));
 		$this->load->library('form_validation');
 		$this->load->model('model_sivu');

 		$newkey = md5(uniqid());

 		$this->form_validation->set_rules('newpwd', 'Uusi salasana', 'trim|min_length[1]');
 		$this->form_validation->set_rules('confirmnewpdw', 'Vahvista uusi salasana', 'trim|min_length[1]|matches[newpwd]');
 		$this->form_validation->set_message('min_length', "<p style='color:red;''>Salasana kentät ovat pakollisia.</p>");
 		$this->form_validation->set_message('matches', "<p style='color:red;''>Salasanat eivät täsmää.</p>");

 		$data = array('key' => $newkey);


 		if ($this->form_validation->run()){
  			if($this->model_sivu->changeforgottenpassword($newkey)){
  				redirect('sivu/login');
  			}
  			else
  			{
  				$this->load->template('forgottenpasswordreset', $data);
  				echo'Salanan vaihto epäonnistui';
  			}


 		} else {
 				$this->load->template('forgottenpasswordreset', $data);
 				}
  		}

}
