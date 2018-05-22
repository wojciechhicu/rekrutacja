<?php
require_once("../../database.php");

$users = mysqli_query($conn, "SELECT id, login, pin FROM users");
$rows = mysqli_num_rows($users);

if( $rows > 0 )
{
	echo"<table id='table'>";
	echo "<tr><td colspan='3'>Użytkownicy w bazie danych</td></tr>";
	echo "<tr><td>ID</td><td>Login</td><td>PIN</td></tr>";
	while($r = mysqli_fetch_assoc($users))
	{
		echo "<tr><td>".$r['id']."</td>";
		echo "<td>".$r['login']."</td>";
		echo "<td>".$r['pin']."</tr></td>";
	}




	echo "</table>";
}
?>