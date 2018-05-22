<?php
session_start();
require_once("../database.php");
$login = mysqli_real_escape_string($conn, $_SESSION['loginAdmin']);
$pass = mysqli_real_escape_string($conn, $_SESSION['passAdmin']);

$search = mysqli_query($conn,"SELECT login, pass FROM admin WHERE login='$login' AND pass='$pass'");
$rows = mysqli_num_rows($search);

if($rows !== 1)
{
	header("Location: index.php");
	exit();
}
?>
<html ng-app="myApp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title id="title">Panel admin - Home</title>
	<link rel="Stylesheet" type="text/css" href="css/dashboard.css" />

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
	<script type="text/javascript" src="js/dashboard.js"></script>
	<script type="text/javascript" src="js/titles.js"></script>
</head>
<body>
<div class="menu">
    <a id="home" href="#/" class="btn">Home</a>
    <a id="users" href="#uzytkownicy" class="btn">Użytkownicy</a>
    <a id="candidates" href="#kandydaci" class="btn">kandydaci</a>
    <a id="database" href="#baza" class="btn">baza danych</a>
    <a href="logout.php" class="btn">wyloguj</a>
</div>
<div class="content">
	<div ng-view></div>
</div>
</div>
</body>
</html>