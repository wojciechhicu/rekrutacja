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
        $imie = mysqli_real_escape_string($conn, $_POST['imie']);
        $nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
        $pesel = mysqli_real_escape_string($conn, $_POST['pesel']);
        
        $update = mysqli_query($conn, "UPDATE dane_kandydata SET imie='$imie', nazwisko='$nazwisko' WHERE pesel='$pesel'");
        if($update)
        {
            echo("Zmieniono dane");
        }
        else
        {
            echo("Nie udało się zmienić danych");
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