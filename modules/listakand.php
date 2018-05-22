<?php
require_once("../database.php");

$wynik = mysqli_query($conn, "SELECT dane_kandydata.pesel, dane_kandydata.lp, dane_kandydata.imie, dane_kandydata.nazwisko, dane_kandydata.imie_ojca, 
dane_kandydata.plec, punktacja.suma_punkty, punktacja.typ1, punktacja.typ2, punktacja.typ3, punktacja.kopia, 
punktacja.przyjety
FROM dane_kandydata LEFT JOIN punktacja ON dane_kandydata.pesel=punktacja.pesel ORDER BY suma_punkty DESC;")
or die('Błąd zapytania');

if(mysqli_num_rows($wynik) > 0) 
{
    echo "<table id='searchTable' class='listTable'";
	
    echo "<th class='th'>";
    echo "<td class=''> Lp </td>";
	echo "<td class=''> IMIĘ </td>";
	echo "<td class=''> NAZWISKO </td>";
	echo "<td class=''> IMIĘ OJCA </td>";
	echo "<td class=''> SUMA PUNKTÓW</td>";
	echo "<td class=''> Typ I </td>";
	echo "<td class=''> Typ II </td>";
	echo "<td class=''> Typ III </td>";
	echo "<td class=''> ŚWIADECTWO </td>";
	echo "<td class=''> PRZYJĘTY </td>";
	echo "<td class=''> EDYCJA </td>";
	echo "<td class=''> PŁEĆ </td></th>";
	
	$lp=1;
    while($r = mysqli_fetch_array($wynik)) //petla wyswietla dane z bazy
	{
        echo "<tr class='kandydat'>";
		echo "<td class='tr'>".$lp++."</td>";
        echo "<td class='tr'>".$r['imie']."</td>";
        echo "<td class='tr'>".$r['nazwisko']."</td>";
		echo "<td class='tr'>".$r['imie_ojca']."</td>";
		echo "<td class='tr'>".$r['suma_punkty']."</td>";
		echo "<td class='tr'>".$r['typ1']."</td>";
		echo "<td class='tr'>".$r['typ2']."</td>";
		echo "<td class='tr'>".$r['typ3']."</td>";
		echo "<td class='tr'>".$r['kopia']."</td>";
		echo "<td class='tr'>".$r['przyjety']."</td>";
		echo "<td class='tr'><button class='edycja' data-pesel=".$r['pesel'].">edytuj</button></td>";
		echo "<td class='tr'>".$r['plec']."</td></tr>";
    }
    echo "</table>";
}

?>