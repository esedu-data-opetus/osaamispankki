<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Work history</title>
	<h1 style="text-align:center;font-weight:bold;">Work history</h1><br>
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
 
$inputtyopaikka = array('value' 	 =>''.$tyopaikka.'',
				  	   'placeholder' => 'Workplace',
				  	   'name' 	 	 => 'tyopaikka',
				 	   'id'  	 	 => 'tyopaikka'
				    );
 
$inputtehtava =   array('value' 	 =>''.$tehtava.'',
					'placeholder' 	 => 'Task',
				    'name' 		 	 => 'tehtava',
				    'id'  		  	 => 'tehtava'
				    );
 
$inputalkoi = 	  array('value' 	 =>''.$alkoi.'',
					'placeholder' 	 => 'Started',
				    'name'		  	 => 'alkoi',
				    'id'   			 => 'alkoi'
				    );
 
$inputloppui = 	  array('value'      =>''.$loppui.'',
					 'placeholder'   => 'Ended',
				     'name'		     => 'loppui',
				     'id'  		     => 'loppui'
				    );

$inputkuvaus =    array('value'      =>''.$kuvaus.'',
					 'placeholder'   => 'Description',
				     'name' 	     => 'kuvaus',
				     'id' 	 	     => 'kuvaus',
				     'cols' 	     => '22',
              	     'rows'		     => '5'
				    );


	echo form_open('sivu/edit_tyohistoria_english/'.$id.'');
	echo validation_errors();
	echo '<h5 style="font-weight:bold;">Workplace</h5>';
	echo form_input($inputtyopaikka);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Task</h5>';
	echo form_input($inputtehtava);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Started</h5>';
	echo form_input($inputalkoi);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Ended</h5>';
	echo form_input($inputloppui);
	echo "<br>";
	echo '<h5 style="font-weight:bold;">Description</h5>';
	echo form_textarea($inputkuvaus);
	echo "<br>";
	echo "<br>";
	echo form_submit('submit', 'Update', 'id="nappi"');
	echo '</div>';

?>
</body>
</html>