<div style="text-align: center;">
<h2>Syötä perustietoja</h2>
<?php
$sposti = array('placeholder' => 'Henkilökohtainen sähköpostiosoite', 'size' => '30','type' => 'text' , 'name' => 'sposti', 'id' => 'sposti' );
$etunimi = array('placeholder' => 'Etunimi', 'size' => '30', 'type' => 'text' , 'name' => 'etunimi', 'id' => 'etunimi' );
$sukunimi = array('placeholder' => 'Sukunimi', 'size' => '30','type' => 'text' , 'name' => 'sukunimi', 'id' => 'sukunimi' );
$katuosoite = array('placeholder' => 'Katuosoite', 'size' => '30','type' => 'text' , 'name' => 'katuosoite', 'id' => 'katuosoite' );
$kaupunki = array('placeholder' => 'Kaupunki', 'size' => '30','type' => 'text' , 'name' => 'kaupunki', 'id' => 'kaupunki' );
$postinumero = array('placeholder' => 'Postinumero', 'size' => '30','type' => 'text' , 'name' => 'postinumero', 'id' => 'postinumero' );

		echo form_open('site2/first_login');

		echo form_input($sposti)."<br>";
		echo form_input($etunimi)."<br>";
		echo form_input($sukunimi)."<br>";
		echo form_input($katuosoite)."<br>";
		echo form_input($kaupunki)."<br>";		
		echo form_input($postinumero)."<br><br>";



		echo form_submit('submit', 'Lisää tiedot', 'class="btn btn-success"');?>
</div>