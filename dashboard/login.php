<?php
session_start();
	require_once("../database.php");
	$login = mysqli_real_escape_string($conn, $_POST['login']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	//hashing
	$pass = hash("sha256",$pass);
	
	$login_query = mysqli_query($conn ,"SELECT login, pass FROM admin WHERE login='$login' AND pass='$pass'");

	$rows = mysqli_num_rows($login_query);

	if($rows == 1)
	{
	 	$_SESSION['loginAdmin'] = $login;
	 	$_SESSION['passAdmin'] = $pass;
	 	header("Location: dashboard.php");
	}
	else
	{
	 	header("Location: index.php");
	 	exit();
	}
?>