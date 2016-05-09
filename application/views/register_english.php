<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
<div class="row">
<div class="col-md-6 col-md-offset-5">
	<h1>Register</h1><br>
	</head>
<style>
#nappi {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #31c398;
  width: 150px;
  height:50px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 15px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
</style>

<?php

$inputname = array('placeholder' => 'First name',
				   'name' => 'etunimi',
				   'id'   => 'etunimi' );

$inputemail = array('placeholder' => 'Email',
						'name' => 'sposti',
						'id' => 'sposti' ); 

$inputpassword = array('placeholder' => 'Password',
					   'type' => 'salasana',
					   'name' => 'salasana',
					   'id' => 'salasana' );

$inputpasswordconfirm = array('placeholder' => 'Confirm password',
							  'type' => 'salasanaconfirm',
							  'name' => 'salasanaconfirm',
							  'id' => 'salasanaconfirm' );

	echo form_open('sivu/register_validation_english');
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
	echo form_submit('submit', 'Register', "id='nappi'");
?>
</div>
</div>
