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
        $baza = mysqli_real_escape_string($conn, $_POST['database']);
        
        
        if(strcmp($baza,"users") === 0 || strcmp($baza,"punktacja") === 0 || strcmp($baza,"dane_kandydata") === 0)
        {

            $str = "TRUNCATE table"." ".$baza;
            $sql = mysqli_query($conn,$str);
            if($sql)
            {
                $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
                mysqli_query($conn,"INSERT INTO logs SET log_who='$adminLogin',log_whichDB='$baza', log_ip='$ip', log_type='czysc'");
                echo("Baza: ".$baza." została wyczyszczona.");
            }
            else
            {
                echo("<div style='color:red;'>Błąd w czyszczeniu bazy danych.</div>");
            }
        }
        else
        {
            exit();
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