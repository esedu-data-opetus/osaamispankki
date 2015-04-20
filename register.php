<head>
	<meta charset="utf-8">
	<title>Login</title>
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
if (empty($_POST) === false) {
	$required_fields = array('tunnus', 'password', 'password_again');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Kentät joissa on *-merkki pitää olla täytettynä';
			break 1;
		}
	}
	if (empty($errors) === true) {
		if(user_exists($_POST['tunnus']) === true) {
			$errors[] = 'Pahoittelut, sähköposti \'' . $_POST['tunnus'] . '\' on jo käytössä.';
		}
		if(preg_match("/\\s/", $_POST['tunnus']) == true) {
			$errors[] ='Sähköpostissa ei saa olla välejä';
		}
		if(strlen($_POST['password']) < 6) {
			$errors[] ='Salasanan pitää olla vähintään 6 merkkiä';
		}
		if($_POST['password'] !== $_POST['password_again']) {
			$errors[] ='Salasanat eivät ole samanlaisia';
		}
		if(filter_var($_POST['tunnus'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Sähköpostiosoite pitää olla käytössä';
		}
		
	
		
}
}

?> 
<h3>Rekisteröidy:</h3>

<?php
if(isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Rekisteröinti on onnistunut<br>';
        echo '<a href="login.php" class="btn btn-default">Kirjautuminen</a>';
       
} else {
	if(empty($_POST) === false && empty ($errors) === true) {
		
			$tunnus  = $_POST['tunnus'];
			$salasana = $_POST['password'];
			$tyyppi  = $_POST['tyyppi'];
                        $eNimi  = $_POST['eNimi'];
                        $sNimi  = $_POST['sNimi'];
                        $email_code = md5($_POST['tunnus'] + microtime());
		
		register_user($tunnus,$salasana,$tyyppi,$eNimi,$sNimi,$email_code);
		header('Location: register.php?success');
		
		exit();
	
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}

?>

	<form action="" class="form-inline" method="post">
		<div class="list-unstyled"class="form-group">		
			
			<div>
				Sähköposti*:<br>
				<input type="text" class="form-control" name="tunnus" placeholder="esim.esim@esimerkki.com">
			</div>
                        <div>
				Etunimi*:<br>
				<input type="text" class="form-control" name="eNimi">
			</div>
                        <div>
				Sukunimi:<br>
				<input type="text" class="form-control" name="sNimi">
			</div>
			<div>
				Salasana*:<br>
				<input type="password" class="form-control" name="password">
			</div>
			<div>
				Salasana uudelleen*:<br>
				<input type="password" class="form-control" name="password_again">
			</div>
                        <div>
                            Oletko työnhakija
                            <input type="radio" value="0" name="tyyppi">
                       
                            vai työnantaja
                            <input type="radio" value="1" name="tyyppi">
                        </div>
			<div>
				<button type="submit" class="btn btn-default">Rekisteröidy</button>
			</div>
                        
                       
			
		</div>
	</form>
	</section>
        
    <br><br><br><br><a href="login.php" class="btn btn-default">Kirjautuminen</a>






</center>
<?php
}
?>