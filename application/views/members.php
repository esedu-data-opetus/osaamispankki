<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Oma profiili</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
	#button {
	text-align:center;
}
	ul {
	width:99%;
	list-style-type:none;
	}
	#both {
	 text-align:center;

	}
	
</style>
</head>
<body>
<!-- <li style="list-style-type:none;" class="active"><?php //echo '<a role="button" class="btn btn-danger" style="float:right;margin-top:-15px;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a></li>'?>-->

<div id="container">
	<h1 style="text-align:center;">Oma profiili</h1>
	
	<?php

	/*echo "<pre>";
	echo "Tervetuloa "; 
	echo "<b style='font-size:15px;'>";
	echo $this->session->userdata('sposti');
	echo "</b>";
	//print_r ($this->session->all_userdata());
	echo "</pre>";
*/
	?>
	<div id="button">
	
<ul>	
	<li><?php echo '<a href="'.base_url().'index.php/sivu/tyohistoria" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>'?>
<!--<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li>
</ul>-->
	</div>
<br>


	
</div>

</body>
</html>
