
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


$kortti = mysqli_real_escape_string($con, $_POST['kortti']);
$voimassa = mysqli_real_escape_string($con, $_POST['voimassa']);

$sql="INSERT INTO kortit (kortti, voimassa)
VALUES ('$kortti', '$voimassa')";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "tiedot päivittetty";

mysqli_close($con);
?>
</body>
</html> 