$(document).ready(function(){
	$("#submit").click(function(event){
		var login = $("#login").val();
		var pass = $("#pass").val();
		
		
		if(login.length < 3 || pass.length <6 || (login.length < 3 && pass.length <6))
		{
			$(".error").html("Wprowadzone dane są niepoprawne");
			event.preventDefault();
		}
		else{
			$(".error").html("");
			$(".result").html("Logowanie...");
		}
	});
	
});