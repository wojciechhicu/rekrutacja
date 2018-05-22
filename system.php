<?php
session_start();
require_once("database.php");

//variables with session created in login.php
$login = mysqli_real_escape_string($conn, $_SESSION['login']);
$password = mysqli_real_escape_string($conn, $_SESSION['pass']);

//if isset variables then look for them in db
if(isset($login) && isset($password))
{

	
	//searching in db
	$query_login = mysqli_query($conn, "SELECT login, password FROM users WHERE login='$login' AND password='$password'");
	$rows_login_try = mysqli_num_rows($query_login);
	
	if($rows_login_try == 1)
	{
		//if there is account don't do anything; else back to log in page
	}
	else
	{
		session_destroy();
		header("Location: index.php");
		exit();
	}
}
else
{
    session_destroy();
	header("Location: index.php");
	exit();
}
?>
<html ng-app="myApp">

<head>
    <meta charset="utf-8" />
    <title id="title">System rekrutacji ZST Leżajsk</title>
    <!--Styles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" type="text/css" href="css/submain.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Scripts-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<body>
    <div class="sidebar">
        <div id="leftside-navigation">
            <ul class="sidebarUlList">
                <li class="sidebarLiList">
                    <a class="sidebarLink" id="kierunki" href="#kierunki_lista">Kierunki-lista</a>
                 </li>

                <li class="sidebarLiList">
                    <a class="sidebarLink" id="kandydat" href="#dodaj_kandydata">Dodaj kandydata</a>
                </li>

                 <li class="sidebarLiList">
                    <a class="sidebarLink" id="lista" href="#lista_kandydatow">Lista kandydatów</a>
                </li>

                <li class="sidebarLiList">
                    <a class="sidebarLink" id="przyjeci" href="#lista_przyjetych">Lista przyjętych</a>
                </li>

                <li class="sidebarLiList">
                    <a class="sidebarLink" id="zestawienie" href="#zestawienie_zawodow">Zestawienie zawodów</a>
                </li>

                <li class="sidebarLiList">
                    <a class="sidebarLink" href="logout.php">Wyloguj</a>
                </li>

                <li class="sidebarLiList">
                    <a class="login">Zalogowano jako: <?php echo($_SESSION['login']);?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex-content" ng-view></div><!-- Main container -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
    
    <!-- Created scripts-->

    <script src="js/scripts.js"></script>
    <script src="js/title.js"></script>
</body>
</html>
