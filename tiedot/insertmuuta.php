<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","","osaamispankki");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//MUUTA, kaikki on paitsi kayttajat ja tyonantaja
$vapaasana = mysqli_real_escape_string($con, $_POST['vapaasana']);
$tulevaisuus = mysqli_real_escape_string($con, $_POST['tulevaisuus']);
$true = mysqli_real_escape_string($con, $_POST['true']);
$false = mysqli_real_escape_string($con, $_POST['false']);


$sql ="INSERT INTO `muuta` (`vapaasana`, `tulevaisuus`, `true`, `false`)
VALUES ('$vapaasana', '$tulevaisuus', '$true', '$false')";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "tiedot päivittetty";

mysqli_close($con);
?>
</body>
</html> 