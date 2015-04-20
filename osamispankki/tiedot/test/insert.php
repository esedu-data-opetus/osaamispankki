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

// escape variables for security
$eNimi = mysqli_real_escape_string($con, $_POST['eNimi']);
$sNimi = mysqli_real_escape_string($con, $_POST['sNimi']);
$kOsoite = mysqli_real_escape_string($con, $_POST['kOsoite']);

$sql="INSERT INTO `henkilotiedot` (`eNimi`, `sNimi`, `kOsoite`)
VALUES ('$eNimi', '$sNimi', '$kOsoite')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "tiedot päivittetty";

mysqli_close($con);
?>
</body>
</html> 