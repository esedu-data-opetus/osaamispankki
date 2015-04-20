<?php
//db_connect.php

define('HOST','paja.esedu.fi');
define('USER', 'op_user');
define('PASS', 'op_Passu!');
define('DBNAME', 'osaamispankki');


//yritetään muodostaa yhteys tietokantaan
$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);

// tarkistetaan yhteys
if (mysqli_connect_errno()){
	echo "<p>Yhteys tietokantaan ei onnistunut</p>";
} else {
	echo "<p>Yhteys tietokantaan muodostettu: " . mysqli_get_host_info($dbcon) ."</p>";
}