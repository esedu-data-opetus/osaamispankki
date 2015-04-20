<?php
function change_profile_image($hloID, $file_temp, $file_extn){
    $dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);
    $file_path = 'kuvat/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
    move_uploaded_file($file_temp, $file_path);
    mysqli_query($dbcon, "UPDATE henkilotiedot SET profile = '" . $file_path ."' WHERE hloID = " . (int)$hloID);
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
	
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kayttajat SET " . implode(', ', $update) . " WHERE userID = $session_userid" );
}
function has_access($userid, $type) {
	$userid = (int)$userid;
	$type   = (int)$type;
	//return (mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE userid = $userid AND type = $type"), 0) == 1) ? true : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE userid = $userid AND type = $type");
	return (mysqli_num_rows($result) == 1)? true : false;
}

function activate($email, $email_code) {
	$email       = $GLOBALS["___mysqli_ston"]->real_escape_string($email);
	$email_code  = $GLOBALS["___mysqli_ston"]->real_escape_string($email_code);
	//$email_code  = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $email_code);
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT userid FROM user WHERE email = '$email' AND email_code = '$email_code' AND active = 0");
	if (mysqli_num_rows($result) == 1) {
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE user SET active = 1 WHERE email = '$email'");
	return true;
	} else {
	return false;
	}
	
}

function change_password($userID, $salasana) {
    define('HOST','paja.esedu.fi');
    define('USER', 'op_user');
    define('PASS', 'op_Passu!');
    define('DBNAME', 'osaamispankki');



$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);
	$userID = (int)$userID;
	$salasana = md5($salasana);
	
	mysqli_query($dbcon, "UPDATE user SET salasana = '$salasana' WHERE userID = $userID");

}

function register_user($tunnus,$salasana,$tyyppi) {
define('HOST','paja.esedu.fi');
define('USER', 'op_user');
define('PASS', 'op_Passu!');
define('DBNAME', 'osaamispankki');



$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);


	$salasana = md5($salasana);
	
		
	mysqli_query($dbcon, "INSERT INTO kayttajat(tunnus,salasana,tyyppi) VALUES ($tunnus,$salasana,$tyyppi)");
		
	
	

}
function send_info($send_data, $userid) {
	array_walk($send_data, 'array_sanitize');
	$userid = (int)$userid;
	
	
	$fields = '`' . implode('`, `', array_keys($send_data)) . '`';
	$data = '\'' . implode('\', \'', $send_data) . '\'';
	
	
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tyoajat ($fields) VALUES ($data)");
	
	}


function user_count() {
	//return mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE active = 1"), 0);
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE active = 1");
	//$result = $db->query("SELECT userid FROM user WHERE active = 1");
	//$result = $db->query("SELECT COUNT(userid) FROM user WHERE active = 1");
	//$row = $result->fetch_row();
	//return $row[0];
	return (mysqli_num_rows($result));
}


function user_data($userid){
	$data = array();
	$userid = (int)$userid;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 0) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = $GLOBALS["___mysqli_ston"]->query("SELECT $fields FROM user WHERE userid = $userid ");
		
		return mysqli_fetch_assoc($data);
	}
	
	
}




function logged_in() {
	return(isset($_SESSION['userid'])) ? true : false;
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
	define('HOST','paja.esedu.fi');
define('USER', 'op_user');
define('PASS', 'op_Passu!');
define('DBNAME', 'osaamispankki');



$dbcon = mysqli_connect(HOST,USER,PASS,DBNAME);

	$result = mysqli_query($dbcon, "SELECT userID FROM kayttajat WHERE tunnus = '$tunnus' ");
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE username = '$username'"), 0) == 1) ? true : false;
	//$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE username = '$username' ");
	return (mysqli_num_rows($result) == 1) ? true : false;
	
	}
function email_exists($email) {
	$email = sanitize($email);
	//return(mysql_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(userid) FROM user WHERE email = '$email'"), 0) == 1) ? true : false;
	$result = $GLOBALS["___mysqli_ston"]->query("SELECT userid FROM user WHERE email = '$email'");
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

if (logged_in() === true) {
	$session_userid = $_SESSION['userID'];
	$user_data = user_data($session_userid, 'userID', 'tunnus', 'salasana', 'tyyppi');
	if (user_active($user_data['tunnus']) === false) {
		session_destroy();
		header('Location: uusindex.php');
		exit();
	}
}
?>