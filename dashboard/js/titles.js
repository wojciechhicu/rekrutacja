$(document).ready(function(){
	function title(id,text){
		$(id).click(function(){
			$("#title").html("Panel admin - " + text);
		});
	}

	title("#home","Home");
	title("#users","Użytkownicy");
	title("#candidates","Kandydaci");
	title("#database","Baza danych");
});