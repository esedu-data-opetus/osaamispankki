	<?php
	include 'db_connect.php';
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


		<meta name="description" content="jquery autocomplete search-jquery autocomplete using php mysql ajax" />
		<meta name="author" content="muni" />
		<meta name="keywords" content="jquery autocomplete search, jquery autocomplete using php mysql ajax, jquery autocomplete ajax, jquery autocomplete json" />
		

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		
		
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		
			
		
		
	
		<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<body>	
	    <div class="loader"></div>
		<script>
			$(window).load(function() {
				$(".loader").fadeOut("slow");
			});
		</script>
	    
	    <form method="post">
	    <div id="wrap">	    	
	        <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">
	        		<p class="text-center">Koulutus </p>
	        		<input id="country_name" class="form-control txt-auto" name="ala"/>
	        	</div>
	        	
	        </div>	            	
	        <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">
	        		<p class="text-center">paikkakunta </p>
	        		<input id="country_name2" class="form-control txt-auto" name="paikkakunta"/>
	        	</div>
	        	
	        </div>	
                <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">
	        		<p class="text-center">harrastus </p>
	        		<input id="country_name3" class="form-control txt-auto" name="harrastus"/>
	        	</div>
	        	
	        </div>	
			
                <div class="row"> <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">	        		
                          Vain 18 vuotiaat:
                            <input type="checkbox" value="1" name="tyyppi">
	        </div>
                </div>
                <div class="row"> <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">	        		
                          b-ajokortti:
                            <input type="checkbox" value="B-ajokortti" name="B-ajokortti">
	        </div>	
	        </div>
               <div class="row"> <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">	        		
                          C-ajokortti:
                            <input type="checkbox" value="C-ajokortti" name="C-ajokortti">
	        </div>	
	        </div>
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">	        		
	        		<input  type="submit" value="lähetä"/>
	        	</div>
	        	
	        </div>
               
	        
				
				
			
				
			
			
	      
	        
	            
		 </div><!-- table ends here --->
	        </form>
<?php	        
if(isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Jakson luonti onnistui!';
} else {
	if(empty($_POST) === false && empty ($errors) === true) {
	
	 $ala = $_POST['ala'];
	 $paikkakunta = $_POST['paikkakunta'];
         $ika = $_POST['tyyppi'];
         $harrastus = $_POST['harrastus'];
         $kortit = array(
         'C-ajokortti' => $_POST['C-ajokortti'],
         'B-ajokortti' => $_POST['B-ajokortti']
                 );
         if(empty($harrastus) === true){
         
         
         if($ika == 1){
	
	$data = mysqli_query($dbcon , " SELECT * FROM henkilotiedot WHERE koulutus = '$ala' AND paikkakunta = '$paikkakunta' AND sAika > 18");
        
        }else{
         $data = mysqli_query($dbcon , " SELECT * FROM henkilotiedot WHERE koulutus = '$ala' AND paikkakunta = '$paikkakunta' ");   
                          
         }
         }else{
          $info = mysqli_query($dbcon, "SELECT hloID FROM harrastukset WHERE harrastus = '$harrastus'");
          while($ID = mysqli_fetch_array($info)){
             if($ika == 1){
	
	$data = mysqli_query($dbcon , " SELECT * FROM henkilotiedot WHERE koulutus = '$ala' AND paikkakunta = '$paikkakunta' AND sAika > 18 AND hloID = '$ID[hloID]]'");
        
        }else{
         $data = mysqli_query($dbcon , " SELECT * FROM henkilotiedot WHERE koulutus = '$ala' AND paikkakunta = '$paikkakunta' AND hloID = '$ID[hloID]' AND ($kortit) = 1");   
                          
         } 
             
             
         }
         }
        while($row = mysqli_fetch_array( $data )){
		echo $row['eNimi'];
		
	}
	
	
	
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}	        
	    
	?>    
	   
	    
		<script src="js/auto.js"></script>