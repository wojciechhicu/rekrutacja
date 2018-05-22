<?php
function validate($doCzego,$reg)
{
	//$doCzego <- do czego ma odnosić się walidacja
	//$reg <- wyrażenie regularne
	//Jeśli funkcja zwróci 1 to jest poprawne jeśli 0 to jest błąd
	if(preg_match($reg, $doCzego))
	{
		$wynik = 1;
	}
	else
	{
		$wynik = 0;
		exit("<div style='font-size:26px;color:red;'>Niepoprawne dane</div>");
	}

}
//---------------------------------------------
function jezyki($jezyk)
	{
	//funkcja ma za zadanie sprawdzać czy nie było manipulacji w kodzie w "<select>" w polach wyuczonego języka
	$en = "angielski";
	$de = "niemiecki";
	$ru = "rosyjski";
	$fr = "francuski";
	$es = "hiszpański";
	
	$regular = Array($en,$de,$ru,$fr,$es);//wybrane dla języków wyuczonych
	$reg_dl = count($regular);

		for($i=0;$i<$reg_dl;$i++)
		{
			if($jezyk == $regular[$i])
			{
				$result = 1;
				break;
			}
			else
			{
				$result = 0;
			}
		}
		
		if($result == 0)
		{
			exit("<div style='font-size:26px;color:red;'>Błąd w podanym języku, proszę odświeżyć stronę i spróbować ponownie</div>");
		}
	}
//------------------------------------------------------
function wybrane($jezyk)
	{
	//funkcja ma za zadanie sprawdzać czy nie było manipulacji w kodzie w "<select>" w polach wyuczonego języka wybranego
	$en = "angielski";
	$de = "niemiecki";
	$ru = "rosyjski";
	$fr = "francuski";
	
	$regular = Array($en,$de,$ru,$fr);//wybrane dla języków wybranych
	$reg_dl = count($regular);

		for($i=0;$i<$reg_dl;$i++)
		{
			if($jezyk == $regular[$i])
			{
				$result = 1;
				break;
			}
			else
			{
				$result = 0;
			}
		}
		
		if($result == 0)
		{
			exit("<div style='font-size:26px;color:red;'>Błąd w podanym języku, proszę odświeżyć stronę i spróbować ponownie</div>");
		}
	}
//--------------------------------------------------

function klasa($wybierz)
{
	$regular = Array("t.mech.poj.samochodowy","t.elektronik","t.informatyk","t.mechatronik","t.urz.i.s.en.odnawialnej",
	"t.mech.spawacz","t.mech.cad/cam","t.żyw.i.us.gastronomicznych","t.mech.rolnictwa","t.hotelarz","t.handlowiec",
	"zsz.mech.poj.samochodowych","zsz.op.ob.skrawających","zsz.stolarz","zsz.elektryk","zsz.murarz-tynkarz",
	"zsz.ślusarz","zsz.mech.op.poj.i.m.rolnicznych","zsz.sprzedawca","zsz.fryzjer","zsz.cukiernik","zsz.piekarz","zsz.kucharz");
	
	$len = count($regular);
	
	for($i=0;$i<$len;$i++)
	{
		if($wybierz == $regular[$i])
		{
			$result = 1;
			break;
		}
		else
		{
			$result = 0;
		}
	}
	
	if($result == 0)
	{
		exit("<div style='font-size:26px;color:red;'>Błąd w podanej klasie, proszę odświeżyć stronę i spróbować ponownie</div>");
	}
}

function plec($plec)
{
	$regular = Array("mezczyzna","kobieta");
	$len = count($regular);
	
	for($i=0;$i<$len;$i++)
	{
		if($plec == $regular[$i])
		{
			$result = 1;
			break;
		}
		else
		{
			$result = 0;
		}
	}
	
	if($result ==0)
	{
		exit("<div style='font-size:26px;color:red;'>Nie podano prawidłowej płci, proszę odświeżyć stronę i spróbować ponownie</div>");
	}
}

function kopia($kopia)
{
	$regular = Array("kopia","oryginal");
	$len = count($regular);
	
	for($i=0;$i<$len;$i++)
	{
		if($kopia == $regular[$i])
		{
			$result = 1;
			break;
		}
		else
		{
			$result = 0;
		}
	}
	
	if($result ==0)
	{
		exit("<div style='font-size:23px;color:red;'>Nie zaznaczono kopia/oryginał świadectwa, proszę odświeżyć stronę i spróbować ponownie</div>");
	}
}
?>