<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<style>
#osaamispankki {
	border-style: groove;
	border-color: ;
	background-color:blue;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
#osaamispankki:hover{
	background-color: #0066ff;
}
#luotili {
	border-style: groove;
	border-color: ;
	background-color:#ff7256;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
#luotili:hover{
background-color: #e9967a;
}
#kirjautuminen{
	border-style: groove;
	border-color: ;
	background-color:#00cdcd;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
#kirjautuminen:hover{
background-color: #40e0d0;	
}
#kirjauduulos{
background-color:red;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
#kirjauduulos:hover{
	background-color:#990000 ;
}
#takaisinprofiiliin{
	margin-left:0%;
	border-style: groove;
	border-color: ;
	background-color:#0066ff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
#takaisinprofiiliin:hover{
background-color: blue;
}
</style>


	  	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<?php

				$test = $this->session->userdata('');
				if($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria")
						{
							echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>';
							echo '<a role="button" id="takaisinprofiiliin" href="'.base_url().'index.php/sivu/members'.'">Takaisin profiiliin</a>';
				
						}
						elseif($this->uri->segment(2) == "login")
						{
							echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
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
						elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyokokemus")
						{
							echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>';
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
