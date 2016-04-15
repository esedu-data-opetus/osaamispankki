<script>
function hideMessage() {
    document.getElementById("message").style.display = "none";
};
setTimeout(hideMessage, 2000);



</script>
<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->template('welcome_message');
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('login');
	}

	public function register()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('register');
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
	
	// Jos ei ole kirjauduttu sisään, estää pääsyn tälle sivulle
	public function tyohistoria()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
	}

	}

	// Jos ei ole kirjauduttu sisään, estää pääsyn tälle sivulle
	public function koulutukset_()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
	}
		
	}

	// Access denied sivu
	public function restricted()
	{
		$this->load->view('restricted');
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
					'is_logged_in' => 1
				);
			$this->session->set_userdata($data);
			redirect('sivu/members');
		} else {
			$this->load->template('login');
		}
	}

	public function tyokokemus() 
	{
		
		$this->load->model('model_sivu');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 'trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 'trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 'trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 'trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Tyopaikka on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_tyohistoria())
				{
					$this->output->set_header('sivu/members');
					//redirect('sivu/members');	
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Tyohistoria päivitetty</p>';		
				}		
					else
				{	
					echo 'Jotain meni pieleen';		
				}
		}
		$this->load->template('tyohistoria');
	}


	public function koulutukset() 
	{
		
		$this->load->model('model_sivu');
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('koulutusnimi', 'Koulutus', 'required|trim');

		$this->form_validation->set_message('required', "<b style='color:red;'>Koulutus on pakollinen.</b>");

		if ($this->form_validation->run())
		{

				if($this->model_sivu->add_koulutus())
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Työkokemus päivitetty</p>';
				}		
					else
				{			
					echo 'Jotain meni pieleen';				
				}
		}
		$this->load->template('koulutukset');
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
					echo "Vahvistus on lähetetty sähköpostiisi!";
					echo "<p><a href='".base_url()."index.php/sivu/login' >Back to login</a></p>";
			} 	else echo "Sähköpostin lähetys ei onnistu.";
					 echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p>";
		} else echo "Ongelma tietokantaan lisätessä.";

		} else {
			$this->load->template('register');
		}
	}

	/* public function salasana_check($str)
    {
    	if(empty($_GET['salasana'])){

        $this->form_validation->set_message('salasana_check', '<b style="color:red;">Salasana kentät ovat pakollisia.</b>');
        return FALSE;
    	 } else {
    	return true;
    	 }
    }

    public function sposti2_check($str)
    {
    	 if(empty($_GET['sposti'])){

    	 $this->form_validation->set_message('sposti2_check', '<b style="color:red;">Sähköposti on pakollinen.</b>');
    	 return FALSE;
    	}
    }*/

    //Tarkistaa että pystyy rekisteröitymään vain @esedulainen.fi/@esedu.fi päätteisellä sähköpostiosoitteella
    public function sposti_check($str)
    {

    	 
        if(stristr($str,'@esedulainen.fi') !== false) return true;
        if(stristr($str,'@esedu.fi') !== false) return true; 

        $this->form_validation->set_message('sposti_check', '<p style="color:red;">Voit käyttää vain <b style="color:#5eab1c">@esedulainen.fi/@esedu.fi</b> päätteistä osoitetta.</p>');
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

	//Uloskirjautuminen
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('sivu/login');
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
					redirect('sivu/members');
			} else echo 'failed to add user, please try again.';
			
		} else echo '<b><h1>Käyttäjätili on jo vahvistettu</h1></b>';
		echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p>";
	}
	public function changepassword()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->template('changepassword');
	}



	public function changepassword_validation()
	{
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

	public function passwd_check()
	{
		$this->load->model('model_sivu');
		if ($this->model_sivu->checkpassword()){
			return true;
		} else {
			$this->form_validation->set_message('passwd_check', "<p style='color:red;'>Väärä sähköposti/salasana.</p>");
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

			$this->email->from('miika.hamalainen@paja.esedu.fi', "Miika");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Aseta uusi salasana");
			$message = "";
			$message .= "<a href='".base_url()."index.php/sivu/resetpassword/$key' >Klikkaa tästä</a> asettaaksesi uuden salasanan";
			$this->email->message($message);
			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->model_sivu->passwordresetkey($key)) {
				if ($this->email->send()){
					echo "Linkki salasanan palauttamiseeen on lähetetty sähköpostiisi!";
					//echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p>";
							echo $this->email->print_debugger();
			} 	else echo "Sähköpostin lähetys ei onnistu.";
					// echo "<p><a href='".base_url()."index.php/sivu/login' >Takaisin kirjautumiseen</a></p>";
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
			return true;
		} 
		else 
		{
			$this->form_validation->set_message('forgotpasswordemailcheck', "<p style='color:red;'>Väärä sähköposti.</p>");
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
				redirect('sivu/index');
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
