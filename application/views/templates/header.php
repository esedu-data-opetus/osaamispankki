<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
<style>

</style>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php
		// Laittaa napit sen mukaan millä sivulla on
	$test = $this->session->userdata('');
	if($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->uri->segment(2) == "login")
			{
				echo '<a role="button" id="osaamispankki"   href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="luotili"  href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';
			
			}
			elseif($this->uri->segment(2) == "login_validation")
			{
				echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="luotili"  href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';
			
			}
			elseif($this->uri->segment(2) == "register")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';							 														
			}
			elseif($this->uri->segment(2) == "register_validation")
			{
				echo '<a role="button" id="osaamispankki" href="'.base_url().'">Osaamispankki</a>';
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';							 														
			}
			elseif($this->uri->segment(2) == "members")
			{
				echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>';
				echo "Tervetuloa "; 
				echo "<b style='font-size:15px;'>";
				echo $this->session->userdata('sposti');
				echo "</b>";						 														
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Oma profiili</a>';

			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
			}

			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus")
			{
				echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
			}

			else
			{
				echo '<a role="button" id="kirjautuminen" href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';
				echo '<a role="button" id="luotili" href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';

			}
			
	?>
</nav>

<!--Laitetaan paddingiä jotta navbar ei mene tekstin päälle-->
<body style="padding-top: 60px;">
