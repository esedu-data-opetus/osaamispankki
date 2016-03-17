<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tyohistoria</title>
	<h1 style="text-align:center;">Tyohistoria</h1><br>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>      
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">   
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    
     <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script>
</head>
<body>
<style>
#both 
{
 text-align:center;
}
#kuvaus {
	resize: none;
}
</style>
<script type="text/javascript">

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

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
				   'id'   => 'kuvaus',
				   'cols' => '22',
              	   'rows' => '5'
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
	echo form_textarea($inputkuvaus);
	echo "<br>";
	echo "<br>";
	$attributes = array('id' => 'tyokokemusnappi', 'class' => 'btn btn-info');
	echo form_submit('submit', 'Lisää työkokemus', $attributes);
	echo '</div>';
?>
</body>
</html>