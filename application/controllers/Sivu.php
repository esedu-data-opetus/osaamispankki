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
	
	//Estää pääsyn tälle sivulle jos ei ole kirjauduttu sisään
	public function tyohistoria()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->template('tyohistoria');
	} else {
		redirect('sivu/restricted');
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
		$this->load->model('model_sivu');
		if ($this->form_validation->run()){

			$data = array(
					'sposti' => $this->input->post('sposti'),
					'is_logged_in' => 1,
					'usertype' => $this->model_sivu->getusertype()
				);
				$this->session->set_userdata($data);
					//Ohjataan eri sivuille käyttäjätyypin mukaan
					if ($this->session->userdata('usertype') == 1) {
						redirect('sivu2');
					}
					elseif($this->session->userdata('usertype') == 2){
						redirect('sivu/haku');
					}
					else{
						redirect('secret_meme2');
					}

		} else {
			$this->load->template('login');
		}
	}

	public function edit_tyohistoria($id) 
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

				if($this->model_sivu->edit_tyohistoria($id))
				{
					$this->output->set_header('sivu/members');	
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Tyohistoria päivitetty</p>';		
				}		
					else
				{	
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Tyohistoriaa ei päivitetty</p>';		
				}
		}
		$this->load->template('tyohistoria');
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

	public function edit_koulutukset($id) 
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

				if($this->model_sivu->edit_koulutus($id))
				{
					$this->output->set_header('sivu/members');
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Koulutus päivitetty</p>';
				}		
					else
				{			
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Koulutusta ei päivitetty</p>';				
				}
		}
		$this->load->template('koulutukset');
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

	public function delete_tyohistoria($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_tyohistoria($id);
			redirect('sivu/members');	
		   
		}

	public function delete_koulutukset($id)
		{
			$this->load->model('model_sivu');
			$this->model_sivu->delete_koulutukset($id);
			redirect('sivu/members');	
		   
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
	public function haku()
 	{
 		if ($this->session->userdata('is_logged_in') || $this->session->userdata('usertype') > 1) {
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
 		if ($this->session->userdata('is_logged_in') || $this->session->userdata('usertype') > 1) {
 	 	$this->load->model('model_sivu');
 		$data['query'] = $this->model_sivu->tee_haku();
 		$this->load->template('hakutulokset', $data);
 	}
 	else
 	{
 	redirect('sivu/restricted');
 	}
 	}
}
