<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tietojenmuokkaus</title>
	<h1 style="text-align:center;">Tietojenmuokkaus</h1><br>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
</head>
<body>
<style>
#both {
	 text-align:center;
	
	}
</style>
<script>

</script>

<?php
 echo '<div id="both">';
$inputname = array('placeholder' => 'Työkokemus',
				   'name' => 'tyokokemus',
				   'id'   => 'tyokokemus'
				    );



	echo form_open('sivu/tyokokemus');
	echo validation_errors();
	echo form_input($inputname);
	echo "<br>";
	echo "<br>";
	$attributes = array('id' => 'tyokokemusnappi', 'class' => 'btn btn-info');
	echo form_submit('submit', 'Lisää työkokemus', $attributes);
	echo '</div>';
?>
</body>
</html>