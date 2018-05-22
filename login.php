<?php
session_start();
	require_once("database.php");
	$login = mysqli_real_escape_string($conn, $_POST['login']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	//hashing
	$pass = hash("sha256",$pass);
	
	$login_query = mysqli_query($conn ,"SELECT login, password FROM users WHERE login='$login' AND password='$pass'");

	 $rows = mysqli_num_rows($login_query);

	 if($rows == 1)
	 {
	 	$_SESSION['login'] = $login;
	 	$_SESSION['pass'] = $pass;
	 	header("Location: system.php");
	 }
	 else
	 {
	 	header("Location: index.php");
	 	exit();
	 }
?>