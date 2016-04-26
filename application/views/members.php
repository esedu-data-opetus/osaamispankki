<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Oma profiili</title>
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
	<script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-modal.js"></script>
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
</head>

<body>

  <!-- Modal TYOHISTORIA -->
  <div class="modal fade" id="myModalTyohistoria">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>
          <?php

          $query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row){
			$id 	   = "$row->id";
			$tyopaikka = "$row->tyopaikka";
			$tehtava   = "$row->tehtava";
			$alkoi     = "$row->alkoi";
			$loppui    = "$row->loppui";
			$kuvaus    = "$row->kuvaus";
			}
         
          ?>
        <div class="modal-footer">
     
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'index.php/sivu/delete_tyohistoria/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>

  <!-- Modal KOULUTUKSET -->
  <div class="modal fade" id="myModalKoulutukset">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>
          <?php

          
        $query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row){

		$id 		  = "$row->id";
		$koulutusnimi = "$row->koulutusnimi";
		$koulutusaste = "$row->koulutusaste";
		$oppilaitos   = "$row->oppilaitos";
		$alkoi2 	  = "$row->alkoi";
		$loppui2 	  = "$row->loppui";
		}
         
          ?>
        <div class="modal-footer">
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'index.php/sivu/delete_koulutukset/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>
          <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>
  

<div class="container" id="container">

	<h1 style="text-align:center;font-size:3.3em;font-weight:bold;">Oma profiili</h1><br>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php

	$query = $this->db->query("SELECT etunimi FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$etunimi = "$row->etunimi";
	
	}

	echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
	echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout'.' ">Kirjaudu ulos</button></a>'; 
	echo "Tervetuloa "; 
	echo "<b style='font-size:15px;'>";
	echo $etunimi;
	echo "</b>";
	
	echo'</nav>';

	//Tyohistoria
	echo '<div class="row">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Tyohistoria</p><a href="'.base_url().'index.php/sivu/tyohistoria_lisaus" class="btn btn-success glyphicon glyphicon-plus button yellow" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';
	?>
	<div class="tooltip">Hover over me
		<span class="tooltiptext">Tooltip text</span>
	</div>
	<?php
	$query = $this->db->query("SELECT tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$tyopaikka = "$row->tyopaikka";
		$tehtava   = "$row->tehtava";
		$alkoi 	   = "$row->alkoi";
		$loppui    = "$row->loppui";
		$kuvaus    = "$row->kuvaus";
	}
	
	if($tyopaikka == ''){
		echo '<p>Et ole lisännyt vielä työhistoriaa!</p>';
	} else {
		echo '<table class="table" border="1">';
		echo '<thead><tr><th>Työpaikka</th><th>Tehtävä</th><th>Alkoi</th><th>Loppui</th><th>Kuvaus</th><th><th></th></th></tr></thead>';

		$query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row){
			$id 	   = "$row->id";
			$tyopaikka = "$row->tyopaikka";
			$tehtava   = "$row->tehtava";
			$alkoi     = "$row->alkoi";
			$loppui    = "$row->loppui";
			$kuvaus    = "$row->kuvaus";

			echo '<tr>';
			echo '<td>'.$tyopaikka.'</td>';
			echo '<td>'.$tehtava.'</td>';
			echo '<td>'.$alkoi.'</td>';
			echo '<td>'.$loppui.'</td>';
			echo '<td style="max-width:500px;word-wrap: break-word;">'.$kuvaus.'</td>';
			echo '<td><a href="'.base_url().'index.php/sivu/edit_tyohistoria/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></td>';//Muokkaus nappi
			echo '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			echo '</tr>';
		}
		echo '</table>';
	}

	echo '</div>';
	echo '</div>';
	//Koulutus
	echo '<div class="row">';
	echo '<div id="koulutukset">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Koulutukset</p><a href="'.base_url().'index.php/sivu/koulutukset_lisaus" class="btn btn-success glyphicon glyphicon-plus button yellow" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	
	$query = $this->db->query("SELECT koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$koulutusnimi = "$row->koulutusnimi";
		$koulutusaste = "$row->koulutusaste";
		$oppilaitos   = "$row->oppilaitos";
		$alkoi2 	  = "$row->alkoi";
		$loppui2 	  = "$row->loppui";
	}

	if($koulutusnimi == '' ){
		echo '<p>Et ole lisännyt vielä koulutusta!</p>';
	} else {
		echo '<table class="table" border="1">';
		echo '<thead><tr><th>Koulutusnimi</th><th>Koulutusaste</th><th>Oppilaitos</th><th>Alkoi</th><th>Loppui</th><th><th></th></th></tr></thead>';

		$query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row){

		$id = "$row->id";
		$koulutusnimi = "$row->koulutusnimi";
		$koulutusaste = "$row->koulutusaste";
		$oppilaitos   = "$row->oppilaitos";
		$alkoi2 	  = "$row->alkoi";
		$loppui2 	  = "$row->loppui";
	
		echo '<tr>';
		echo '<td>'.$koulutusnimi.'</td>';
		echo '<td>'.$koulutusaste.'</td>';
		echo '<td>'.$oppilaitos.'</td>';
		echo '<td>'.$alkoi2.'</td>';
		echo '<td>'.$loppui2.'</td>';
		echo '<td><a href="'.base_url().'index.php/sivu/edit_koulutukset/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></td>';//Muokkaus nappi
		echo '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKoulutukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
		echo '</tr>';
		}
		echo '</table>';
	}

	echo '</div>';
	echo '</div>';
	?>
</div>
</body>
</html>
