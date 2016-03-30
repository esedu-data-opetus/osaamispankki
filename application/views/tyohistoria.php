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

$query = $this->db->query("SELECT tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

foreach ($query->result() as $row){
	$tyopaikka = "$row->tyopaikka";
	$tehtava = "$row->tehtava";
	$alkoi = "$row->alkoi";
	$loppui = "$row->loppui";
	$kuvaus = "$row->kuvaus";

}



 echo '<div id="both">';
 
$inputtyopaikka= array('value' =>''.$tyopaikka.'',
				  	   'placeholder' => 'Työpaikka',
				  	   'name' => 'tyopaikka',
				 	   'id'   => 'tyopaikka'
				    );
 
$inputtehtava = array('value' =>''.$tehtava.'',
					'placeholder' => 'Tehtävä',
				    'name' => 'tehtava',
				    'id'   => 'tehtava'
				    );
 
$inputalkoi = array('value' =>''.$alkoi.'',
					'placeholder' => 'Alkoi',
				    'name' => 'alkoi',
				    'id'   => 'alkoi'
				    );
 
$inputloppui = array('value' =>''.$loppui.'',
					 'placeholder' => 'Loppui',
				     'name' => 'loppui',
				     'id'   => 'loppui'
				    );

$inputkuvaus = array('value' =>''.$kuvaus.'',
					 'placeholder' => 'Kuvaus',
				     'name' => 'kuvaus',
				     'id'   => 'kuvaus',
				     'cols' => '22',
              	     'rows' => '5'
				    );


	echo form_open('sivu/tyokokemus');
	echo validation_errors();
	echo '<h5 style="font-weight:bold;">Työpaikka</h5>';
	echo form_input($inputtyopaikka);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Tehtävä</h5>';
	echo form_input($inputtehtava);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Alkoi</h5>';
	echo form_input($inputalkoi);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Loppui</h5>';
	echo form_input($inputloppui);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Kuvaus</h5>';
	echo form_textarea($inputkuvaus);
	echo "<br>";
	echo form_submit('submit', 'Päivitä työkokemus', 'class="btn btn-success"');
	echo '</div>';

?>
</body>
</html>