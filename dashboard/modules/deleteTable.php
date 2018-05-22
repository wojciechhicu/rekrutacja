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
        $delete = $_POST['delete'];
        if($delete === "typ_szkoly" || $delete === "logs" || $delete === "admin" || $delete === "users" || $delete === "punktacja" || $delete ==="dane_kandydata")
        {
            exit();
        }
        else
        {

            
            $sql = "DROP TABLE ".$delete;

            $query = mysqli_query($conn,$sql);
            if($sql)
            {
                echo("Usunięto bazę: ".$delete);

                $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
                $logSql = mysqli_query($conn,"INSERT INTO logs SET log_who='$adminLogin',log_whichDB='$delete', log_ip='$ip', log_type='usun tabele', efekt='success'");

                if($logSql)
                {
                    echo("yep");
                }
                else
                {
                    echo(mysqli_errno($conn));
                }
            }
            else
            {
                echo("Nie udało się usunąć bazy: ".$delete);
            }
        }//end if else
    } //endrow
	else
	{
		exit("Sesja zakończona, zaloguj ponownie");
	}//end row else
}//end isset
else
{
	exit("Sesja zakończona, zaloguj ponownie");
}//end isset else
?>