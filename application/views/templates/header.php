<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
<style>
#osaamispankki {
	
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
#osaamispankki:hover{
	background-color: red;
}
#luotili {
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
#luotili:hover{
background-color: red;
}
#kirjautuminen{
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
#kirjautuminen:hover{
background-color: red;	
}
#kirjauduulos{
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
#kirjauduulos:hover{
	background-color: red;
}
</style>
<nav class="navbar navbar-default" style="margin-top:-60px;>
  <div class="container-fluid" style="margin-top:-150px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo '<a class="navbar-brand" href="'.base_url().'index.php/sivu'.'"'?>>Osaamispankki</a> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!--  div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo '<a role="button" class="btn btn-success" href="'.base_url().'index.php/sivu/login'.'">Kirjautuminen</button></a></li>'?>
        <li class="active"><?php echo '<a role="button" class="btn btn-primary" href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a></li>'?>
        <li class="active"><?php echo '<a role="button" class="btn btn-danger" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a></li>'?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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
							echo '<a role="button" id="kirjautuminen "href="'.base_url().'index.php/sivu/login'.' ">Kirjautuminen</button></a>';
							echo '<a role="button" id="luotili"  href="'.base_url().'index.php/sivu/register'.' ">Luo tili</button></a>';
						}
				?>
		</nav>

<!--Laitetaan paddingiä jotta navbar ei mene tekstin päälle-->
<body style="padding-top: 60px;">
