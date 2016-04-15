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
	width:5%;
	list-style-type:none;
	}
	#both {
		width: 500px;
	    overflow: hidden;
	    margin-left: 450px;
	    margin-top:-100px;
	}
	#tyohistoria {
	display: inline-block;
	float:left;
	}
	#koulutukset {
	display: inline-block;
	float:left;
	padding-left: 50px;
	}

	
</style>
</head>
<body>
<!-- <li style="list-style-type:none;" class="active"><?php //echo '<a role="button" class="btn btn-danger" style="float:right;margin-top:-15px;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a></li>'?>-->

<div id="container">
	<h1 style="text-align:center;font-size:3.3em;font-weight:bold;">Oma profiili</h1><br>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php

	$query = $this->db->query("SELECT tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row){
			$tyopaikka = "$row->tyopaikka";
			$tehtava = "$row->tehtava";
			$alkoi = "$row->alkoi";
			$loppui = "$row->loppui";
			$kuvaus = "$row->kuvaus";

		}


$query = $this->db->query("SELECT koulutusnimi FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

foreach ($query->result() as $row){
	$koulutusnimi = "$row->koulutusnimi";
}

	echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
	echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>';
	echo "Tervetuloa "; 
	echo "<b style='font-size:15px;'>";
	echo $this->session->userdata('sposti');
	echo "</b>";
	
	?>
</nav>

	<div id="button">
	
<ul>	
   <li><?php echo '<a href="'.base_url().'index.php/sivu/tyohistoria" class="btn btn-success" role="button">Lisää/Muokkaa tyohistoriaa</a></li><br>'?><br>
   <li><?php echo '<a href="'.base_url().'index.php/sivu/koulutukset" class="btn btn-success" style="margin-top:-40px;" role="button">Lisää/Muokkaa koulutuksia</a></li><br>'?>
     <li><?php echo '<a href="'.base_url().'index.php/sivu/changepassword" class="btn btn-success" style="margin-top:-40px;" role="button">Vaihda salasana</a></li><br>'?>

<!--<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li><br>
	<li><a href="" class="btn btn-success" role="button">Muokkaa tietoja</a></li-->
</ul>
	</div>
</div>

<?php
echo '<div id="both">';
	echo '<div id="tyohistoria">';
	echo '<h2 style="font-weight:Bold;">Tyohistoria</h2>';
	
	if($tyopaikka == '' ){
		echo '<p>Et ole lisännyt vielä työhistoriaa!</p>';
	} else {
	echo '<b>Työpaikka</b>';
	echo '<p>'.$tyopaikka.'</p>';
	}

	if($tyopaikka == '' ){
		echo '<b>Työpaikka</b>';
		echo '<p>'.$tyopaikka.'</p>';
	} else {
	
	}

	if($tehtava == ''){
		echo '<p></p>';
	} else {
	echo '<b>Tehtävä</b>';
	echo '<p>'.$tehtava.'</p>';
	}

	if($alkoi == ''){
		echo '<p></p>';
	} else {
	echo '<b>Alkoi</b>';
	echo '<p>'.$alkoi.'</p>';
	}

	if($loppui== ''){
		echo '<p></p>';
	} else {
	echo '<b>Loppui</b>';
	echo '<p>'.$loppui.'</p>';
	}

	if($kuvaus == ''){
		echo '<p></p>';
	} else {
	echo '<b>Kuvaus</b>';
	echo '<p>'.$kuvaus.'</p>';
	}
	echo '</div>';

	echo '<div id="koulutukset">';
	echo '<h2 style="font-weight:bold;">Koulutukset</h2>';
	if($koulutusnimi == ''){
		echo '<p>Et ole lisännyt vielä koulutusta!</p>';
	} else {
	echo '<b>Koulutus</b>';
	echo '<p>'.$koulutusnimi.'</p>';
	}
	echo '</div>';
echo '</div>';



?>


</body>
</html>
