<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rekisteröityminen</title>
<div class="row">
<div class="col-md-6 col-md-offset-5">
	<h1>Rekisteröityminen</h1><br>
<?php

$inputname = array('placeholder' => 'Etunimi',
				   'name' => 'etunimi',
				   'id'   => 'etunimi' );

$inputemail = array('placeholder' => 'Sähköposti',
						'name' => 'sposti',
						'id' => 'sposti' ); 

$inputpassword = array('placeholder' => 'Salasana',
					   'type' => 'salasana',
					   'name' => 'salasana',
					   'id' => 'salasana' );

$inputpasswordconfirm = array('placeholder' => 'Salasana uudestaan',
							  'type' => 'salasanaconfirm',
							  'name' => 'salasanaconfirm',
							  'id' => 'salasanaconfirm' );

	echo form_open('sivu/register_validation');
	echo validation_errors();
	echo form_input($inputname);
	echo "<br>";
	echo "<br>";
	echo form_input($inputemail);
	echo "<br>";
	echo "<br>";
	echo form_password($inputpassword);
	echo "<br>";
	echo "<br>";
	echo form_password($inputpasswordconfirm);
	echo "<br>";
	echo "<br>";
	echo form_submit('submit', 'Rekisteröidy', "class='btn btn-info'");
?>
</div>
</div>