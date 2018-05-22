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
		echo "<select class='selectUsers' id='selectChange'>";
		$users = mysqli_query($conn, "SELECT login FROM users");
			while($r = mysqli_fetch_assoc($users))
			{
				echo("<option value=".$r['login'].">".$r['login']."</option>");
				
			}
		echo "</select>";
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