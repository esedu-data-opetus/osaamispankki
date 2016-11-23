<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
	  <a style="margin: 0; padding: 0;" class="navbar-brand" href="<?php echo  base_url(); ?>"><img src="http://paja.esedu.fi/op/pictures/esedu_logo.png" style="max-height:50px; margin: 0; padding: 0;"></a>
	</div>
	<div class="Container">
	<?php

if ($this->session->userdata('is_logged_in') !== 1) {
		echo '<a id="kirjautuminen" href="'.base_url().'users/login">Kirjautuminen</a>';
		echo '<a id="luotili" href="'.base_url().'users/register">Luo tili</a>';
} else {
		echo '<a id="takaisinprofiiliin" href="'.base_url().'profile'.'">Oma profiili</a>';
		echo '<a href="'.base_url().'sivu/haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Hakuun</span></a>';
		echo '<a id="kirjauduulos" style="float:right;" href="'.base_url().'/users/logout">Kirjaudu ulos</a>';
}


// echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
// //echo '</div>';
// echo '<a href="haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Hakuun</span></a>';
// //echo '<div class="col-sm-1 col-md-pull-3>';
// echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'sivu/logout'.'" >Kirjaudu ulos</button></a>';
//
// 		// Laittaa napit sen mukaan millä sivulla on
// 	if($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 	} elseif( $this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->uri->segment(2) == "login") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'users/register'.' ">Luo tili</button></a>';
// 			} elseif($this->uri->segment(2) == "login_english") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
// 			} elseif($this->uri->segment(2) == "login_validation") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'users/register'.' ">Luo tili</button></a>';
// 			} elseif($this->uri->segment(2) == "login_validation_english") {
// 				echo '<a role="button" id="osaamispankki"  href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
// 			}	elseif($this->uri->segment(2) == "register") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'users/login'.' ">Kirjautuminen</button></a>';
// 			} elseif($this->uri->segment(2) == "register_english") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';
// 			} elseif($this->uri->segment(2) == "register_validation") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message'.'">Osaamispankki</a>';
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'users/login'.' ">Kirjautuminen</button></a>';
// 			} elseif($this->uri->segment(2) == "register_validation_english") {
// 				echo '<a role="button" id="osaamispankki" href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Oma profiili</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "welcome_message_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Your profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "harrastukset_lisaus") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "harrastukset_lisaus_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_harrastukset") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_harrastukset_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "haku") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "hakutulokset") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "kortit_lisaus") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members'.'">Takaisin profiiliin</a>';
// 			} elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "kortit_lisaus_english") {
// 				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'sivu/members_english'.'">Back to profile</a>';
// 			} elseif($this->uri->segment(2) == "register_successful") {
// 			}	elseif($this->uri->segment(2) == "register_successful_english") {
// 			} elseif($this->uri->segment(2) == "") {
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'users/login'.' ">Kirjautuminen</button></a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'users/register'.'">Luo tili</button></a>';
// 			} elseif($this->uri->segment(2) == "welcome_message_english") {
// 				echo '<a role="button" id="kirjautuminen" href="'.base_url().'sivu/login_english'.' ">Login</button></a>';
// 				echo '<a role="button" id="luotili" href="'.base_url().'sivu/register_english'.' ">Create an account</button></a>';
// 			}

	?>
</div>
</nav>
