<?php





$keyfield = array('placeholder' => 'Piilotettu key', 'value' => $key, 'type' => 'hidden' , 'name' => 'keyfield', 'id' => 'keyfield' ); 
$newpwd = array('placeholder' => 'Uusi salasana', 'type' => 'password' , 'name' => 'newpwd', 'id' => 'newpwd' );
$confirmnewpdw = array('placeholder' => 'Uusi salasana uudestaan', 'type' => 'password' , 'name' => 'confirmnewpdw', 'id' => 'confirmnewpdw' );


		echo form_open('sivu/changeforgottenpassword');
		echo validation_errors();
		echo form_input($keyfield);
		echo form_input($newpwd);
		echo form_input($confirmnewpdw);
		echo form_submit('submit', 'Vaihda salasana');

?>