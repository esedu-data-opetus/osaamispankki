<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<style>

</style>

	  	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<?php
				$test = $this->session->userdata('');
				if($this->session->userdata('is_logged_in') == 1)
						{
							echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>';
						}
						elseif($this->uri->segment(2) == "login")
						{
							echo '<a role="button" id="osaamispankki"  href="'.base_url().'index.php/sivu'.'">Osaamispankki</a>';
							echo '<a role="button" id="luotili"  href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';
						
						}
						elseif($this->uri->segment(2) == "register")
						{
							echo '<a role="button" id="osaamispankki" href="'.base_url().'index.php/sivu'.'">Osaamispankki</a>'; 
							echo '<a role="button" id="kirjautuminen" href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';							
						}
						else 
						{
							echo '<a role="button" class="btn btn-info" style="height: 50px; width: 100px; margin-right: 10px;" id="kirjautuminen "href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';
							echo '<a role="button" class="btn btn-link" style="height: 50px; width: 100px;" id="luotili"  href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';
						}
				?>
		</nav>

<!--Laitetaan paddingiä jotta navbar ei mene tekstin päälle-->
<body style="padding-top: 60px;">
