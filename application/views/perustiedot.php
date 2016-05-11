<div style="text-align: center;">
<h2>Päivitä perustietoja tai jatka sivulle</h2>
<?php
$query = $this->db->query("SELECT privSposti, etunimi, sNimi, osoite, postinro, puhelinnro  FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

foreach ($query->result() as $row){
	$privSposti = "$row->privSposti";
	$eNimi = "$row->etunimi";
	$sNimi = "$row->sNimi";
	$osoite = "$row->osoite";
	$postinro = "$row->postinro";
	$puhelinnro = "$row->puhelinnro";}
if($privSposti == '' || $eNimi == '' || $sNimi == '' || $osoite == '' || $postinro == '' || $puhelinnro == ''){
	

	$sposti = array('value' => ''.$privSposti.'', 'placeholder' => 'Henkilökohtainen sähköpostiosoite', 'size' => '30','type' => 'text' , 'name' => 'privSposti', 'id' => 'privSposti' );
	$etunimi = array('value' => ''.$eNimi.'','placeholder' => 'Etunimi', 'size' => '30', 'type' => 'text' , 'name' => 'etunimi', 'id' => 'etunimi' );
	$sukunimi = array('value' => ''.$sNimi.'','placeholder' => 'Sukunimi', 'size' => '30','type' => 'text' , 'name' => 'sNimi', 'id' => 'sNimi' );
	$katuosoite = array('value' => ''.$osoite.'','placeholder' => 'Katuosoite', 'size' => '30','type' => 'text' , 'name' => 'osoite', 'id' => 'osoite' );
	$postinumero = array('value' => ''.$postinro.'','placeholder' => 'Postinumero', 'size' => '30','type' => 'text' , 'name' => 'postinro', 'id' => 'postinro' );
	$puhelinnro = array('value' => ''.$puhelinnro.'','placeholder' => 'Puhelinnumero', 'size' => '30','type' => 'text' , 'name' => 'puhelinnro', 'id' => 'puhelinnro' );

		echo form_open('Sivu2/paivita_perustiedot');
		echo validation_errors();

		echo '<h5>Henkilökohtainen sähköpostiosoite</h5>';
		echo form_input($sposti)."<br>";
		echo '<h5>Etunimi</h5>';
		echo form_input($etunimi)."<br>";
		echo '<h5>Sukunimi</h5>';
		echo form_input($sukunimi)."<br>";
		echo '<h5>Katuosoite</h5>';
		echo form_input($katuosoite)."<br>";
		echo '<h5>Postinumero</h5>';
		echo form_input($postinumero)."<br>";
		echo '<h5>Puhelinnumero</h5>';
		echo form_input($puhelinnro)."<br>";


		echo form_submit('submit', 'Jatka', 'class="btn btn-success"');

	}
else
	{
	redirect('sivu/index');
	}
?>


</div>
