<?php
// Käsitellään lomake, jos se on tarpeen
if (!empty($_POST)) {

	include 'functions/db_connect.php';
	include 'functions/user.inc.php';

	$errors = 0;

	if (empty($_POST['login_email']) || empty($_POST['login_password'])) 
		$errors += 1; 
	else if (userExists( $_POST['login_email'] , $dbcon) === false)
		$errors += 2;
	else if (checkPassword($_POST['login_email'], $_POST['login_password'] , $dbcon) === false) {
		$errors += 3;
	}
 

	if (empty($errors)) {
		session_start();
		$_SESSION['user'] = $_POST['login_email'];
		header('Location: index.php');
	} else {
		header('Location: login.php?virheet=' . $errors);
	}
}