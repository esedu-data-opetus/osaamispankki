<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
<link rel="icon" href="<?=base_url()?>/esedu_logo.ico" type="image/gif">
<script>
function hideMessage() {
    document.getElementById("message").style.display = "none";
};
setTimeout(hideMessage, 2000);
</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php
		// Laittaa napit sen mukaan millä sivulla on
	$test = $this->session->userdata('');
	if($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif( $this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
			
			}
			elseif($this->uri->segment(2) == "login")
			{
				echo '<a role="button" id="osaamispankki"   href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="luotili" 		href="'.base_url().'sivu/register'.' ">Luo tili</button></a>';
			
			}
			elseif($this->uri->segment(2) == "login_english")
			{
				echo '<a role="button" id="osaamispankki"   href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
				echo '<a role="button" id="luotili"  		href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
			
			}
			elseif($this->uri->segment(2) == "login_validation")
			{
				echo '<a role="button" id="osaamispankki"  href="'.base_url().'>Osaamispankki</a>';
				echo '<a role="button" id="luotili" 	   href="'.base_url().'sivu/register'.' ">Luo tili</button></a>';
			
			}
			elseif($this->uri->segment(2) == "login_validation_english")
			{
				echo '<a role="button" id="osaamispankki"  href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
				echo '<a role="button" id="luotili"  	   href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
			
			}
			elseif($this->uri->segment(2) == "register")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login'.' ">Kirjautuminen</button></a>';							 														
			}
			elseif($this->uri->segment(2) == "register_english")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';							 														
			}
			elseif($this->uri->segment(2) == "register_validation")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message'.'">Osaamispankki</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login'.' ">Kirjautuminen</button></a>';							 														
			}
			elseif($this->uri->segment(2) == "register_validation_english")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';							 														
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Oma profiili</a>';

			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "welcome_message_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Your profile</a>';

			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
			}

			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus_english")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "haku")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "hakutulokset")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->uri->segment(2) == "register_successful")
			{
			
			}
			elseif($this->uri->segment(2) == "register_successful_english")
			{
			
			}

			elseif($this->uri->segment(2) == "")
			{
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login'.' ">Kirjautuminen</button></a>';
				echo '<a role="button" id="luotili" href="'.base_url().'sivu/register'.' ">Luo tili</button></a>';

			}
			elseif($this->uri->segment(2) == "welcome_message_english")
			{
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';
				echo '<a role="button" id="luotili" href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
				//echo '<a href ="'.base_url().'sivu/welcome_message"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5 col-md-offset-6" style="width:75px;height:30px;margin-right:-80px;"></a>';
			}
			
	?>
</nav>

<!--Laitetaan paddingiä jotta navbar ei mene tekstin päälle-->
<body style="padding-top: 60px;">
