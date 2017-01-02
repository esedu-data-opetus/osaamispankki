<?php
$sposti = array('placeholder' => 'Sähköpostiosoite', 'type' => 'text' , 'name' => 'sposti', 'id' => 'sposti' );
	echo '<h2>Lähetä unohtuneen salasanan palautusohjeet</h2>';
	echo form_open('sivu/forgotpassword_validation');
	echo validation_errors();
	echo form_input($sposti);
	echo form_submit('forgotpassword_validation', 'Lähetä', "class='btn btn-success'");
	echo form_close();