<?php
include 'functions/user.inc.php';
include 'functions/general.inc.php';

// Katsotaan tuliko lomaketta käsitellessä virheitä
if (!empty($_GET) && isset($_GET['virheet'])) {
	$errors = array();
	switch ($_GET['virheet']) {
		case 1:
			$errors[] ='Salasana ja käyttäjätunnus ovat pakollisia kenttiä<br>';
			break;
		case 2:
			$errors[] = 'Käyttäjänimeä ei löydy';
			break;
		case 3:
			$errors[] = 'Salasana oli väärä';
			break;
		default:
			$errors[] = 'Tapahtui jotain yllättävää';
	}
} 
?>
<DOCTYPE html>
<html>
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
<body>
<div class="jumbotron">
	
<center>

		
	
	<section>
		<h2>Kirjaudu:</h2>
		<?php		
		if (isset($errors)) echo outputErrors($errors);
		?>
		<form method="post" action="checkLogin.php">
<form role="form">
  <div class="form-group">
    <label>Sähköposti</label>
    <input name="login_email" type="email" class="form-control" placeholder="Sähköposti">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Salasana</label>
    <input name="login_password" type="password" class="form-control" placeholder="Salasana">
  </div>


					<input type="submit" value="Kirjaudu" class="btn btn-default">

				
		</form>
	</section>






</div>
</center>
</body>
</html>