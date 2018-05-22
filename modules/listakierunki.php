<?php
require_once("../database.php");
$typ_szkoly=$_POST['kierunek'];
 echo "<h3>".$typ_szkoly."</h3>";

 $wynik = mysqli_query($conn, "SELECT dane_kandydata.lp, dane_kandydata.imie, dane_kandydata.nazwisko, 
 dane_kandydata.imie_ojca, dane_kandydata.pesel, 
 punktacja.suma_punkty, punktacja.typ1, punktacja.typ2, punktacja.typ3, punktacja.kopia, punktacja.przyjety
 FROM dane_kandydata LEFT JOIN punktacja ON dane_kandydata.pesel=punktacja.pesel 
 WHERE (punktacja.typ1='$typ_szkoly') ORDER BY lp ASC;")or die('Błąd zapytania');

//wyświetlam dane z bazy
 if(mysqli_num_rows($wynik) > 0) 
 {
    echo "<table cellpadding='1' class='listTableOne'>";
 	echo "<tr class='kierunekListaKand'><td> Lp </td>";
 	echo "<td> IMIĘ </td>";
 	echo "<td> NAZWISKO </td>";
 	echo "<td> PESEL </td>";
 	echo "<td> IMIĘ OJCA </td>";
 	echo "<td> SUMA PUNKTÓW</td>";
 	echo "<td> Typ I </td>";
 	echo "<td> Typ II </td>";
 	echo "<td> Typ III </td>";
 	echo "<td> ŚWIADECTWO </td>";
 	echo "<td> PRZYJĘTY DO </td>";
 	echo "<td> EDYCJA/PRZYJMIJ</td>";
 	echo "<td> USUŃ </td></tr>";
 	$i=0;
 	$lp=1;
     //wyświetlan kandydatów
 	while($r = mysqli_fetch_array($wynik))// petla wyswietla dane z bazy
 	{
        echo "<tr class='kierunekListaKand'>";
 		echo "<td>".$lp++."</td>";
        echo "<td>".$r['imie']."</td>";
        echo "<td>".$r['nazwisko']."</td>";
 		echo "<td>".$r['pesel']."</td>";
 		echo "<td>".$r['imie_ojca']."</td>";
 		echo "<td>".$r['suma_punkty']."</td>";
 		echo "<td>".$r['typ1']."</td>";
 		echo "<td>".$r['typ2']."</td>";
 		echo "<td>".$r['typ3']."</td>";
 		echo "<td>".$r['kopia']."</td>";
 		echo "<td>".$r['przyjety']."</td>";
 		
        //wyświetlam selecta zmiany przyjęcia wraz z data-zmien pesel aby móc się odwołać
        echo "<td>
            <select class='edycja'>
                    <option data-zmien=". $r['pesel']." value='t.mech.poj.samochodowy'>t.mech.poj.samochodowy</option>
                    <option data-zmien=". $r['pesel']." value='t.elektronik'>t.elektronik</option>
                    <option data-zmien=". $r['pesel']." value='t.informatyk'>t.informatyk</option>
                    <option data-zmien=". $r['pesel']." value='t.mechatronik'>t.mechatronik</option>
                    <option data-zmien=". $r['pesel']." value='t.urz.i.s.en.odnawialnej'>t.urz.i.s.en.odnawialnej</option>
                    <option data-zmien=". $r['pesel']." value='t.mech.spawacz'>t.mech.spawacz</option>
                    <option data-zmien=". $r['pesel']." value='t.mech.cad/cam'>t.mech.cad/cam</option>
                    <option data-zmien=". $r['pesel']." value='t.żyw.i.us.gastronomicznych'>t.żyw.i.us.gastronomicznych</option>
                    <option data-zmien=". $r['pesel']." value='t.mech.rolnictwa'>t.mech.rolnictwa</option>
                    <option data-zmien=". $r['pesel']." value='t.hotelarz'>t.hotelarz</option>
                    <option data-zmien=". $r['pesel']." value='t.handlowiec'>t.handlowiec</option>
                    <option data-zmien=". $r['pesel']." value='zsz.mech.poj.samochodowych'>zsz.mech.poj.samochodowych</option>
                    <option data-zmien=". $r['pesel']." value='zsz.op.ob.skrawających'>zsz.op.ob.skrawających</option>
                    <option data-zmien=". $r['pesel']." value='zsz.stolarz'>zsz.stolarz</option>
                    <option data-zmien=". $r['pesel']." value='zsz.elektryk'>zsz.elektryk</option>
                    <option data-zmien=". $r['pesel']." value='zsz.murarz-tynkarz'>zsz.murarz-tynkarz</option>
                    <option data-zmien=". $r['pesel']." value='zsz.ślusarz'>zsz.ślusarz</option>
                    <option data-zmien=". $r['pesel']." value='zsz.mech.op.poj.i.m.rolnicznych'>zsz.mech.op.poj.i.m.rolnicznych</option>
                    <option data-zmien=". $r['pesel']." value='zsz.sprzedawca'>zsz.sprzedawca</option>
                    <option data-zmien=". $r['pesel']." value='zsz.fryzjer'>zsz.fryzjer</option>
                    <option data-zmien=". $r['pesel']." value='zsz.cukiernik'>zsz.cukiernik</option>
                    <option data-zmien=". $r['pesel']." value='zsz.piekarz'>zsz.piekarz</option>
                    <option data-zmien=". $r['pesel']." value='zsz.kucharz'>zsz.kucharz</option>
            </select>
        </td>";
 		echo "<td><button data-usun=".$r['pesel']." class='usun'>USUŃ</button></td>";
 		echo "</tr>";
 		$i++;
     }
 	   echo "</table>";
//	    if (isset($_POST['execute']))
//		 {
//		 	$pesel_post=$_POST['pesel_hiden'];
//		 	$przyjety=$_POST['przyjety'];
//		 	echo $_POST['pesel_hiden'];
//		 	echo $przyjety;
//		 	echo 'zmienna pesel_post'; 
//		 	echo $pesel_post;
//		 	$edycja=mysql_query("UPDATE punktacja SET przyjety='$przyjety' WHERE punktacja.pesel='$pesel_post';");
//			
//		 		//if($dodaj_punkty) 
//		 		//$_POST['kierunek']=$_POST['przyjety'];
//		 		//include("t_elektronik.php");
//		 		//echo file_POST_contents('view_t_elektronik.php');
//		 		//echo file_POST_contents('view_t_elektronik.php');	
//		 		//else echo "Blad nie udało się dodać punktów kandydata";	
//	
//		 }				
}		
	
/*	if (isset($_POST['execute']))
		{
		echo 'Nacisnales na przycisk!';
		}
		<form action="index.php" method="post">
		<input type="hidden" name="execute" value="true">
		<input type="submit" value="Kliknij">
		</form>
*/
?> 


	
	
	
	
	
	
