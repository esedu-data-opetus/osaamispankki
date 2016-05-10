<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Own profile</title>
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
	<script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-modal.js"></script>
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
</head>
<style>
.glyphicon glyphicon-search{
	font-size:1em;
}
</style>
<body>
<a href="haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Search</span></a>
  <!-- Modal TYOHISTORIA -->
  <div class="modal fade" id="myModalTyohistoria">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Confirm deletion</h4>
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
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'index.php/sivu/delete_tyohistoria_english/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Delete</a></button>';//Poisto nappi
         ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Cancel</a></button>
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
          <h4 style="font-weight:bold;" class="modal-title">Confirm deletion</h4>
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
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'index.php/sivu/delete_koulutukset_english/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Delete</a></button>';//Poisto nappi
         ?>
          <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Cancel</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>
<script type="text/javascript">
	setInterval(function() 
	{
		if(document.getElementById("uploadBox").value != "") 
		{
			document.getElementById('nappi').disabled = false;
		}
		else
		{
			document.getElementById('nappi').disabled = true;
		}
	}, 100);
</script> 

<div class="container" id="container">

	<h1 style="text-align:center;font-size:3.3em;font-weight:bold;">Your profile</h1><br>
	<?php $query = $this->db->query("SELECT etunimi, pkuva, sNimi, puhelinnro, pitkaKuvaus, spuoli, lyhytKuvaus, sposti FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");?>
	<img src="<?php echo base_url()?>images/profiili/<?php foreach ($query->result_array() as $row){ echo $row['pkuva'];} ?>" class="img-responsive img-thumbnail" style="width: 200px;">

	<?php echo form_open_multipart('upload_controller/do_upload_english');?>
		<?php echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>"; ?>
		<br>
		<?php echo "<input type='submit' id='nappi' name='submit'  value='Upload' class='btn btn-success' disabled/> ";?>
		<?php echo "</form>"?>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php

	$query = $this->db->query("SELECT etunimi FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$etunimi = "$row->etunimi";
	
	}

	echo '<a role="button" id="osaamispankki"  href="'.base_url().'index.php/sivu/welcome_message_english'.'">Learning bank</a>';
	echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'index.php/sivu/logout_english'.' ">Logout</button></a>'; 
	echo "<h3 style='font-family:Impact, Charcoal, sans-serif;font-size:1.3em;margin-left:200px;margin-top:-51px;'>Welcome,</h3>"; 
	echo "<b style='font-size:15px;'>";
	echo "<h4 style='font-size:1.1em;margin-left:290px;margin-top:-28px;'>".$etunimi."</h4>";
	echo "</b>";
	
	echo '</nav>';

	//Tyohistoria
	echo '<div class="row">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Work history</p><a href="'.base_url().'index.php/sivu/tyohistoria_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';
	
	$tyohistoria = "";

	$tyohistoria .= '<table class="table" border="1">';
	$tyohistoria .= '<thead><tr><th>Workplace</th><th>Task</th><th>Started</th><th>Ended</th><th>Description</th><th><th></th></th></tr></thead>';

	
	$query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	   = "$row->id";
		$tyopaikka = "$row->tyopaikka";
		$tehtava   = "$row->tehtava";
		$alkoi     = "$row->alkoi";
		$loppui    = "$row->loppui";
		$kuvaus    = "$row->kuvaus";

		if($tyopaikka != NULL) 
		{
			$bFound = true;
		
			$tyohistoria .= '<tr>';
			$tyohistoria .= '<td>'.$tyopaikka.'</td>';
			$tyohistoria .= '<td>'.$tehtava.'</td>';
			$tyohistoria .= '<td>'.$alkoi.'</td>';
			$tyohistoria .= '<td>'.$loppui.'</td>';
			$tyohistoria .= '<td style="max-width:500px;word-wrap: break-word;">'.$kuvaus.'</td>';
			$tyohistoria .= '<td><a href="'.base_url().'index.php/sivu/edit_tyohistoria_english/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></td>';//Muokkaus nappi
			$tyohistoria .= '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$tyohistoria .= '</tr>';
		}
	}
		
	if($bFound)
		echo $tyohistoria;
	else
		echo "<p style='color:red;font-weight:bold;'>Work history is not added yet</p>";
	
	
	echo '</table>';
	echo '</div>';
	echo '</div>';
	//Koulutus
	echo '<div class="row">';
	echo '<div id="koulutukset">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Education</p><a href="'.base_url().'index.php/sivu/koulutukset_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$koulutukset = "";

	$koulutukset .= '<table class="table" border="1">';
	$koulutukset .= '<thead><tr><th>Education name</th><th>Level of education</th><th>School</th><th>Started</th><th>Ended</th><th><th></th></th></tr></thead>';

	$query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui, sposti FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 		  = "$row->id";
		$koulutusnimi = "$row->koulutusnimi";
		$koulutusaste = "$row->koulutusaste";
		$oppilaitos   = "$row->oppilaitos";
		$alkoi2 	  = "$row->alkoi";
		$loppui2 	  = "$row->loppui";
		$sposti 	  = "$row->sposti";

		if($koulutusnimi != NULL)
		{
			$bFound = true;

			$koulutukset .= '<tr>';
			$koulutukset .= '<td>'.$koulutusnimi.'</td>';
			$koulutukset .= '<td>'.$koulutusaste.'</td>';
			$koulutukset .= '<td>'.$oppilaitos.'</td>';
			$koulutukset .= '<td>'.$alkoi2.'</td>';
			$koulutukset .= '<td>'.$loppui2.'</td>';
			$koulutukset .= '<td><a href="'.base_url().'index.php/sivu/edit_koulutukset_english/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></td>';//Muokkaus nappi
			$koulutukset .= '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKoulutukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$koulutukset .= '</tr>';
		}
	}

	$koulutukset .= '</table>';

	if($bFound)
		echo $koulutukset;
	else
		echo "<p style='color:red;font-weight:bold;'>Education is not added yet</p>";

	echo '</div>';
	echo '</div>';
	?>

</div>
</body>
</html>
