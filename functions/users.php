<?php
include 'connect.php';


function email($to, $subject, $body) {
	mail($to, $subject, $body, 'From: Jortikka@hotmail.com');
}
function logged_in_redirect() {
	if (logged_in() === true) {
		header('location: index.php');
		exit();
	}
}

function protect_page() {
	if(logged_in() === false) {
		header('Location: protected.php');
		exit();
	}

}
function admin_protect() {
	global $user_data;
	if(has_access($user_data['userid'], 1) === false) {
		header('Location: index.php');
		exit();
	}
}


function array_sanitize(&$item) {
	//$item = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $item) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
	$str = $GLOBALS["___mysqli_ston"]->real_escape_string($item);
	$item = htmlentities($str, ENT_COMPAT, "UTF-8");
	return $item;
}
function sanitize($data) {
	//return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $data) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
	return htmlentities($GLOBALS["___mysqli_ston"]->real_escape_string($data), ENT_COMPAT, "UTF-8");
	}

function lukematon_viesti($username){

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT viesti_id FROM viesti WHERE luettu = '0' AND vusername = '$username' ");
$numero = mysqli_num_rows($result);
return $numero;
}
function  poista_ryhmast($ryhmaid,$nimi){
	
	
	
	$sql = "DELETE FROM ryhma_users WHERE ryhmaid = '$ryhmaid' AND nimi = '$nimi'";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}

