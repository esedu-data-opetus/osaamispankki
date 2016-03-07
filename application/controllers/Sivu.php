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

	public function members()
	{
		if ($this->session->userdata('is_logged_in')) {
		$this->load->view('members');
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
		$this->form_validation->set_rules('salasana', 'Salasana', 'required|md5|trim');

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

	public function register_validation()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('sposti', 'Sposti', 'required|trim|is_unique[kirjautumistiedot.sposti]|callback_sposti_check');
		$this->form_validation->set_rules('salasana', 'Salasana', 'required|trim');
		$this->form_validation->set_rules('salasanaconfirm', 'Confirm Password', 'required|trim|matches[salasana]');

		$this->form_validation->set_message('is_unique', "<p style='color:red;'>Tämä sähköpostiosoite on jo käytössä.</p>");
		$this->form_validation->set_message('required', "<p style='color:red;''>Salasana kentät ovat pakollisia.</p>");
		$this->form_validation->set_message('matches', "<p style='color:red;''>Salasanat eivät täsmää.</p>");

		if ($this->form_validation->run()){

			//Generoi satunnaisen avaimen
			$key = md5(uniqid());

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_Sivu');

			$this->email->from('riku.ronka@paja.esedu.fi', "dankmemer destiny");
			$this->email->to($this->input->post('sposti'));
			$this->email->subject("Confirm your account.");

			$message = "Thank you for signing up!";
			$message .= "<a href='".base_url()."sivu/register_user/$key' >Click here to confirm your account";

			$this->email->message($message);

			//Lähettää sähköpostia käyttäjälle
			if ($this->model_Sivu->add_temp_user($key)) {
				if ($this->email->send()){
					echo "The email has been sent!";
					echo "<p><a href='".base_url()."index.php/sivu/login' >Back to login</a></p>";
			} 	else echo "could not send the email.";
		} else echo "problem adding to database.";

		} else {
			$this->load->template('register');
		}
	}

	//Tarkistaa että pystyy rekisteröitymään vain @esedulainen.fi päätteisellä sähköpostiosoitteella

	 public function sposti_check($str)
    {
        if(stristr($str,'@esedulainen.fi') !== false) return true;
        if(stristr($str,'@esedu.fi') !== false) return true;
    

        $this->form_validation->set_message('sposti_check', '<p style="color:red;">Voit käyttää vain <b>@esedulainen.fi/@esedu.fi</b> päätteistä osoitetta.</p>');
        return FALSE;
    }

	public function validate_credentials()
	{
		$this->load->model('model_Sivu');

		if ($this->model_Sivu->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('sivu/login');
	}

	public function register_user($key){
		$this->load->model('model_Sivu');

		if ($this->model_Sivu->is_key_valid($key)){
			if ($newemail = $this->model_Sivu->add_user($key)){

				$data = array(
						'email' => $newemail,
						'is_logged_in' => 1
					);

					$this->session->set_userdata($data);
					redirect('sivu/members');
			} else echo 'failed to add user, please try again.';

		} else echo 'invalid key';
	}
}
