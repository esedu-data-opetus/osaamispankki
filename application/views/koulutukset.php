<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Koulutus</title>
	<h1 style="text-align:center;font-weight:bold;">Koulutus</h1><br>
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
<?php

$query = $this->db->query("SELECT koulutusnimi FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

foreach ($query->result() as $row){
	$koulutusnimi = "$row->koulutusnimi";
}



 echo '<div id="both">';
 
$inputkoulutusnimi= array('value' =>''.$koulutusnimi.'',
				  	   'placeholder' => 'Koulutus',
				  	   'name' => 'koulutusnimi',
				 	   'id'   => 'koulutusnimi'
				    );
 
/*$inputtehtava = array('value' =>''.$tehtava.'',
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
				    );*/


	echo form_open('sivu/koulutukset');
	echo validation_errors();
	echo '<h5 style="font-weight:bold;">Koulutus</h5>';
	echo form_input($inputkoulutusnimi);
	echo "<br>";
	echo "<br>";
	/*echo '<h5 style="font-weight:bold;">Tehtävä</h5>';
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
	echo "<br>";*/
	echo form_submit('submit', 'Lisää koulutus', 'class="btn btn-success"');
	echo '</div>';

?>
</body>
</html>