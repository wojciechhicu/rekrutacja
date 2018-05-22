<?php
include("../mpdf60/mpdf.php");
//////////////////////// FUNKCJE SUMUJACE ////////////////////////////////
$pdf_box="";
function OryginalKopia($kierunek,$kopia)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);

	$oryginal = mysqli_query($conn ,"SELECT COUNT(*)FROM punktacja WHERE kopia='$kopia' AND przyjety='$kierunek'");
	$r = mysqli_fetch_array($oryginal);
	return $r[0];
}
//------------------------------JEZYKI----------------
function Jezyk($kierunek,$jezyk)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);

	$oryginal = mysqli_query($conn , "SELECT COUNT(*)FROM punktacja WHERE j1_wybrany='$jezyk' AND przyjety='$kierunek'");
	$r = mysqli_fetch_array($oryginal);
	return $r[0];
}
//--------------------------- Suma swiadect ---------------
function Suma($kierunek)
{
	$user = "root";
	$host = "localhost";
	$password = "";
	$db = "rekrutacja";
	$conn = mysqli_connect($host,$user,$password,$db);
	$oryginal = mysqli_query($conn, "SELECT COUNT(kopia)FROM punktacja WHERE przyjety='$kierunek'");
	$r = mysqli_fetch_array($oryginal);
	return $r[0];
}
////////////////////////////////////////////////////////////




	$pdf_box.= "<fieldset>";
	$pdf_box.="<legend class='legenda'>TECHNIKUM</legend>";
    $pdf_box.= "<table cellpadding=\"6\" border=0>";
    $pdf_box.= "<tr>";
	$pdf_box.= "<td bgcolor=#669999> NAZWA KIERUNKU </td>";
	$pdf_box.= "<td bgcolor=#669999> ORGINAŁ </td>";
	$pdf_box.= "<td bgcolor=#669999> KOPIA </td>";
	$pdf_box.= "<td bgcolor=#669999> JĘZYK-angielski</td>";
	$pdf_box.= "<td bgcolor=#669999> JĘZYK-niemiecki </td>";
	$pdf_box.= "<td bgcolor=#669999> JĘZYK-rosyjski </td>";
	$pdf_box.= "<td bgcolor=#669999> JĘZYK-francuski </td>";
	$pdf_box.= "<td bgcolor=#669999> SUMA kopia+orginał </td>";
	$pdf_box.= "</tr>";
	$i=0;

		if ($i%2==0) $kolor='#99cccc'; else $kolor='white';
        $pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik pojazdów samochodowych</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('t.mech.poj.samochodowy','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('t.mech.poj.samochodowy','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.mech.poj.samochodowy','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.mech.poj.samochodowy','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.mech.poj.samochodowy','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.mech.poj.samochodowy','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('t.mech.poj.samochodowy'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Technik elektronik</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('t.elektronik','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('t.elektronik','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.elektronik','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.elektronik','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.elektronik','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('t.elektronik','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('t.elektronik'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik informatyk</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.informatyk','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.informatyk','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.informatyk','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.informatyk','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.informatyk','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.informatyk','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=SUMA('t.informatyk'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Technik mechatronik</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mechatronik','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mechatronik','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mechatronik','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mechatronik','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mechatronik','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mechatronik','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.mechatronik'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik urz. i sys. energetyki odnawialne</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.urz.i.s.en.odnawialnej','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.urz.i.s.en.odnawialnej','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.urz.i.s.en.odnawialnej','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.urz.i.s.en.odnawialnej','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.urz.i.s.en.odnawialnej','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.urz.i.s.en.odnawialnej','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.urz.i.s.en.odnawialnej'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Technik mechanik spec.spawalnictwo</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.spawacz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.spawacz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.spawacz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.spawacz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.spawacz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.spawacz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.mech.spawacz'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik mech.spec. projektowanie i wytwarzanie CAD/CAM</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.cad/cam','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.cad/cam','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.cad/cam','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.cad/cam','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.cad/cam','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.cad/cam','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=SUMA('t.mech.cad/cam'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Technik żywienia i usług gastronomicznych</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.zyw.i.us.gastronomicznych','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.zyw.i.us.gastronomicznych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.zyw.i.us.gastronomicznych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.zyw.i.us.gastronomicznych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.zyw.i.us.gastronomicznych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.zyw.i.us.gastronomicznych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.zyw.i.us.gastronomicznych'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik mechanizacji rolnictwa</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.rolnictwa','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.mech.rolnictwa','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.rolnictwa','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.rolnictwa','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.rolnictwa','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.mech.rolnictwa','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.mech.rolnictwa'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Technik hotelarstwa</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.hotelarz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.hotelarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.hotelarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.hotelarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.hotelarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.hotelarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.hotelarz'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Technik handlowiec</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.handlowiec','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=oryginalKopia('t.handlowiec','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.handlowiec','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.handlowiec','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.handlowiec','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Jezyk('t.handlowiec','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>";  $pdf_box.=Suma('t.handlowiec'); $pdf_box.= "</td>";
		$pdf_box.= "</tr>";
		$i++;
  
    $pdf_box.= "</table>";
	$pdf_box.= "</fieldset>";
	

	$mpdf=new mPDF();
	$mpdf->WriteHtml($pdf_box);
	$archiwum="zestawienie_zawodowe.pdf";
	$mpdf->Output($archiwum,'D');
	
?>
