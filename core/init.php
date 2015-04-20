<?php
session_start();
//error_reporting(0);
require 'functions/general.inc.php';
require 'functions/users.php'; 


if (logged_in() === true) {
	$session_userid = $_SESSION['user'];
	$user_data = user_data($session_userid, 'hloID', 'tunnus', 'salasana');
	if (user_active($user_data['tunnus']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
}



$errors = array();
?>