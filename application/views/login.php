<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kirjautuminen</title>
<div id="all" style="padding:10px;">
	<h1>Kirjautuminen</h1><br>
<?php
$inputfirstname = array('placeholder' => 'Sähköposti', 'name' => 'sposti', 'id' => 'sposti' );
$inputpassword = array('placeholder' => 'Salasana', 'type' => 'salasana' , 'name' => 'salasana', 'id' => 'salasana' );

	echo form_open('sivu/login_validation');
	echo validation_errors();
	echo form_input($inputfirstname);
	echo form_password($inputpassword);
	echo form_submit('login_submit', 'Kirjaudu sisään', "class='btn btn-success'");
	echo form_close();
?>
	<a style="margin-left:500px;margin-top:-47px;" class="btn btn-primary" href='<?php echo base_url()."index.php/sivu/register"; ?>'>Luo tili </a>
</div>