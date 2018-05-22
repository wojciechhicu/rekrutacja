<?php
require_once("../database.php");
require_once("../functions.php");
if(!empty($_POST['przyjety']))
{	
	$typ_kierunek = $_POST['przyjety'];

	//tworzę zapytanie wyświetlające odpowiednie kierunki
	$wynik = mysqli_query($conn, "SELECT dane_kandydata.lp, dane_kandydata.imie, dane_kandydata.nazwisko, 
	dane_kandydata.imie_ojca, punktacja.suma_punkty, punktacja.przyjety, punktacja.kopia
	FROM dane_kandydata LEFT JOIN punktacja ON dane_kandydata.pesel=punktacja.pesel 
	WHERE (punktacja.przyjety='$typ_kierunek') ORDER BY suma_punkty DESC;")or die('Błąd zapytania');

	if(mysqli_num_rows($wynik) > 0) 
	{
		echo "<table cellpadding=\"6\" border=0>";
		echo "<td bgcolor=#669999> Lp </td>";
		echo "<td bgcolor=#669999> IMIĘ </td>";
		echo "<td bgcolor=#669999> NAZWISKO </td>";
		echo "<td bgcolor=#669999> IMIĘ OJCA </td>";
		echo "<td bgcolor=#669999> SUMA PUNKTÓW</td>";
		echo "<td bgcolor=#669999> Przyjęty </td>";
		echo "<td bgcolor=#669999> ŚWIADECTWO </td>";
		$i=0;
	   while($r = mysqli_fetch_array($wynik)) //petla wyswietla dane z bazy
		{
			if ($i%2==0) $kolor='#99cccc'; else $kolor='white';
			echo "<tr bgcolor=$kolor>";
			echo "<td>".$r['lp']++."</td>";
			echo "<td>".$r['imie']."</td>";
			echo "<td>".$r['nazwisko']."</td>";
			echo "<td>".$r['imie_ojca']."</td>";
			echo "<td>".$r['suma_punkty']."</td>";
			echo "<td>".$r['przyjety']."</td>";
			echo "<td>".$r['kopia']."</td>";
			echo "</tr>";
			$i++;
			$lp=1;
		}
		echo "</table>";
		
		echo"<form action='pdf_lista_przyjetych.php' method='POST' name='lista'>";	//Formularz pobiera wartosc
		echo"<input type='hidden' value='".$_POST['przyjety']."' name='koronka' id='koronka'>"; 
		echo"<input  type='submit'class='submit_lista' id='koroneczka' value='Drukuj'/>";
		echo"</form>";
	}
	else
	{
		//echo("Brak przyjętych uczniów na ten kierunek");
	}
}

?>