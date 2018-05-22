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
        $res = mysqli_query($conn,"SHOW TABLES FROM rekrutacja");
        $tables = array();

            while($row = mysqli_fetch_array($res, MYSQL_NUM)) 
            {
                if($row[0] === "typ_szkoly" || $row[0] === "logs" || $row[0] === "admin" || $row[0] === "users" || $row[0] === "punktacja" || $row[0] ==="dane_kandydata")
                {
                    //jeśli tak to nie wyświetlaj
                }
                else
                {
                    echo("<option value=".$row[0].">".$row[0]."</option>");
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
