<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Harrastuksen lisäys</title>
	<h1 style="text-align:center;font-weight:bold;">Harrastuksen lisäys</h1><br>
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
#vapaasana {
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




	$inputharrastukset = array('value'   =>'',
				  	   'placeholder' => 'Harrastukset',
				  	   'name'		 => 'harrastus',
				 	   'id'  		 => 'harrastukset'
				    );

	$inputvapaasana = array('value'   =>'',
					'placeholder'    => 'Vapaasana',
				    'name' 		     => 'vapaasana',
				    'id'   		     => 'vapaasana',
				    'cols'           => '22',
				    'rows'           => '6'
				    );


	echo form_open('sivu/harrastukset_lisaus');
	echo validation_errors();
	echo '<h5 style="font-weight:bold;">Harrastus</h5>';
	echo form_input($inputharrastukset);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Vapaa sana</h5>';
	echo form_textarea($inputvapaasana);
	echo "<br>";
	echo "<br>";
	echo form_submit('submit', 'Lisää harrastus', 'id="nappi"');
	echo '</div>';

?>
</body>
</html>
