<?php
session_start();
require_once("database.php");

@$login = mysqli_real_escape_string($conn, $_SESSION['login']);
@$pass = mysqli_real_escape_string($conn, $_SESSION['pass']);
if(isset($login) && isset($pass))
{
	
	$search = mysqli_query($conn,"SELECT login, password FROM users WHERE login='$login' && password='$pass'");
	$rowsSearch = mysqli_num_rows($search);
	
	if($rowsSearch === 1)
	{
		header("Location: system.php");//If there is $_SESSION['login'] && pass then auto log in
		exit();
	}
}
?>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <meta name="author" content="Wojciech Marek">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="Zst, lezajsk, system, rekrutowania" />
    <meta name="description" content="System rekrutacji ZST Leżajsk" />
	<title>Logowanie do systemu</title>
	<!--Styles--> 
	<link rel="Stylesheet" type="text/css" href="css/main.css" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="Shortcut icon" href="images/icons/login.png" />
	<!--Scripts-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="js/validation_index.js"></script>
	
</head>
<body>
    <div class="container">
       <div class="flex-center">
            <form action="login.php" method="POST">

                Zaloguj do systemu rekrutacji
                <input class="input" name="login" type="text" id="login" placeholder="Login">
                <input class="input" name="pass" type="password" id="pass" placeholder="Hasło">
                <button type="submit" class="button" id="submit" title="Zaloguj">Zaloguj</button>

        <div class="error"></div>
        <div class="result"></div>
           </form>
    </div>
    </div><!--End of container-->
</body>
</html>