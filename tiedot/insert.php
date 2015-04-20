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





//Escape variables for security
//HENKILÖTIEDOT
$eNimi = mysqli_real_escape_string($con, $_POST['eNimi']);
$sNimi = mysqli_real_escape_string($con, $_POST['sNimi']);
$kOsoite = mysqli_real_escape_string($con, $_POST['kOsoite']);
$postiTp = mysqli_real_escape_string($con, $_POST['postiTp']);
$postiNro = mysqli_real_escape_string($con, $_POST['postiNro']);
$sAika = mysqli_real_escape_string($con, $_POST['sAika']);
$sPuoli = mysqli_real_escape_string($con, $_POST['sPuoli']);
$ajokortti = mysqli_real_escape_string($con, $_POST['ajokortti']);
$ajokorttiluokka = mysqli_real_escape_string($con, $_POST['ajokorttiluokka']);
$paivitetty_valokuva = mysqli_real_escape_string($con, $_POST['paivitetty_valokuva']);

$sql="INSERT INTO `henkilotiedot` (`eNimi`, `sNimi`, `kOsoite`, `postiTp`, `postiNro`, `sAika`, `sPuoli`, `ajokortti`, `ajokorttiluokka`, `paivitetty_valokuva`)
VALUES ('$eNimi', '$sNimi', '$kOsoite', '$postiTp', '$postiNro', '$sAika', '$sPuoli', '$ajokortti', '$ajokorttiluokka', '$paivitetty_valokuva')";

// HARRASTUS
$harrastus = mysqli_real_escape_string($con, $_POST['harrastus']);
$kuvaus = mysqli_real_escape_string($con, $_POST['kuvaus']);
$vapaa = mysqli_real_escape_string($con, $_POST['vapaa']);

$sql="INSERT INTO `harrastus` (`harrastus`, `kuvaus`, `vapaa`);
VALUES ('$harrastus', '$kuvaus', '$vapaa')";

//KORTTI
$kortti = mysqli_real_escape_string($con, $_POST['kortti']);
$voimassa = mysqli_real_escape_string($con, $_POST['voimassa']);

$sql="INSERT INTO `korit` (`kortti`, `voimassa`)
VALUES ('kortti', 'voimassa')";


//TYÖHISTORIA
$tyonantaja = mysqli_real_escape_string($con, $_POST['tyonantaja']);
$tyopaikka = mysqli_real_escape_string($con, $_POST['tyopaikka']);
$toimipiste = mysqli_real_escape_string($con, $_POST['toimipiste']);
$tyotehtava = mysqli_real_escape_string($con, $_POST['tyotehtava']);
$kuvaus = mysqli_real_escape_string($con, $_POST['kuvaus']);
$alkoi = mysqli_real_escape_string($con, $_POST['alkoi']);
$loppui = mysqli_real_escape_string($con, $_POST['loppui']);

$sql="INSERT INTO `tyohistoria` (`tyonantaja`, `tyopaikka`, `toimipiste`,  `tyotehtava`, `kuvaus`, `alkoi`, `loppui`);
VALUES ('$tyonantaja', '$tyopaikka', '$toimipiste',  '$tyotehtava', '$kuvaus', '$alkoi', '$loppui')";

//TYÖTEHTÄVÄT
$tyotehtava = mysqli_real_escape_string($con, $_POST['tyotehtava']);
$kuvaus = mysqli_real_escape_string($con, $_POST['kuvaus']);
$milloinalkaa = mysqli_real_escape_string($con, $_POST['milloinalkaa']);
$mihinasti = mysqli_real_escape_string($con, $_POST['mihinasti']);
$maxviikkoh = mysqli_real_escape_string($con, $_POST['maxviikkoh']);
$minviikkoh = mysqli_real_escape_string($con, $_POST['minviikkoh']);
$paivatyo = mysqli_real_escape_string($con, $_POST['paivatyo']);
$iltatyo = mysqli_real_escape_string($con, $_POST['iltatyo']);
$yotyo = mysqli_real_escape_string($con, $_POST['yotyo']);
$kaksivuorotyo = mysqli_real_escape_string($con, $_POST['kaksivuorotyo']);
$kolmevuorotyo = mysqli_real_escape_string($con, $_POST['kolmevuorotyo']);
$paikkakunta = mysqli_real_escape_string($con, $_POST['paikkakunta']);


$sql="INSERT INTO `tyotehtavat` (`tyotehtavat`, `kuvaus`, `milloinalkaa`, `mihinasti`, `maxviikkoh`, `minviikkoh`, `paivatyo`, `iltatyo`, `yotyo`, `paikkakunta`)
VALUES ('$tyotehtavat', '$kuvaus', '$milloinalkaa', '$mihinasti', '$maxviikkoh', '$minviikkoh', '$paivatyo', '$iltatyo', '$yotyo', '$paikkakunta')";


//HAKU
$tyo = mysqli_real_escape_string($con, $_POST['tyo']);
$milloinaloittaa = mysqli_real_escape_string($con, $_POST['milloinaloittaa']);
$mihinasti = mysqli_real_escape_string($con, $_POST['mihinasti']);
$maxviikkoh = mysqli_real_escape_string($con, $_POST['maxviikkoh']);
$paivatyo = mysqli_real_escape_string($con, $_POST['paivatyo']);
$iltatyo = mysqli_real_escape_string($con, $_POST['iltatyo']);
$yotyo = mysqli_real_escape_string($con, $_POST['yotyo']);
$kaksivuorotyo = mysqli_real_escape_string($con, $_POST['kaksivuorotyo']);
$kolmevuorotyo = mysqli_real_escape_string($con, $_POST['kolmevuorotyo']);
$paikkakunta = mysqli_real_escape_string($con, $_POST['paikkakunta']);

$sql="INSERT INTO `haku` (`tyo`, `milloinaloittaa`, `mihinasti`, `maxviikkoh`, `paivatyo`, `iltatyo`, `yotyo`, `kaksi-vuorotyo`, `kolme-vuorotyo`, `paikkakunta`)
VALUES ('$tyo', '$milloinaloittaa', '$mihinasti', '$maxviikkoh', '$paivatyo', '$iltatyo', '$yotyo', '$kaksi-vuorotyo', '$kolme-vuorotyo', '$paikkakunta')";



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