<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">



		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<?php if(isset($is_logged_in))
						{
							echo '<a href="'.base_url()."index.php/sivu/logout".'"><button type="button" class="btn btn-success" style="width:100px; height:50px; text-size:4px; padding:0px; float: right;" >Kirjaudu ulos</button></a>';
						}
						elseif($this->uri->segment(2) == "login")
						{
							echo '<a href="'.base_url()."index.php/sivu/index".'"><button type="button" class="btn btn-success" style="width:100px; height:50px; text-size:4px; background-color:green; padding:0px; float: right;" >Etusivulle</button></a>';
						}
						else 
						{
							echo '<a href="'.base_url()."index.php/sivu/login".'"><button type="button" class="btn btn-success" style="width:100px; height:50px; text-size:4px; background-color:green; padding:0px; float: right;" >Kirjaudu sisään</button></a>';
						}
				?>
		</nav>

<!--Laitetaan paddingiä jotta navbar ei mene tekstin päälle-->
<body style="padding-top: 60px;">
