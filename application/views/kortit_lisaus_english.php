<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add card</title>
	<div class="container">
	<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<h1 class="" style="font-weight:bold;">Add card</h1><br>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>      
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">   
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    
     <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script>
</head>
<body>
<style>
#kommentti{	
	resize: none;
}
#alkoi{
	width:180px;
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
  margin-top:10%;
  margin-right:25%;



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
					'placeholder'    => "Card's expiration date",
				    'name' 		     => 'voimassa',
				    'class' 		 => '',
				    'id'   		     => 'alkoi'
				    );

$inputkommentti = array('value'   =>'',
					'placeholder'    => 'Comment',
				    'name' 		     => 'kommentti',
				    'class' 		 => 'col-md-6 col-xs-6',
				    'id'   		     => 'kommentti',
				    'rows'			 => '5',
				    'cols' 			 => '10'
				    );
	 

	echo form_open('sivu/kortit_lisaus_english');
	echo validation_errors();?>
	
	 <select name="knimi" id="select" onchange="validateDropdown();" class="form-control " style="width:200px;">
            <?php 
            $query = $this->db->query('SELECT id, knimi FROM kortit_english');
            echo '<option disabled selected value="0">Select a card</option>';
            foreach($query->result() as $row)
            {
            	$id = '$row->id';
				$knimi = '$row->knimi';
				 
           		 echo '<option name="knimi" value="'.$row->knimi.'">'.$row->knimi.'</option>';
            }
          	
          
            ?>
            </select>
   
    <?php
	echo '<h5 class="" style="font-weight:bold;">Expiration date</h5>';
	echo form_input($inputvoimassaoloaika);
	echo "<br>";
	echo "<br>";
	echo '<h5 class="" style="font-weight:bold;">Comment</h5>';
	echo form_textarea($inputkommentti);
	
	

	$data = array(
		'id'          => 'nappi',
		'disabled'	  => 'disabled',
		'class'       => 'btn btn-success col-xs-4'
		);
	echo form_submit('submit', 'Add card', $data);

?>
 </div>
 </div>
 </div>
</body>
</html>
