<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rekisteröityminen</title>
<div id="all" style="padding:10px;">
	<h1>Rekisteröityminen</h1><br>
<?php

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
	echo form_input($inputemail);
	echo form_password($inputpassword);
	echo form_password($inputpasswordconfirm);
	echo form_submit('submit', 'Rekisteröidy', "class='btn btn-info'");
?>
</div>