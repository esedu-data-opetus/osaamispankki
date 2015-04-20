<?php
include 'core/init.php';



?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="js/popover.js">

<link rel="shortcut icon" href="favicon.ico">

<title>Osaamispankki</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<!-- <script src="./js/less.js"></script> -->
<!-- Custom styles for this template -->


<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="js/popover.js">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="tiedot.css">
<style type="text/css">

body{
    padding-top: 70px;
}

.help-block{
  font-size: 5px;
}

select[multiple], select[size] {
    height: 200px;
}




</style>


<script>
 $(function() {
$( ".dp" ).datepicker({
changeMonth: true,
changeYear: true
});
});

jQuery(function($){
$.datepicker.regional['fi'] = {
SuljeText: 'Sulje',
prevText: '&#xAB;Edellinen',
nextText: 'Seuraava&#xBB;',
currentText: 'Tänään',
monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu',
'Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä',
'Heinä','Elo','Syys','Loka','Marras','Joulu'],
dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
dayNames: ['Sunnuntai','Maanantai','Tiistai','Keskiviikko','Torstai','Perjantai','Lauantai'],
dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
weekHeader: 'Vk',
dateFormat: 'd.m.yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''};
$.datepicker.setDefaults($.datepicker.regional['fi']);
});



$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})









</script>

</head>


<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Osaamispankki</a>
          <a class="navbar-brand" href="tiedot/uusindex.php">Minun tietoni</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--li><a href="index.php">Minun tietoni</a></li-->
            <!--li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="asd">dropdown<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" id="asd">
                <li><a href="tiedot/tyohistoria.php">tyohistoria</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">moi</li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </li-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--li><a href="#">linkki</a></li>
            <li><a href="#">toinen linkki</a></li>
            <li><a href="../logout.php" style="color:red;">Kirjaudu ulos</a></li-->
            <li><a href="logout.php"><button type="button" class="btn btn-danger" style="width:100px; height:25px; padding:0px;" >Kirjaudu ulos &raquo;</button></a></li><br>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
        <center>
 <?php
$tunnus = $_SESSION['user'];
 $data = mysqli_query($dbcon, "SELECT * FROM henkilotiedot WHERE tunnus = '$tunnus'");
 $row = mysqli_fetch_assoc($data);
 $salasana = $row['salasana'];
$hloID = $row['hloID'];
if (empty($_POST) === false) {
		$required_fields = array('salasana', 'password', 'password_again');
		foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Tähdellä merkatut kohdat täytyy täyttää';
			break 1;
			
		}
	}
	
	if (md5($_POST['salasana']) === $salasana) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Uudet salasanasi eivät täsmää';
		} else if (strlen($_POST['password']) < 6) {
			$errors[] = 'Salasanasi täytyy olla vähintään 6 merkkiä pitkä';
		}
	} else {
		$errors[] = 'Sinun nykyinen salasanasi on väärä';
	}
	
	
}







?>   

<h3>Salasanan vaihto</h3>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Salasanan vaihtaminen onnistui';
} else {
if (empty($_POST) === false && empty($errors) === true) {
	 $password = $_POST['password'];
	$hloID = (int)$hloID;
	$password = md5($password);
	
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE henkilotiedot SET salasana = '$password' WHERE hloID = '$hloID'");
	header('Location: login.php');
}else if(empty($errors) === false) {
	echo outputErrors($errors);

}

?>

<form action="" method="post" class="form-inline">
	<ul class="list-unstyled"  class="form-group">
		<li>
			Nykyinen salasana*:<br>
			<input type="password" class="form-control" name="salasana">
		</li>              
		<li>
			Uusi salasana*:<br>
			<input type="password" class="form-control" name="password">
		</li>
		<li>
			Salasana uudestaan*:<br>
			<input type="password" class="form-control" name="password_again">
		</li>
		<li>
			
			<input type="submit" class="btn btn-default" name="change_password" value="Vaihda salasana">
		</li>
	</ul>
    </form>
    </center>
    </div>


<?php 
}
