<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kirjautuminen</title>
<div class="row">
<div class="col-md-6 col-md-offset-5">
	<h1>Kirjautuminen</h1><br>
	</head>
<style>
#nappi {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #4CAF50;
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
echo '<div class="login-page">';
echo '<div class="form">';
$inputfirstname = array('placeholder' => 'Sähköposti', 'name' => 'sposti',   'id' => 'sposti',   'class' => "login-form" );
 $inputpassword = array('placeholder' => 'Salasana',   'name' => 'salasana', 'id' => 'salasana', 'class' => "login-form" );
echo '</div>';
echo '</div>';

	echo form_open('sivu/login_validation');
	echo validation_errors();
	echo form_input($inputfirstname);
	echo "<br>";
	echo "<br>";
	echo form_password($inputpassword);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo form_submit('login_submit', 'Kirjaudu sisään', 'id="nappi"');
	echo form_close();
?>

	</div>
</div>
