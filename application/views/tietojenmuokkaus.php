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
$inputtyopaikka= array('placeholder' => 'Työpaikka',
				   'name' => 'tyopaikka',
				   'id'   => 'tyopaikka'
				    );
$inputtehtava = array('placeholder' => 'Tehtävä',
				   'name' => 'tehtava',
				   'id'   => 'tehtava'
				    );
$inputalkoi = array('placeholder' => 'Alkoi',
				   'name' => 'alkoi',
				   'id'   => 'alkoi'
				    );
$inputloppui = array('placeholder' => 'Loppui',
				   'name' => 'loppui',
				   'id'   => 'loppui'
				    );
$inputkuvaus = array('placeholder' => 'Kuvaus',
				   'name' => 'kuvaus',
				   'id'   => 'kuvaus'
				    );


	echo form_open('sivu/tyokokemus');
	echo validation_errors();
	echo form_input($inputtyopaikka);
	echo "<br>";
	echo "<br>";
	echo form_input($inputtehtava);
	echo "<br>";
	echo "<br>";
	echo form_input($inputalkoi);
	echo "<br>";
	echo "<br>";
	echo form_input($inputloppui);
	echo "<br>";
	echo "<br>";
	echo form_input($inputkuvaus);
	echo "<br>";
	echo "<br>";
	$attributes = array('id' => 'tyokokemusnappi', 'class' => 'btn btn-info');
	echo form_submit('submit', 'Lisää työkokemus', $attributes);
	echo '</div>';
?>
</body>
</html>