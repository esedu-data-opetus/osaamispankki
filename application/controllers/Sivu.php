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


		if ($this->form_validation->run())
		{

			
				if($this->model_sivu->edit_members())
				{
					
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Perustiedot päivitetty</p>';
					redirect('sivu/members');		
				}		
					else
				{	
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Tyohistoriaa ei päivitetty</p>';		
				}
		}
		
		$this->load->template('members');
	}

	public function members_edit_english() 
	{
		
		$this->load->model('model_sivu');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('privSposti', 'Sposti', 'trim');
		$this->form_validation->set_rules('etunimi', 'Salasana', 'trim');
		$this->form_validation->set_rules('sNimi', 'Sposti', 'trim');
		$this->form_validation->set_rules('osoite', 'Salasana', 'trim');
		$this->form_validation->set_rules('postinro', 'Salasana', 'trim');
		$this->form_validation->set_rules('puhelinnro', 'Salasana', 'trim');


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

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_sivu');

			$this->email->from('osaamispankki@esedu.fi', "Osaamispankki");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Vahvista käyttäjätilisi.");

			$message = "";
			$message .= "<a href='".base_url()."index.php/sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";

			$this->email->message($message);

			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->add_temp_user($key)) {
				if ($this->email->send()){
					echo "<center><h2 style='font-weight:bold;color:green;'>Vahvistus on lähetetty sähköpostiisi!</h2>";
					echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p></center>";
			} 	else echo "<h2 style='font-weight:bold;color:red;'>Sähköpostin lähetys ei onnistu localhostilla.</h2>";
				     echo '<h4>Mutta pystyt kuitenkin kirjautumaan sisään</h4>';
				     echo "<a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a>";
					
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
			$message .= "<a href='".base_url()."index.php/sivu/register_user/$key' >Click here</a> to confirm your account";

			$this->email->message($message);

			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->add_temp_user($key)) {
				if ($this->email->send()){
					echo "<center><h2 style='font-weight:bold;color:green;'>A confirmation has been sent to your email!</h2>";
					echo "<p><a href='".base_url()."index.php/sivu/login_english' >Back to login</a></p></center>";
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
		echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p></center>";
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
		echo "<p><a href='".base_url()."index.php/sivu/login_english' >Back to login</a></p></center>";
	}
	
	public function haku()
 	{
	  	//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
 		if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
 		$this->load->model('model_sivu');
 		//$data['query'] = $this->model_sivu->tee_haku();
 		$this->load->template('haku');
 		}
 		else {
		redirect('sivu/restricted');
	}
 	}

 	public function hakutulokset()
 	{
 		//Hakuun vaadittua käyttäjätyyppia voi vaihtaa
 		if ($this->session->userdata('is_logged_in') && $this->session->userdata('usertype') >= 1) {
 	 	$this->load->model('model_sivu');
 		$data['query'] = $this->model_sivu->tee_haku();
 		$this->load->template('hakutulokset', $data);
 	}
 	else
 	{
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
									redirect('sivu/members');
								}
								else
								{
									redirect('sivu/members');
								}
			}
			$this->load->template('perustiedot');


		}
}
