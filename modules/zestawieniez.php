<?php
session_start();

//////////////////////// FUNKCJE SUMUJACE ////////////////////////////////
function OrginalKopia($kierunek,$kopia)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);

	$orginal = mysqli_query($conn ,"SELECT COUNT(*)FROM punktacja WHERE kopia='$kopia' AND przyjety='$kierunek'");
	$r = mysqli_fetch_array($orginal);
	echo $r[0];
}
//------------------------------JEZYKI----------------
function Jezyk($kierunek,$jezyk)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);

	$orginal = mysqli_query($conn , "SELECT COUNT(*)FROM punktacja WHERE j1_wybrany='$jezyk' AND przyjety='$kierunek'");
	$r = mysqli_fetch_array($orginal);
	echo $r[0];
}
//--------------------------- Suma swiadect ---------------
function Suma($kierunek)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);
	$orginal = mysqli_query($conn, "SELECT COUNT(kopia)FROM punktacja WHERE przyjety='$kierunek'");
	$r = mysqli_fetch_array($orginal);
	echo $r[0];
}
////////////////////////////////////////////////////////////
	echo "<fieldset class='fieldsetKierunki highter' id='fieldOne'>";
	echo"<legend class='legenda'>TECHNIKUM</legend>";
    echo "<table cellpadding=\"6\" border=0>";
	echo "<td bgcolor=#669999> NAZWA KIERUNKU </td>";
	echo "<td bgcolor=#669999> ORGINAŁ </td>";
	echo "<td bgcolor=#669999> KOPIA </td>";
	echo "<td bgcolor=#669999> JĘZYK-angielski</td>";
	echo "<td bgcolor=#669999> JĘZYK-niemiecki </td>";
	echo "<td bgcolor=#669999> JĘZYK-rosyjski </td>";
	echo "<td bgcolor=#669999> JĘZYK-francuski </td>";
	echo "<td bgcolor=#669999> SUMA kopia+orginał </td>";
	$i=0;

		if ($i%2==0) $kolor='#99cccc'; else $kolor='white';
        echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik pojazdów samochodowych</td>";
				echo "<td>"; OrginalKopia('t.mech.poj.samochodowy','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.mech.poj.samochodowy','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.poj.samochodowy','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.poj.samochodowy','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.poj.samochodowy','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.poj.samochodowy','francuski'); echo "</td>";
				echo "<td>"; Suma('t.mech.poj.samochodowy'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Technik elektronik</td>";
				echo "<td>"; OrginalKopia('t.elektronik','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.elektronik','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.elektronik','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.elektronik','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.elektronik','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.elektronik','francuski'); echo "</td>";
				echo "<td>"; Suma('t.elektronik'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik informatyk</td>";
				echo "<td>"; OrginalKopia('t.informatyk','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.informatyk','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.informatyk','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.informatyk','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.informatyk','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.informatyk','francuski'); echo "</td>";
				echo "<td>"; SUMA('t.informatyk'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Technik mechatronik</td>";
				echo "<td>"; OrginalKopia('t.mechatronik','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.mechatronik','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.mechatronik','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.mechatronik','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.mechatronik','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.mechatronik','francuski'); echo "</td>";
				echo "<td>"; Suma('t.mechatronik'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik urz. i sys. energetyki odnawialne</td>";
				echo "<td>"; OrginalKopia('t.urz.i.s.en.odnawialnej','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.urz.i.s.en.odnawialnej','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.urz.i.s.en.odnawialnej','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.urz.i.s.en.odnawialnej','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.urz.i.s.en.odnawialnej','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.urz.i.s.en.odnawialnej','francuski'); echo "</td>";
				echo "<td>"; Suma('t.urz.i.s.en.odnawialnej'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Technik mechanik spec.spawalnictwo</td>";
				echo "<td>"; OrginalKopia('t.mech.spawacz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.mech.spawacz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.spawacz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.spawacz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.spawacz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.spawacz','francuski'); echo "</td>";
				echo "<td>"; Suma('t.mech.spawacz'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik mech.spec. projektowanie i wytwarzanie CAD/CAM</td>";
				echo "<td>"; OrginalKopia('t.mech.cad/cam','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.mech.cad/cam','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.cad/cam','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.cad/cam','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.cad/cam','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.cad/cam','francuski'); echo "</td>";
				echo "<td>"; SUMA('t.mech.cad/cam'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Technik żywienia i usług gastronomicznych</td>";
				echo "<td>"; OrginalKopia('t.zyw.i.us.gastronomicznych','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.zyw.i.us.gastronomicznych','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.zyw.i.us.gastronomicznych','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.zyw.i.us.gastronomicznych','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.zyw.i.us.gastronomicznych','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.zyw.i.us.gastronomicznych','francuski'); echo "</td>";
				echo "<td>"; Suma('t.zyw.i.us.gastronomicznych'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik mechanizacji rolnictwa</td>";
				echo "<td>"; OrginalKopia('t.mech.rolnictwa','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.mech.rolnictwa','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.rolnictwa','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.rolnictwa','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.rolnictwa','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.mech.rolnictwa','francuski'); echo "</td>";
				echo "<td>"; Suma('t.mech.rolnictwa'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Technik hotelarstwa</td>";
				echo "<td>"; OrginalKopia('t.hotelarz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.hotelarz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.hotelarz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.hotelarz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.hotelarz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.hotelarz','francuski'); echo "</td>";
				echo "<td>"; Suma('t.hotelarz'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Technik handlowiec</td>";
				echo "<td>"; OrginalKopia('t.handlowiec','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('t.handlowiec','kopia'); echo "</td>";
				echo "<td>"; Jezyk('t.handlowiec','angielski'); echo "</td>";
				echo "<td>"; Jezyk('t.handlowiec','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('t.handlowiec','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('t.handlowiec','francuski'); echo "</td>";
				echo "<td>"; Suma('t.handlowiec'); echo "</td>";
		echo "</tr>";
		$i++;
  
    echo "</table>";
    ?>





<?php
	echo "</fieldset>";



//SZKOŁA BRANŻOWA
	echo "<fieldset class='fieldsetKierunki highter' id='fieldTwo'>";
	echo"<legend class='legenda'>SZKOŁA BRANŻOWA</legend>";
    echo "<table cellpadding=\"6\" border=0>";
	echo "<td bgcolor=#669999> NAZWA KIERUNKU </td>";
	echo "<td bgcolor=#669999> ORGINAŁ </td>";
	echo "<td bgcolor=#669999> KOPIA </td>";
	echo "<td bgcolor=#669999> JĘZYK-angielski</td>";
	echo "<td bgcolor=#669999> JĘZYK-niemiecki </td>";
	echo "<td bgcolor=#669999> JĘZYK-rosyjski </td>";
	echo "<td bgcolor=#669999> JĘZYK-francuski </td>";
	echo "<td bgcolor=#669999> SUMA kopia+orginał </td>";
	$i=0;
		if ($i%2==0) $kolor='#99cccc'; else $kolor='white';
        echo "<tr bgcolor=#99cccc>";
        echo "<td>Operator obrabiarek skrawających</td>";
		echo "<td>"; OrginalKopia('t.handlowiec','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.op.ob.skrawajacych','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.op.ob.skrawajacych','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.op.ob.skrawajacych','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.op.ob.skrawajacych','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('tzsz.op.ob.skrawajacych','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.op.ob.skrawajacych'); echo "</td>";
		echo "<tr bgcolor='white'>";
        echo "<td>Stolarz</td>";
				echo "<td>"; OrginalKopia('zsz.stolarz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.stolarz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.stolarz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.stolarz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.stolarz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.stolarz','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.stolarz'); echo "</td>";
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Elektryk</td>";
				echo "<td>"; OrginalKopia('zsz.elektryk','orginal'); echo "</td>";		
				echo "<td>"; OrginalKopia('zsz.elektryk','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.elektryk','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.elektryk','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.elektryk','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.elektryk','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.elektryk'); echo "</td>";		
		echo "<tr bgcolor='white'>";
        echo "<td>Murarz-tynkarz</td>";
				echo "<td>"; OrginalKopia('zsz.murarz-tynkarz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.murarz-tynkarz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.murarz-tynkarz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.murarz-tynkarz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.murarz-tynkarz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.murarz-tynkarz','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.murarz-tynkarz'); echo "</td>";		
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Ślusarz</td>";
				echo "<td>"; OrginalKopia('zsz.slusarz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.slusarz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.slusarz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.slusarz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zzsz.slusarz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.slusarz','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.slusarz'); echo "</td>";	
		echo "<tr bgcolor='white'>";
        echo "<td>Mechanik-operator pojazdów i maszyn rolniczych</td>";
				echo "<td>"; OrginalKopia('zsz.mech.op.poj.i.m.rolnicznych','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.mech.op.poj.i.m.rolnicznych','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.op.poj.i.m.rolnicznych','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.op.poj.i.m.rolnicznych','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.op.poj.i.m.rolnicznych','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.op.poj.i.m.rolnicznych','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.mech.op.poj.i.m.rolnicznych'); echo "</td>";	
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Mechanik pojazdów samochodowych</td>";
				echo "<td>"; OrginalKopia('zsz.mech.poj.samochodowych','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.mech.poj.samochodowych','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.poj.samochodowych','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.poj.samochodowych','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.poj.samochodowych','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.mech.poj.samochodowych','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.mech.poj.samochodowych'); echo "</td>";			
		echo "<tr bgcolor='white'>";
        echo "<td>Sprzedawca</td>";
				echo "<td>"; OrginalKopia('zsz.sprzedawca','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.sprzedawca','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.sprzedawca','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.sprzedawca','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.sprzedawca','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.sprzedawca','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.sprzedawca'); echo "</td>";			
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Fryzjer</td>";
				echo "<td>"; OrginalKopia('zsz.fryzjer','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.fryzjer','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.fryzjer','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.fryzjer','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.fryzjer','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.fryzjer','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.fryzjer'); echo "</td>";			
		echo "<tr bgcolor='white'>";
        echo "<td>Cukiernik</td>";
				echo "<td>"; OrginalKopia('zsz.cukiernik','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.cukiernik','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.cukiernik','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.cukiernik','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.cukiernik','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.cukiernik','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.cukiernik'); echo "</td>";			
		echo "<tr bgcolor=#99cccc>";
        echo "<td>Piekarz</td>";
				echo "<td>"; OrginalKopia('zsz.piekarz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.piekarz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.piekarz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.piekarz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.piekarz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.piekarz','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.piekarz'); echo "</td>";			
		echo "<tr bgcolor='white'>";
        echo "<td>Kucharz</td>";
				echo "<td>"; OrginalKopia('zsz.kucharz','orginal'); echo "</td>";
				echo "<td>"; OrginalKopia('zsz.kucharz','kopia'); echo "</td>";
				echo "<td>"; Jezyk('zsz.kucharz','angielski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.kucharz','niemiecki'); echo "</td>";
				echo "<td>"; Jezyk('zsz.kucharz','rosyjski'); echo "</td>";
				echo "<td>"; Jezyk('zsz.kucharz','francuski'); echo "</td>";
				echo "<td>"; Suma('zsz.kucharz'); echo "</td>";	
		echo "</tr>";
		$i++;
    echo "</table>";
	echo "</fieldset>";
    

?>