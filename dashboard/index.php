<?php
session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>System rekrutacji ZST - panel admin</title>
	<link rel="Stylesheet" type="text/css" href="css/style.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
</head>
<body>
<div class="body">
</div>
	<div class="login">
		<form action="login.php" method="POST">
			
			<div class="header">Logowanie jako Administrator</div>
			<input class="focus text" id="login" type="text" placeholder="Login" name="login"><br>
			<input class="focus pass" id="pass" type="password" placeholder="Hasło" name="pass"><br>
			<input id="submit" class="button" type="submit" value="Login">

			<div id="action" class="action"></div>
		</form>
	</div>
</body>
</html>