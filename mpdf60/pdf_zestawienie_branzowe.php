<?php
include("mpdf60/mpdf.php");
mysql_connect("localhost", "root", "")or die("Blad polaczenia z serwerem");
mysql_select_db('rekrut')or die("Blad poolaczenia z BAZA");

//////////////////////// FUNKCJE SUMUJACE ////////////////////////////////
$pdf_box="";
function OrginalKopia($kierunek,$kopia)
{
$orginal = mysql_query("SELECT COUNT(*)FROM punktacja WHERE kopia='$kopia' AND przyjety='$kierunek';");
$r = mysql_fetch_array($orginal);
return $r[0];
}
//------------------------------JEZYKI----------------
function Jezyk($kierunek,$jezyk)
{
$orginal = mysql_query("SELECT COUNT(*)FROM punktacja WHERE j1_wybrany='$jezyk' AND przyjety='$kierunek';");
$r = mysql_fetch_array($orginal);
return $r[0];
}
//--------------------------- Suma swiadect ---------------
function Suma($kierunek)
{
$orginal = mysql_query("SELECT COUNT(kopia)FROM punktacja WHERE przyjety='$kierunek';");
$r = mysql_fetch_array($orginal);
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
		$pdf_box.= "<td>"; OrginalKopia('t.handlowiec','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.op.ob.skrawajacych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.op.ob.skrawajacych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('tzsz.op.ob.skrawajacych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.op.ob.skrawajacych'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Stolarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.stolarz','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.stolarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.stolarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.stolarz'); $pdf_box.= "</td>";
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Elektryk</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.elektryk','orginal'); $pdf_box.= "</td>";		
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.elektryk','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.elektryk','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.elektryk'); $pdf_box.= "</td>";		
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Murarz-tynkarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.murarz-tynkarz','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.murarz-tynkarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.murarz-tynkarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.murarz-tynkarz'); $pdf_box.= "</td>";		
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Ślusarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.slusarz','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.slusarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zzsz.slusarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.slusarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.slusarz'); $pdf_box.= "</td>";	
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Mechanik-operator pojazdów i maszyn rolniczych</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.mech.op.poj.i.m.rolnicznych','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.mech.op.poj.i.m.rolnicznych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.op.poj.i.m.rolnicznych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.mech.op.poj.i.m.rolnicznych'); $pdf_box.= "</td>";	
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Mechanik pojazdów samochodowych</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.mech.poj.samochodowych','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.mech.poj.samochodowych','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.mech.poj.samochodowych','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.mech.poj.samochodowych'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Sprzedawca</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.sprzedawca','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.sprzedawca','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.sprzedawca','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.sprzedawca'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Fryzjer</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.fryzjer','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.fryzjer','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.fryzjer','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.fryzjer'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Cukiernik</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.cukiernik','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.cukiernik','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.cukiernik','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.cukiernik'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor=#99cccc>";
        $pdf_box.= "<td>Piekarz</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.piekarz','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.piekarz','kopia'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','angielski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','niemiecki'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','rosyjski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Jezyk('zsz.piekarz','francuski'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=Suma('zsz.piekarz'); $pdf_box.= "</td>";			
		$pdf_box.= "<tr bgcolor='white'>";
        $pdf_box.= "<td>Kucharz</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.kucharz','orginal'); $pdf_box.= "</td>";
				$pdf_box.= "<td>"; $pdf_box.=OrginalKopia('zsz.kucharz','kopia'); $pdf_box.= "</td>";
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
	$archiwum="pdf_zestawienie_zawodowe.pdf";
	$mpdf->Output($archiwum,'D');
	
?>
