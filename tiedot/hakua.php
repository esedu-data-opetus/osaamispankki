<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'config.php';

if($_GET['type'] == 'country'){
	$result = mysql_query("SELECT alanimi FROM alat where alanimi LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['alanimi']);	
	}	
	echo json_encode($data);
}

if($_GET['type'] == 'ohjaaja'){
	$result = mysql_query("SELECT paikkakunta FROM paikkakunnat  where paikkakunta  LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['paikkakunta']);	
	}	
	echo json_encode($data);
}



?>