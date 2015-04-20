<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$dbh = new PDO('mysql:host=paja.esedu.fi;port=3306;dbname=osaamispankki','op_user','op_Passu!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));



//Tarkistaa miltä lomakkeelta tiedot tulee ja laittaaa ne tietokantaan.
switch ($_POST["formName"]) {
	case "henkilotiedotForm":
		$stmt = $dbh->prepare("INSERT INTO `henkilotiedot` (eNimi, sNimi, kOsoite, postiNro, postiTp, sAika, sPuolimies, sPuolinainen, ajokortti, paivitetty_valokuva) VALUES (:eNimi, :sNimi, :kOsoite, :postiNro, :postiTp, :sAika, :sPuolimies, :sPuolinainen, :ajokortti, :paivitetty_valokuva)");
		$stmt->execute(array(
			":eNimi" => $_POST["eNimi"],
			":sNimi" => $_POST["sNimi"],
			":kOsoite" => $_POST["kOsoite"],
			":postiNro" => $_POST["postiNro"],
			":postiTp" => $_POST["postiTp"],
			":sAika" => $_POST["sAika"],
			":sPuolimies" => $_POST["sPuolimies"],
			":sPuolinainen" => $_POST["sPuolinainen"],
			":ajokortti" => $_POST["ajokortti"],
			":paivitetty_valokuva" => $_POST["paivitetty_valokuva"]
		
		
			));
		break;




	case "harrastusForm":
		$stmt = $dbh->prepare("INSERT INTO `harrastukset` (harrastus, kuvaus, VALUES (:harrastus, :kuvaus");
		$stmt->execute(array(
			":harrastus" => $_POST["harrastus"],
			":kuvaus" => $_POST["kuvaus"],

		
			));

		break;

	case "muutaForm":
		$stmt = $dbh->prepare("INSERT INTO `muuta` (vapaasana, tulevaisuus) VALUES (:vapaasana, :tulevaisuus)");
		$stmt->execute(array(
			":vapaasana" => $_POST["vapaasana"],
			":tulevaisuus" => $_POST["tulevaisuus"]

			));

		break;


	case "tyohistoriaForm":
		$stmt = $dbh->prepare("INSERT INTO `tyohistoria` (tyonantaja, tyopaikka, toimipiste, tyotehtava, kuvaus, alkoi, loppui) VALUES (:tyonantaja, :tyopaikka, :toimipiste, :tyotehtava, :kuvaus, :alkoi, :loppui)");
		$stmt->execute(array(
			":tyonantaja" => $_POST["tyonantaja"],
			":tyopaikka" => $_POST["tyopaikka"],
			":toimipiste" => $_POST["toimipiste"],
			":tyotehtava" => $_POST["tyotehtava"],
			":kuvaus" => $_POST["kuvaus"],
			":alkoi" => $_POST["alkoi"],
			":loppui" => $_POST["loppui"]
		
			));

		break;


	case "kortitForm":
		$stmt = $dbh->prepare("INSERT INTO `kortit` (kortti, voimassa) VALUES (:kortti, :voimassa)");
		$stmt->execute(array(
			":kortti" => $_POST["kortti"],
			":voimassa" => $_POST["voimassa"]
		

		));

		break; 	


}













?>

