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
        //for users table
        $date = date("y_m_d_h_i");
        $DBname = "users_".$date;
        
        $CreateSql = "CREATE TABLE ".$DBname." like users";
        $Create = mysqli_query($conn,$CreateSql);
        
        $FillSql = "INSERT INTO ".$DBname." SELECT * FROM users";
        $Fill = mysqli_query($conn,$FillSql);
        
        
        //for punktacja table
        $date = date("y_m_d_h_i");
        $DBnamePkt = "punktacja_".$date;
        
        $CreateSqlPkt = "CREATE TABLE ".$DBnamePkt." like punktacja";
        $CreatePkt = mysqli_query($conn,$CreateSqlPkt);
        
        $FillSqlPkt = "INSERT INTO ".$DBnamePkt." SELECT * FROM punktacja";
        $FillPkt = mysqli_query($conn,$FillSqlPkt);       
        
        
        //for dane_kandydata table
        $date = date("y_m_d_h_i");
        $DBnameDane = "dane_kandydata_".$date;
        
        $CreateSqlDane = "CREATE TABLE ".$DBnameDane." like dane_kandydata";
        $CreateDane = mysqli_query($conn,$CreateSqlDane);
        
        $FillSqlDane = "INSERT INTO ".$DBnameDane." SELECT * FROM dane_kandydata";
        $FillDane = mysqli_query($conn,$FillSqlDane);
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $query = "INSERT INTO logs SET log_who='$adminLogin', log_whichDB=' punktacja, users, dane_kandydata',log_ip='$ip',log_type='export/backup'";
        
        $log = mysqli_query($conn,$query);
        
        
        $dateDownload = date("y_m_d_h_i");
        $dateDownload = $dateDownload."_users";
        
        $tableName  = 'users';
        $backupFile = "../../htdocs/backup/".$dateDownload.".sql";
        $query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
        $result = mysqli_query($conn,$query);
 
        
        if(mysqli_errno($conn) === 0)
        {
            echo("Udało się");
        }
        else
        {
            echo("Nie udało się wyeksportować");
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
