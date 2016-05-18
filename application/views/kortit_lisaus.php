<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Korttien lisäys</title>
	<div class="container">
	<h1 class="col-md-4 col-md-push-4" style="font-weight:bold;">Korttien lisäys</h1><br>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>      
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">   
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    
     <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script>
</head>
<body>
<style>
#kommentti{
	margin-top:65px;
	margin-left:20px;
	resize: none;
}
#alkoi{
	width:170px;
	margin-left:45px;
	position:relative;

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
  margin-top:180px;
  margin-left:20px;


}
p {
margin-left:-200px;
margin-top:1px;
display:inline;
z-index: 1;
font-weight: bold;
}
#all {
	margin-left:200px;
}
</style>
<script type="text/javascript"> 

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

	 function validateDropdown()
		{
			var e = document.getElementById("select");
			var strUser = e.options[e.selectedIndex].value;

			console.log(strUser);

				if(strUser == '0')
			{
				document.getElementById('nappi').disabled = true;
			} else {
				document.getElementById('nappi').disabled = false;
			}
		}

</script>
<?php




$inputvoimassaoloaika = array('value'   =>'',
					'placeholder'    => 'Kortin päättymispäivä',
				    'name' 		     => 'voimassa',
				    'class' 		 => 'col-md-4 col-md-push-4',
				    'id'   		     => 'alkoi'
				    );

$inputkommentti = array('value'   =>'',
					'placeholder'    => 'Kommentti',
				    'name' 		     => 'kommentti',
				    'class' 		 => 'col-md-2 col-md-pull-2',
				    'id'   		     => 'kommentti',
				    'rows'			 => '5',
				    'cols' 			 => '10'
				    );
	 

	echo form_open('sivu/kortit_lisaus');
	echo validation_errors();?>
	
	 <select name="knimi" id="select" onchange="validateDropdown();" class="form-control col-md-4 col-md-push-0" style="width:200px;margin-top:60px;margin-left:40px;">
            <?php 
            $query = $this->db->query('SELECT id, knimi FROM kortit');
            echo '<option disabled selected value="0">Valitse kortti</option>';
            foreach($query->result() as $row)
            {
            	$id = '$row->id';
				$knimi = '$row->knimi';
				 
           		 echo '<option name="knimi" value="'.$row->knimi.'">'.$row->knimi.'</option>';
            }
          	
          
            ?>
            </select>
   
    <?php
	echo "<br><br>";
	echo '<h5 class="col-md-4 col-md-pull-2" style="font-weight:bold;margin-top:70px;margin-left:-20px;">Voimassaoloaika</h5>';
	echo form_input($inputvoimassaoloaika);
	echo "<br>";
	echo "<br>";
	echo '<h5 class="col-md-4 col-md-push-2" style="font-weight:bold;margin-top:40px;margin-left:5px;">Kommentti</h5>';
	echo form_textarea($inputkommentti);
	
	

	$data = array(
		'id'          => 'nappi',
		'disabled'	  => 'disabled',
		'class'       => 'btn btn-success col-md-4 col-md-pull-4'
		);
	echo form_submit('submit', 'Lisää kortti', $data);

?>
 </div>
</body>
</html>
