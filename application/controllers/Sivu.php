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
	public function tyohistoria()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
	}
		
	}

	public function restricted()
	{
		$this->load->view('restricted');
	}

	public function login_validation(){

		$this->load->library('form_validation');


		$this->form_validation->set_rules('sposti', 'Sposti', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('salasana', 'Salasana', 'md5|trim');

		$this->form_validation->set_message('required', "<p style='color:red;'>Syötä sähköposti.</p>");

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

	public function tyokokemus() {
		
		$this->load->model('Model_sivu');

		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('tyopaikka', 'Työpaikka', 'required|trim');
		$this->form_validation->set_rules('tehtava',   'Tehtava', 'required|trim');
		$this->form_validation->set_rules('alkoi',     'Alkoi', 'required|trim');
		$this->form_validation->set_rules('loppui',    'Loppui', 'required|trim');
		$this->form_validation->set_rules('kuvaus',    'Kuvaus', 'required|trim');

		if ($this->form_validation->run())
		{

				if($this->Model_sivu->add_tyohistoria())
				{
					redirect('sivu/tyohistoria');
					//echo '<p id="message" style="text-align:center;color:green;font-size:1.2em;">Työkokemus päivitetty</p>';
				}		
					else
				{
			
					echo 'Jotain meni pieleen';
				
				}
		}
		$this->load->template('tyohistoria');
	}

	public function register_validation()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('etunimi', 'Etunimi', 'required');
		$this->form_validation->set_rules('sposti', 'Sposti', 'trim|is_unique[vahvistamattomatkayttajat.sposti]|is_unique[kirjautumistiedot.sposti]|callback_sposti_check');
		$this->form_validation->set_rules('salasana', 'Salasana', 'trim|min_length[1]');
		$this->form_validation->set_rules('salasanaconfirm', 'Confirm Password', 'trim|min_length[1]|matches[salasana]');

		$this->form_validation->set_message('is_unique', "<p style='color:red;'>Tämä sähköpostiosoite on jo käytössä.</p>");
		$this->form_validation->set_message('min_length', "<p style='color:red;''>Salasana kentät ovat pakollisia.</p>");
		$this->form_validation->set_message('matches', "<p style='color:red;''>Salasanat eivät täsmää.</p>");
		$this->form_validation->set_message('alpha', "<p style='color:red;''>Etunimessä ei voi olla muuta kuin kirjaimia.</p>");
		
		if ($this->form_validation->run()){
 
			//Generoi satunnaisen avaimen
			$key = md5(uniqid());

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('Model_sivu');

			$this->email->from('osaamispankki@esedu.fi', "Osaamispankki");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Vahvista käyttäjätilisi.");

			$message = "";
			$message .= "<a href='".base_url()."index.php/sivu/register_user/$key' >Klikkaa tästä</a> vahvistaaksesi käyttäjän";

			$this->email->message($message);

			//Lähettää sähköpostivarmistuksen käyttäjälle
			if ($this->Model_sivu->add_temp_user($key)) {
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


	//Tarkistaa että pystyy rekisteröitymään vain @esedulainen.fi/@esedu.fi päätteisellä sähköpostiosoitteella

	 public function sposti_check($str)
    {
        if(stristr($str,'@esedulainen.fi') !== false) return true;
        if(stristr($str,'@esedu.fi') !== false) return true;
    

        $this->form_validation->set_message('sposti_check', '<p style="color:red;">Voit käyttää vain <b>@esedulainen.fi/@esedu.fi</b> päätteistä osoitetta.</p>');
        return FALSE;
    }

	public function validate_credentials()
	{
		$this->load->model('Model_sivu');

		if ($this->Model_sivu->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', "<p style='color:red;'>Väärä sähköposti/salasana.</p>");
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('sivu/login');
	}

	public function register_user($key){
		
		$this->load->model('Model_sivu');

		if ($this->Model_sivu->is_key_valid($key)){
			if ($newemail = $this->Model_sivu->add_user($key)){

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
		$this->load->template('changepassword');
		}


	public function changepasswordCheck()
	{
		$this->load->model('Model_sivu');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('newpwd', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('confirmnewpdw', 'Password confirmation', 'trim|required|min_length[4]|matches[newpwd]');


		if($this->Model_sivu->checkpassword())
		{
			if($this->form_validation->run() == FALSE){echo validation_errors('<p style="color:red" class="error">');}
			else
			{
				if($this->Model_sivu->changepassword())
				{
					echo 'Salasanan vaihtoi onnistui. Palataan profiilisivulle';
					header('refresh:3 ;members');
				}
				else
				{
					echo 'Salasanan vaihtoi epäonnistui.';
				}
			}


		}
		else 
		{
			echo "Nykyinen salasana ei täsmää";
		}

	}
}
