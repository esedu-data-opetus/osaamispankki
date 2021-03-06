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
.login-form{
	resize:none;
}
</style>
<body>

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
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_tyohistoria_english/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Delete</a></button>';//Poisto nappi
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
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_koulutukset_english/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Delete</a></button>';//Poisto nappi
         ?>
          <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Cancel</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>
<script type="text/javascript">
	/*setInterval(function()
	{
		if(document.getElementById("uploadBox").value != "")
		{
			document.getElementById('nappi').disabled = false;
		}
		else
		{
			document.getElementById('nappi').disabled = true;
		}
	}, 100);*/
</script>


<?php

	$query = $this->db->query("SELECT etunimi FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$etunimi = "$row->etunimi";

	}

	echo '<center>';
		//Jos nimen viimeinen kirjain on 's' printtaa ksen profiili
		if (substr($etunimi, -1) == 's')
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>' profile</b></h1><br><?php
		}
		//Jos nimen viimeinen kirjain on mikään muu kuin 's' printtaa 's profiili
		else
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>'s profile</b></h1><br><?php
		}

		echo '</center><br><br><br>';
		echo '</div>';
?>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php



	echo '<a role="button" id="osaamispankki"  href="'.base_url().'sivu/welcome_message_english'.'">Learning bank</a>';
	echo '<a href="haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Search</span></a>';
	echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'sivu/logout_english'.' ">Logout</button></a>';
	//echo "<h3 style='font-family:Impact, Charcoal, sans-serif;font-size:1.3em;margin-left:200px;margin-top:-51px;'>Welcome,</h3>";
	echo "<b style='font-size:15px;'>";
	//echo "<h4 style='font-size:1.1em;margin-left:290px;margin-top:-28px;'>".$etunimi."</h4>";
	echo "</b>";

	echo '</nav>';

	echo '<div class="col-md-6 col-md-offset-3">';
	//Perustiedot

	$query = $this->db->query("SELECT privSposti, etunimi, sNimi, osoite, postinro, puhelinnro, lyhytKuvaus, aktiivisuus  FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$hakusanat ='';
		$query2 = $this->db->query("SELECT hakusana FROM hakusanat WHERE sposti ='".$this->session->userdata('sposti')."'");
		foreach ($query2->result_array() as $row)
		{
		 $hakusanat .= $row['hakusana'].' ';
		}

	foreach ($query->result() as $row)
	{
		$privSposti = "$row->privSposti";
		$eNimi = "$row->etunimi";
		$sNimi = "$row->sNimi";
		$osoite = "$row->osoite";
		$postinro = "$row->postinro";
		$puhelinnro = "$row->puhelinnro";
		$lyhytKuvaus = "$row->lyhytKuvaus";
		$aktiivisuus = "$row->aktiivisuus";
	}

	echo '<div class="row">';
	echo '<div class="col-md-8">';

	$query = $this->db->query("SELECT etunimi, pkuva, sNimi, puhelinnro, pitkaKuvaus, spuoli, lyhytKuvaus, sposti FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result_array() as $row)
	{
		echo '<img src="'.base_url().'images/profiili/'.$row['pkuva'].'" class="img-responsive img-thumbnail" style="width: 200px;">';
	}

	echo form_open_multipart('Upload_controller/do_upload');
		//echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>";
		echo '<br><br><br><br>';
		//echo "<input type='submit' id='nappi' name='submit'  value='Lataa' class='btn btn-success' disabled/> ";
		echo "</form><br>";
		echo form_close();

		echo '<div class="col-md-12 col-xs-4 col-xs-pull-1" style="position:relative;margin-left:350px;margin-top:-290px;">';
			echo '<a href="'.base_url().'sivu/members_english" class="btn btn-danger"><span style="line-height:14px;display:inline;"></span>Cancel editing</a><br><br>';

			$privSposti = array('value' => ''.$privSposti.'', 'placeholder' => 'Email', 	'name' => 'privSposti', 'id' => 'sposti',     'class' => "login-form" );
 			$eNimi = array(		'value' => ''.$eNimi.'', 	  'placeholder' => 'First name',    	'name' => 'etunimi', 	'id' => 'etunimi',	  'class' => "login-form" );
 			$sNimi = array(		'value' => ''.$sNimi.'', 	  'placeholder' => 'Surname',   	'name' => 'sNimi', 		'id' => 'sNimi',	  'class' => "login-form" );
 			$osoite = array(	'value' => ''.$osoite.'', 	  'placeholder' => 'Address',     	'name' => 'osoite', 	'id' => 'osoite', 	  'class' => "login-form" );
 			$postinro = array(	'value' => ''.$postinro.'',   'placeholder' => 'Postcode',   'name' => 'postinro',  	'id' => 'postinro',   'class' => "login-form" );
 			$puhelinnro = array('value' => ''.$puhelinnro.'', 'placeholder' => 'Telephone number', 'name' => 'puhelinnro', 'id' => 'puhelinnro', 'class' => "login-form" );
 			$lyhytKuvaus = array('value' => ''.$lyhytKuvaus.'', 'placeholder' => 'Short description', 'name' => 'lyhytKuvaus', 'id' => 'lyhytkuvaus', 'class' => "login-form",  'cols' 		 => '27',
              	     'rows' 		 => '5' );
 			$hakusanat = array('value' => ''.$hakusanat.'', 'placeholder' => 'Hakusanat', 'name' => 'hakusanat', 'id' => 'hakusanat', 'class' => "login-form",  'cols' 		 => '21',
              	     'rows' 		 => '5' );


			echo form_open('sivu/members_edit_english');
			echo validation_errors();
			if($aktiivisuus == '1'){
 			echo '<input style="margin-left:200px;" type="checkbox" value="1" id="aktiivisuus" name="aktiivisuus" checked /><p  style="display:inline;margin-left:-290px;"><b>Profile is allowed to appear in searches</b></p><br>';
 		} else {
 			echo '<input style="margin-left:200px;" type="checkbox" value="1" id="aktiivisuus" name="aktiivisuus" /><p  style="display:inline;margin-left:-290px;"><b>Profile is allowed to appear in searches</b></p><br>';
 		}
		    echo '<b style="font-size:1.1em;">                       Email: </b>';
		    echo '<p style="display:inline;">'.form_input($privSposti).'</p>';
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">              First name: </b>';
		    echo '<p style="display:inline;">'.form_input($eNimi).'</p>';
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">                 Surname: </b>';
		    echo '<p style="display:inline;">'.form_input($sNimi).'</p>';
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">                  Address: </b>';
		    echo '<p style="display:inline;">'.form_input($osoite).'</p>';
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">                Postcode: </b>';
		    echo '<p style="display:inline;">'.form_input($postinro).'</p>';
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">Telephone number: </b>';
	    	echo '<p style="display:inline;">'.form_input($puhelinnro).'</p>';
	    	echo '</br>';
	    	echo '<b style="font-size:1.1em;position:absolute;">Short description: </b>';
	    	echo '<p style="display:inline;margin-left:143px;">'.form_textarea($lyhytKuvaus).'</p>';
	    	echo '</br>';
	    	echo '<b style="font-size:1.1em;position:absolute;">        Keywords: </b>';
	    	echo '<p style="display:inline;margin-left:143px;">'.form_textarea($hakusanat).'</p>';
	    	echo '</br>';
	    	echo '</br>';

	    	echo form_submit('submit', 'Save changes', 'class="btn btn-success col-md-offset-3"');
	    	echo form_close();


	echo '</div>';
	echo '</div>';
	echo '</div>';
    	echo '</div>';


	echo '</div>';
	echo '</div>';
	echo '</div>';

	//Harrastus
	echo '<div class="row">';
	echo '<div class="col-md-8 col-xs-8 col-md-offset-4">';
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Hobbies</p>';
	//echo '<a href="'.base_url().'sivu/harrastukset_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$harrastukset = "";

	$harrastukset .= '<table class="table" border="1">';
	$harrastukset .= '<thead><tr><th>Hobby</th><th>Description</th></tr></thead>';


	$query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	   = "$row->id";
		$harrastus = "$row->harrastus";
		$vapaasana   = "$row->vapaasana";


		if($tyopaikka != NULL)
		{
			$bFound = true;

			$harrastukset .= '<tr>';
			$harrastukset .= '<td>'.$harrastus.'</td>';
			$harrastukset .= '<td style="max-width:500px;word-wrap: break-word;">'.$vapaasana.'</td>';
			//$harrastukset .= '<td><a href="'.base_url().'sivu/edit_harrastukset/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span>';//Muokkaus nappi
			//$harrastukset .= '<button type="button" style="margin-left:35px;margin-top:-6px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$harrastukset .= '</tr>';
		}
	}

	if($bFound)
		echo $harrastukset;
	else
		echo "<p style='color:red;font-weight:bold;'>No hobbies added yet</p>";


	echo '</table>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	//Tyohistoria
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Work history</p>';
	//echo '<a href="'.base_url().'sivu/tyohistoria_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$tyohistoria = "";

	$tyohistoria .= '<table class="table" border="1">';
	$tyohistoria .= '<thead><tr><th>Workplace</th><th>Task</th><th>Started</th><th>Ended</th><th>Description</th></tr></thead>';


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
			//$tyohistoria .= '<td><a href="'.base_url().'sivu/edit_tyohistoria/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span>';//Muokkaus nappi
			//$tyohistoria .= '<button type="button" style="margin-left:25px;margin-top:-6px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
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
	echo '</div>';



	//Koulutus
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="koulutukset">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Education</p>';
	//echo '<a href="'.base_url().'sivu/koulutukset_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$koulutukset = "";

	$koulutukset .= '<table class="table" border="1">';
	$koulutukset .= '<thead><tr><th>Education name</th><th>Level of education</th><th>School</th><th>Started</th><th>Ended</th></tr></thead>';

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
			//$koulutukset .= '<td><a href="'.base_url().'sivu/edit_koulutukset/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span>';//Muokkaus nappi
			//$koulutukset .= '<button type="button" style="margin-left:30px;margin-top:-6px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKoulutukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
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
	echo '</div>';

	//Kortit
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="kortit">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Cards</p>';
	//echo '<a href="'.base_url().'sivu/kortit_lisaus_english" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$kortit = "";

	$kortit .= '<table class="table" border="1">';
	$kortit .= '<thead><tr><th>Card</th><th>Expiration date</th><th>Comment</th></tr></thead>';

	$query = $this->db->query("SELECT id, knimi, sposti, kommentti, voimassa FROM opiskelijakortit WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	= "$row->id";
		$knimi 	 = "$row->knimi";
		$voimassa = "$row->voimassa";
		$kommentti = "$row->kommentti";

		if($kortit != NULL)
		{
			$bFound = true;

			$kortit .= '<tr>';
			$kortit .= '<td>'.$knimi.'</td>';
			$kortit .= '<td>'.$voimassa.'</td>';
			$kortit .= '<td>'.$kommentti.'</td>';
			//$kortit .= '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKortit"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$kortit .= '</tr>';
		}
	}

	$kortit .= '</table>';

	if($bFound)
		echo $kortit;
	else
		echo "<p style='color:red;font-weight:bold;'>No cards added yet</p>";

	echo '<br><br><br><br></div>';
	echo '</div>';
	?>

</div>
</body>
</html>
