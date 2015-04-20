<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/screen.css">
	<link href="./css/bootstrap.css" type="text/css" rel="stylesheet">
	<script src="js/less.js"></script>
<style>


form {
    width: 200px;
    height: 200px;     
}

h1 {
text-align: center;
font-style: ;
}


</style>
  <title>Osaamispankki</title>
 </head>
 <div class="jumbotron">
	<center>

		
	
	<section>

<?php

include 'functions/users.php';



if (isset($_GET['success']) === true && empty($_GET['success']) === true){
?>
	<h2>kiitos kun aktivoit käyttäjäsi</h2>
	<p>voit kirjautua sisään</p>
<?php
} else if(isset($_GET['tunnus'], $_GET['email_code']) === true) {
	$tunnus       =trim($_GET['tunnus']);
	$email_code  =trim($_GET['email_code']);
	
	if (email_exists ($tunnus) === false) {
		$errors[] = 'Sähköpostiasia ei lötynyt';
	}else if(activate($tunnus,$email_code) === false) {
		$errors[] = 'meillä on ongelmia käyttäjäsi aktivoinnissa';
	}
	
	if (empty($errors) === false) {
	?>
		<h2>Oops...</h2>
	<?php
		echo output_errors($errors);
	
	}else {
		header('Location: activate.php?success');
	}
	
} else{
	header('Location: index.php');
	exit();

} 

?>
</section>
        
    <br><br><br><br><a href="login.php" class="btn btn-default">Kirjautuminen</a>






</center>