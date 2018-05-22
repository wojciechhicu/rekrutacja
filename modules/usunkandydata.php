<?php
session_start();
require_once("../database.php");

$login = mysqli_real_escape_string($conn, $_SESSION['login']);
$password = mysqli_real_escape_string($conn, $_SESSION['pass']);

if(isset($_SESSION['login']) && isset($_SESSION['pass']))
{

	
	//funkcja sprawdzajaca czy istnieje użytkownik o danych w sesyjnych
	$query_login = mysqli_query($conn, "SELECT login, password FROM users WHERE login='$login' AND password='$password'");
	$rows_login_try = mysqli_num_rows($query_login);
	
	if($rows_login_try == 1)
	{
        //jeśli przejdzie walidacje użtykownik wtedy ->
        $pesel = mysqli_real_escape_string($conn, $_POST['pesel']);
        $removeDane = mysqli_query($conn, "DELETE FROM dane_kandydata WHERE pesel='$pesel'");
        $removePunktacja = mysqli_query($conn, "DELETE FROM punktacja WHERE pesel='$pesel'");
        
        if($removeDane && $removePunktacja)
        {
            echo("Usunięto poprawnie");
        }
        else
        {
            echo("Błąd w usuwaniu kandydata");
        }
	}
	else
	{
		session_destroy();
		header("Location: /../index.php");
		exit();
	}
}
else
{
	header("Location: /../index.php");
	exit();
}
?>