function ryhmaan_lisays($lisa_data){

	array_walk($lisa_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($lisa_data)) . '`';
	$data = '\'' . implode('\', \'', $lisa_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO ryhma_users ($fields) VALUES ($data)");
	
//mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO ryhmat '$rnimi' VALUE rnimi AND '$tekija' VALUE rtekija");



}
function ryhman_luonti($ryhma_data){

	array_walk($ryhma_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($ryhma_data)) . '`';
	$data = '\'' . implode('\', \'', $ryhma_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO ryhmat ($fields) VALUES ($data)");
	
//mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO ryhmat '$rnimi' VALUE rnimi AND '$tekija' VALUE rtekija");



}
function  poista_topp($yhd_id){
	
	
	
	$sql = "DELETE FROM tyoajat WHERE yhd_id = '$yhd_id'";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	$sql2 = "DELETE FROM yhdistys WHERE yhd_id = '$yhd_id'";
	mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}

function  tee_ope($userid){
	
	
	
	$sql = "UPDATE user SET type = 1 WHERE userid = '$userid' ";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}
function check($oppilas, $ohjaaja){
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username FROM user WHERE username = '$oppilas' ");
$result2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username FROM user WHERE username = '$ohjaaja' ");
	
	if(mysqli_num_rows($result) == 1 & mysqli_num_rows($result2) == 1){
	
	return true;
	}else{
	return false;
}}
function  poista_henk($userid){
	
	
	
	$sql = "DELETE FROM user WHERE userid = '$userid' ";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}
function  tee_ohj($userid){
	
	
	
	$sql = "UPDATE user SET type = 2 WHERE userid = '$userid' ";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}
function hyvaksya($tyoid){

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tyoajat SET hyvaksytty = 'on' WHERE tyoid = '$tyoid'");


}

function yhd_user($oppilas, $ohjaaja){

	
	
	
	$data2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT yhd_id FROM yhdistys  WHERE oppilas = '$oppilas' AND ohjaaja = '$ohjaaja'");
	$row = mysqli_fetch_row($data2);
	$paskaa = $row[0];
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE user SET yhd_id = $paskaa WHERE username = '$oppilas' OR username = '$ohjaaja'");
}

function yhdist_user($yhdistys_data){
array_walk($yhdistys_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($yhdistys_data)) . '`';
	$data = '\'' . implode('\', \'', $yhdistys_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO yhdistys ($fields) VALUES ($data)");
}




function mail_users($subject, $body)	{
	$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT email FROM user");
	while (($row = mysqli_fetch_assoc($query)) !== false) {
		mail($row['email'], $subject, "Hei " . ",\n\n" . $body, 'From: Jortikka@hotmail.com');
	}
}
function poist_ilm($ilm_id) {
	
	
	
	$sql = "DELETE FROM ilmoitus  WHERE ilm_id = '$ilm_id' ";
	
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	/*
	if(mysql_query($sql, $GLOBALS["___mysqli_ston"])){
	   echo "Database my_db was successfully dropped\n";
	    } else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}
*/
}



function send_ilm($ilm_data) {
	array_walk($ilm_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($ilm_data)) . '`';
	$data = '\'' . implode('\', \'', $ilm_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO ilmoitus ($fields) VALUES ($data)");
}




function send_message($message_data) {
	array_walk($message_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($message_data)) . '`';
	$data = '\'' . implode('\', \'', $message_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO viesti ($fields) VALUES ($data)");
}


function recover($mode, $email){
	$mode = sanitize($mode);
	$email = sanitize($email);
	
	$user_data = user_data(userid_from_email($email), 'userid', 'first_name', 'username');
	
	if ($mode == 'username') {
		email($email, 'Käyttäjänimesi', "Hei " . $user_data['first_name'] . ",\n\nSinun käyttäjänimesi on: " . $user_data['username'] . "\n\n");
	}else if($mode == 'password'){
		$generated_password = substr(md5(rand(999, 999999)), 0, 8);
		change_password($user_data['userid'], $generated_password);
		email($email, 'Käyttäjänimesi', "Hei " . $user_data['first_name'] . ",\n\nSinun salasanasi on: " . $generated_password . "\n\n");
	}
}
function update_user($update_data) {
	global $session_userid;
	$update = array();
	array_walk($update_data, 'array_sanitize');
	 
	foreach($update_data as $field=>$data) {
		$update[]= '' . $field . ' = \'' . $data . '\'';
	}
	
function change_password($hloID, $salasana) {


	$hloID = (int)$hloID;
	$salasana = md5($salasana);
	
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE henkilotiedot SET salasana = '$salasana' WHERE hloID = '$hloID'");

}	
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE user SET " . implode(', ', $update) . " WHERE userid = $session_userid" );
}
function has_access($userid, $type) {
	$userid = (int)$userid;
	$type   = (int)$type;
	//return (mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE userid = $userid AND type = $type"), 0) == 1) ? true : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE userid = $userid AND type = $type");
	return (mysqli_num_rows($result) == 1)? true : false;
}

function activate($tunnus, $email_code) {
	$tunnus       = $GLOBALS["___mysqli_ston"]->real_escape_string($tunnus);
	$email_code  = $GLOBALS["___mysqli_ston"]->real_escape_string($email_code);
	//$email_code  = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $email_code);
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT hloID FROM henkilotiedot WHERE tunnus = '$tunnus' AND email_code = '$email_code' AND active = 0");
	if (mysqli_num_rows($result) == 1) {
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE henkilotiedot SET active = 1 WHERE tunnus = '$tunnus'");
	return true;
	} else {
	return false;
	}
	
}

function register_user($tunnus,$salasana,$tyyppi,$eNimi,$sNimi,$email_code) {






	$salasana = md5($salasana);
	
		
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO henkilotiedot (tunnus, salasana, tyyppi, eNimi, sNimi, email_code) VALUES ('$tunnus', '$salasana', '$tyyppi', '$eNimi', '$sNimi', '$email_code')");
	email($tunnus, 'Aktivoi käyttäjäsi', "Moi " . $eNimi . ",\n\nSinun pitää aktivoida käyttäjäsi, joten painappas alhaalla olevaa linkkiä:\n\nhttp://paja.esedu.fi/osaamispankki/activate.php?tunnus=" . $tunnus . "&email_code=" . $email_code . " \n\n-	Omistajat");
	
	

}




function user_data($hloID){
    




$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);*/
	
	$hloID = (int)$hloID;
	
		
		$data = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM henkilotiedot WHERE hloID = '$hloID' ");

		return mysqli_fetch_assoc($data);
	}
	
	





function logged_in() {
	return(isset($_SESSION['hloID'])) ? true : false;
}

function user_exists_ryhma($nimi,$ryhmaid) {
	$nimi = sanitize($nimi);
	$ryhmaid = sanitize($ryhmaid);
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT nimi FROM ryhma_users WHERE nimi = '$nimi' AND ryhmaid = '$ryhmaid'");
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE username = '$username'"), 0) == 1) ? true : false;
	//$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username' ");
	return (mysqli_num_rows($result) == 1) ? true : false;
	
	}
function user_exists($tunnus) {




$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME); */

	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT hloID FROM henkilotiedot WHERE tunnus = '$tunnus' ");
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE username = '$username'"), 0) == 1) ? true : false;
	//$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username' ");
	return (mysqli_num_rows($result) == 1) ? true : false;


function email_exists($tunnus) {
	$tunnus = sanitize($tunnus);
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE email = '$email'"), 0) == 1) ? true : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT hloID FROM henkilotiedot WHERE tunnus = '$tunnus'");
	return (mysqli_num_rows($result) == 1)? true : false;
	
	}
function user_active($username) {
	$username = sanitize($username);
	
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE username = '$username' AND active = 1"), 0) == 1) ? true : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username' AND active = 1");
	return (mysqli_num_rows($result) == 1)? true : false;
	
	}
function userid_from_username($username){	
	$username = sanitize($username);
	//return mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT (userid) FROM user WHERE username = '$username' "), 0, 'userid');
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username'");
	$row = mysqli_fetch_row($result);
	return $row[0];
}
function userid_from_email($email){	
	$username = sanitize($username);
	//return mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT (userid) FROM user WHERE email = '$email' "), 0, 'userid');
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE email = '$email'");
	$row = mysqli_fetch_row($result);
	return $row[0];
}	
function login($username, $password){
	$userid = userid_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	
	//return (mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $userid : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username' AND password = '$password'");
	
	return (mysqli_num_rows($result) == 1)? $userid : false;
	
}
function output_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';
}
function hyvaksy_user($hloid){
    
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE henkilotiedot SET varmistettu = 1 WHERE hloID = '$hloid' ");
    
    
}
}