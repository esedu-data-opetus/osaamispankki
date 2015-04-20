<?php
require 'functions/users.php'; 
session_start();
if (!isset($_SESSION['user'])) 
	header('Location: ../login.php');