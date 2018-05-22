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
		$deleteUser = mysqli_real_escape_string($conn, $_POST['usun']);
		$deleteQuery = mysqli_query($conn, "DELETE FROM users WHERE login='$deleteUser'");
		if($deleteQuery)
		{
			echo("Użytkownik ".$deleteUser." został usunięty");
		}
		else
		{
			echo("Błąd w usunięciu");
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