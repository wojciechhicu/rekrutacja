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
	
	$oryginal = mysqli_query($conn, "SELECT COUNT(*)FROM punktacja WHERE kopia='$kopia' AND przyjety='$kierunek';");
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

	$oryginal = mysqli_query($conn, "SELECT COUNT(*)FROM punktacja WHERE j1_wybrany='$jezyk' AND przyjety='$kierunek';");
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

	$oryginal = mysqli_query($conn, "SELECT COUNT(kopia)FROM punktacja WHERE przyjety='$kierunek';");
	$r = mysqli_fetch_array($oryginal);
	return $r[0];
}
////////////////////////////////////////////////////////////




	$pdf_box.= "<fieldset>";
	$pdf_box.="<legend class='legenda'>SZKOŁA BRANŻOWA</legend>";
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
        $pdf_box.= "<td>Operator obrabiarek skrawających</td>";
		$pdf_box.= "<td>"; oryginalKopia('t.handlowiec','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.op.ob.skrawajacych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('tzsz.op.ob.skrawajacych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.op.ob.skrawajacych'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Stolarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.stolarz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.stolarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.stolarz'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Elektryk</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.elektryk','oryginal'); $pdf_box.= "</td>";		
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.elektryk','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.elektryk'); $pdf_box.= "</td>";		
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Murarz-tynkarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.murarz-tynkarz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.murarz-tynkarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.murarz-tynkarz'); $pdf_box.= "</td>";		
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Ślusarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.slusarz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.slusarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zzsz.slusarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.slusarz'); $pdf_box.= "</td>";	
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Mechanik-operator pojazdów i maszyn rolniczych</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.mech.op.poj.i.m.rolnicznych','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.mech.op.poj.i.m.rolnicznych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.mech.op.poj.i.m.rolnicznych'); $pdf_box.= "</td>";	
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Mechanik pojazdów samochodowych</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.mech.poj.samochodowych','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.mech.poj.samochodowych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.mech.poj.samochodowych'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Sprzedawca</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.sprzedawca','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.sprzedawca','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.sprzedawca'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Fryzjer</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.fryzjer','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.fryzjer','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.fryzjer'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Cukiernik</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.cukiernik','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.cukiernik','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.cukiernik'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Piekarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.piekarz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.piekarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.piekarz'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Kucharz</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.kucharz','oryginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=oryginalKopia('zsz.kucharz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.kucharz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.kucharz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.kucharz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.kucharz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.kucharz'); $pdf_box.= "</td>";	
		$pdf_box.= "</tr>";
		$i++;
    $pdf_box.= "</table>";
	$pdf_box.= "</fieldset>";
	

	$mpdf=new mPDF();
	$mpdf->WriteHtml($pdf_box);
	$archiwum="Zestawienie_branzow.pdf";
	$mpdf->Output($archiwum,'D');
	
?>
