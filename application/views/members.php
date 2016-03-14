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
</style>
</head>
<body>
<a href="<?php echo base_url()."index.php/sivu/logout" ?>" class="btn btn-danger">Kirjaudu ulos</a>

<div id="container">
	<h1 style="text-align:center;">Oma profiili</h1>
		<?php
	
// 	foreach($result as $row)
// 	{
// 		echo $row->sposti;
// 		echo "<br>";
// 	}

	echo "<pre>";
	echo "Tervetuloa "; 
	echo "<b style='font-size:15px;'>";
	echo $this->session->userdata('sposti');
	echo "</b>";
	//print_r ($this->session->all_userdata());
	echo "</pre>";

	?>
	<div id="button">
	
<ul>	
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li>
</ul>
	</div>
<br>


	
</div>

</body>
</html>
