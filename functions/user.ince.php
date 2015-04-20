<?php

#if ((isset($_POST['login_email']) && !empty($_POST['login_email'])) &&
#	(isset($_POST['login_password']) && !empty($_POST['login_password'])
#	)) 
#	{

function userExists($login_email, $dbcon) {
	
	if ($login_email = $_POST['login_email']);
	$sql = "SELECT * FROM kayttajat
			WHERE tunnus = '$login_email';";
	echo $sql;

	$result = mysqli_query($dbcon, $sql);
	$rowcount=mysqli_num_rows($result);

	if ($rowcount > 0 ){
			return true;
	} else {
			return false; 
	}

}




//$result = mysqli_query($dbcon, $sql);




function checkPassword($login_email, $login_password, $dbcon){
	if ($login_password = md5($_POST['login_password']));
	$sql = "SELECT * FROM kayttajat
				WHERE 
					tunnus = '$login_email'
				AND
					salasana = '$login_password';";


	$result = mysqli_query($dbcon, $sql);
	$rowcount=mysqli_num_rows($result);
	if ($rowcount > 0 ){
			return true;
		} else {
			return false; 
		}
}

##} else {
	
##}