<?php

$currentpwd = array('placeholder' => 'Nykyinen salasana', 'type' => 'password' , 'name' => 'currentpwd', 'id' => 'currentpwd' );
$newpwd = array('placeholder' => 'Uusi salasana', 'type' => 'password' , 'name' => 'newpwd', 'id' => 'newpwd' );
$confirmnewpdw = array('placeholder' => 'Uusi salasana uudestaan', 'type' => 'password' , 'name' => 'confirmnewpdw', 'id' => 'confirmnewpdw' );



		echo form_open('sivu/changepassword_validation');
		echo validation_errors();
		echo form_input($currentpwd);
		echo form_input($newpwd);
		echo form_input($confirmnewpdw);
		echo form_submit('submit', 'Vaihda salasana');

?>