$(document).ready(function(){
	$("#submit").click(function(event){
		var $login = $("#login").val();
		var $pass = $("#pass").val();
		var $text = $("#action");

		if($login.length < 6 || $login.length > 16)
			{
				$text.html("<span style='color:red;'>Niepoprawny login</span>");
				event.preventDefault();
			}

		if($pass.length < 6 || $pass.length > 16)
			{
				$text.html("<span style='color:red;'>Hasło niepoprawne</span>");
				event.preventDefault();
			}
		
	});
});