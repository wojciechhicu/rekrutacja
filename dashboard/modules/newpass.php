<?php
session_start();
require_once("../../database.php");

$adminLogin = mysqli_real_escape_string($conn, $_SESSION['loginAdmin']);
$adminPass = mysqli_real_escape_string($conn, $_SESSION['passAdmin']);

if(isset($adminLogin) && isset($adminPass))
{
	$look = mysqli_query($conn, "SELECT login, pass FROM admin WHERE login='$adminLogin'AND pass = '$adminPass'");
	$row = mysqli_num_rows($look);
	
	if($row === 1)
	{
		$komu = mysqli_real_escape_string($conn, $_POST['komu']);
		$newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
		$newpass = hash("sha256",$newpass);

		$change = mysqli_query($conn, "UPDATE users SET password='$newpass' WHERE login='$komu'");
		if($change)
		{
			echo("Hasło użytkownika ".$komu." zostało zmienione.");
		}
		else
		{
			echo ("Błąd w zmianie hasła");
		}
	}
	else
	{
		exit("Sesja zakończona, zaloguj ponownie");
	}
}
else
{
	exit("Sesja zakończona, zaloguj ponownie");
}
?>