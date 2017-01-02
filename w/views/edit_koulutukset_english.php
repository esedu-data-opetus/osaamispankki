<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Education</title>
	<h1 style="text-align:center;font-weight:bold;">Education</h1><br>
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
<script type="text/javascript"> 

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

</script>
<?php


 echo '<div id="both">';
 
$inputkoulutusnimi = array('value'   =>''.$koulutusnimi.'',
				  	   'placeholder' => 'Education',
				  	   'name'		 => 'koulutusnimi',
				 	   'id'  		 => 'koulutusnimi'
				    );
 
$inputkoulutusaste = array('value'   =>''.$koulutusaste.'',
					'placeholder'    => 'Level of education',
				    'name' 		     => 'koulutusaste',
				    'id'   		     => 'koulutusaste'
				    );
 
 $inputoppilaitos = array('value'    =>''.$oppilaitos.'',
					'placeholder'    => 'School',
				    'name' 		     => 'oppilaitos',
				    'id'   		     => 'oppilaitos'
				    );
 
      $inputalkoi = array('value'    =>''.$alkoi.'',
					 'placeholder'   => 'Started',
				     'name' 	     => 'alkoi',
				     'id'  		     => 'alkoi'
				    );

	 $inputloppui = array('value'    =>''.$loppui.'',
					 'placeholder'   => 'Ended',
				     'name' 	     => 'loppui',
				     'id'  		     => 'loppui'
	
				    );


	echo form_open('sivu/edit_koulutukset_english/'.$id.'');
	echo validation_errors();
	echo '<h5 style="font-weight:bold;">Education</h5>';
	echo form_input($inputkoulutusnimi);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Level of education</h5>';
	echo form_input($inputkoulutusaste);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">School</h5>';
	echo form_input($inputoppilaitos);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Started</h5>';
	echo form_input($inputalkoi);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Graduated</h5>';
	echo form_input($inputloppui);
	echo "<br>";
	echo "<br>";
	echo form_submit('submit', 'Update', 'id="nappi"');
	echo '</div>';

?>
</body>
</html>