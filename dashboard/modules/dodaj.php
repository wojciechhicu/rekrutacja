<?php
session_start();
require_once("../../database.php");

$login = mysqli_real_escape_string($conn, $_POST['login']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$pass = hash("sha256",$pass);//hash hasła

$adminLogin = mysqli_real_escape_string($conn, $_SESSION['loginAdmin']);
$adminPass = mysqli_real_escape_string($conn, $_SESSION['passAdmin']);

if(isset($adminLogin) && isset($adminPass))
{
	$look = mysqli_query($conn, "SELECT login, pass FROM admin WHERE login='$adminLogin'AND pass = '$adminPass'");
	$row = mysqli_num_rows($look);
	
	if($row === 1)
	{
		$howMany = mysqli_query($conn, "SELECT login FROM users WHERE login='$login'");
		$howManyRow = mysqli_num_rows($howMany);
		if($howManyRow > 0)
		{
			exit("<div style='color:red;'>Użytkownik o loginie ".$login." już istnieje w bazie</div>");
		}
		else
		{
			$ins = mysqli_query($conn, "INSERT INTO users SET login='$login',password='$pass'");
			if($ins)
			{
				echo "<div style='color:white; text-decoration:underline;'>Użytkownik ".$login." został dodany</div>";
			}
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