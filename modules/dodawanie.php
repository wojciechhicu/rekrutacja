<?php
session_start();
require_once("../database.php");
require_once("../functions.php");
if(isset($_SESSION['login']) && isset($_SESSION['pass']))
{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
	//funkcja sprawdzajaca czy istnieje użytkownik o danych w sesyjnych
	$query_login = mysqli_query($conn, "SELECT login, password FROM users WHERE login='$login' AND password='$password'");
	$rows_login_try = mysqli_num_rows($query_login);
	
	if($rows_login_try == 1)
	{
		//nic nie rób jak istnieje użytkownik
	}
	else
	{
		session_destroy();
		header("Location: /../index.php");
		exit();
	}
}
else
{
	header("Location: /../index.php");
	exit();
}
///dane kandydata
	$pesel = mysqli_real_escape_string($conn, $_POST['pesel']);
	$imie = mysqli_real_escape_string($conn, $_POST['imie']);
	$nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
	$imie_ojca =mysqli_real_escape_string($conn, $_POST['imie_ojca']);
	$telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
	$adres = mysqli_real_escape_string($conn, $_POST['adres']);
	$kod_pocztowy = mysqli_real_escape_string($conn, $_POST['kod_pocztowy']);
	$poczta = mysqli_real_escape_string($conn, $_POST['poczta']);
	$gimnazjum = mysqli_real_escape_string($conn, $_POST['gimnazjum']);
	$plec = mysqli_real_escape_string($conn, $_POST['plec']);
//punktacja OKE
	$polski = mysqli_real_escape_string($conn, $_POST['polski']);
	$wos = mysqli_real_escape_string($conn, $_POST['wos']);
	$matematyka = mysqli_real_escape_string($conn, $_POST['matematyka']);
	$przyrodnicze = mysqli_real_escape_string($conn, $_POST['przyrodnicze']);
	$j_podstawowy = mysqli_real_escape_string($conn, $_POST['j_podstawowy']);
	$j_rozszerzony = mysqli_real_escape_string($conn, $_POST['j_rozszezony']);
//punktacja swiadectwo
	$s_polski = mysqli_real_escape_string($conn, $_POST['s_polski']);
	$s_wos = mysqli_real_escape_string($conn, $_POST['s_wos']);
	$s_matematyka = mysqli_real_escape_string($conn, $_POST['s_matematyka']);
	$s_angielski = mysqli_real_escape_string($conn, $_POST['s_angielski']);
	$p_dodatkowy = mysqli_real_escape_string($conn, $_POST['p_dodatkowy_punkty']);
	$s_j_rozszerzony = mysqli_real_escape_string($conn, $_POST['s_j_rozszezony']);
	$naukowe = mysqli_real_escape_string($conn, $_POST['naukowe']);
	$sportowe = mysqli_real_escape_string($conn, $_POST['sportowe']);
	$artystyczne = mysqli_real_escape_string($conn, $_POST['artystyczne']);
	$wolontariat = mysqli_real_escape_string($conn, $_POST['wolontariat']);
	$pasek = mysqli_real_escape_string($conn, $_POST['pasek']);
	$kopia = mysqli_real_escape_string($conn, $_POST['kopia']);
//dodatkowe informacje
	$j1_gimnazjum = mysqli_real_escape_string($conn, $_POST['j1_gimnazjum']);
	$j2_gimnazjum = mysqli_real_escape_string($conn, $_POST['j2_gimnazjum']);
	$j1_wybrany = mysqli_real_escape_string($conn, $_POST['j1_wybrany']);
	$j2_wybrany = mysqli_real_escape_string($conn, $_POST['j2_wybrany']);
	$typ1 = mysqli_real_escape_string($conn, $_POST['typ1']);
	$typ2 = mysqli_real_escape_string($conn, $_POST['typ2']);
	$typ3 = mysqli_real_escape_string($conn, $_POST['typ3']);
//suma pkt
	$suma_punkty=($polski+$wos+$matematyka+$przyrodnicze+$j_podstawowy+$j_rozszerzony+$s_polski+
					$s_wos+$s_matematyka+$s_angielski+$p_dodatkowy+$s_j_rozszerzony+$naukowe+$sportowe+
					$artystyczne+$wolontariat+$pasek);
	$suma_oke=($polski+$wos+$matematyka+$przyrodnicze+$j_podstawowy+$j_rozszerzony);

	//----DANE KANDYDATA----
		validate($imie,'/^[a-zA-Z]{2,20}$/');						//walidacja imienia
		validate($nazwisko,'/^[a-zA-Z]{2,20}$/');					//walidacja nazwiska
		validate($pesel,'/^[0-9]{11}$/');							//walidacja peselu
		validate($imie_ojca,'/^[a-zA-Z]{2,20}$/');					//walidacja imienia ojsca
		validate($telefon,'/^[0-9]{9}$/');							//walidacja telefonu
		validate($adres,'/^[a-zA-Z0-9 ]{2,100}$/');					//walidacja adresu
		validate($kod_pocztowy,'/^[0-9]{2}-[0-9]{3}$/');				//walidacja kodu pocztowego
		validate($poczta,'/^[a-zA-Z ]{2,20}$/');						//walidacja poczty
		validate($gimnazjum,'/^[a-zA-Z]{2,30}$/');					//walidacja gimnazjum
		plec($plec);												//walidacja podanej płci

	//-------PUNKTACJA OKE----------
		validate($polski,'/^[0-9]{1,2}$/');							//walidacja punktów polski
		validate($wos,'/^[0-9]{1,2}$/');							//walidacja punktów wos
		validate($matematyka,'/^[0-9]{1,2}$/');						//walidacja punktów matematyka
		validate($przyrodnicze,'/^[0-9]{1,2}$/');					//walidacja punktów przyrodnicze
		validate($j_podstawowy,'/^[0-9]{1,2}$/');					//walidacja punktów z jezyka podstawowego
		validate($j_rozszerzony,'/^[0-9]{1,2}$/');					//walidacja punktów z języka rozszerzonego
		
	//------PUNKTACJA ŚWIADECTWO------
		validate($s_polski,'/^[0-9]{1,2}$/');						//walidacja punktów polski
		validate($s_wos,'/^[0-9]{1,2}$/');							//walidacja punktów wos
		validate($s_matematyka,'/^[0-9]{1,2}$/');					//walidacja punktów matematyka
		validate($s_angielski,'/^[0-9]{1,2}$/');						//walidacja punktów angielski
		validate($p_dodatkowy,'/^[0-9]{1,2}$/');						//walidacja punktów przedmiotu dod
		validate($s_j_rozszerzony,'/^[0-9]{1,2}$/');					//walidacja punktów języka rozszeżonego
		validate($naukowe,'/^[0-9]{1,2}$/');							//walidacja punktów osiągnięcia naukowe
		validate($sportowe,'/^[0-9]{1,2}$/');						//walidacja punktów osiągnięcia sportowe
		validate($artystyczne,'/^[0-9]{1,2}$/');						//walidacja punktów osiągnięcia artystyczne
		validate($wolontariat,'/^[0-9]{1,2}$/');						//walidacja punktów wolontariat
		kopia($kopia);
	//--------DODATKOWE INFORMACJE----------	
		
	jezyki($j1_gimnazjum);
	jezyki($j2_gimnazjum);
	
	wybrane($j1_wybrany);
	wybrane($j2_wybrany);
	
	klasa($typ1);
	klasa($typ2);
	klasa($typ3);



//zapisanie danych kandydata w bazie
		//sprawdzam czy podany pesel już nie istnieje
		
		$sprawdz = mysqli_query($conn, "SELECT pesel FROM dane_kandydata WHERE pesel='$pesel'");
		$sprawdzRow = mysqli_num_rows($sprawdz);
		
		if($sprawdzRow > 0)
		{
			echo("<div style='color:red;font-size:20px;'>Kandydat o podanym nr PESEL już istnieje w bazie</div>");
			exit();
		}
		
		//dodawanie punktów
			$dodaj_punkty = mysqli_query($conn, "INSERT INTO punktacja(pesel,j_polski,wos,matematyka,przyrodnicze,
			j_podstawowy,j_rozszerzony, s_polski,s_wos,s_matematyka,s_angielski,p_dodatkowy,
			s_j_rozszerzony,naukowe,sportowe, artystyczne,wolontariat,pasek,kopia,j1_gimnazjum, j2_gimnazjum,
			j1_wybrany, j2_wybrany, typ1, typ2, typ3,suma_punkty, suma_oke)
			VALUES ('$pesel','$polski','$wos','$matematyka','$przyrodnicze', '$j_podstawowy','$j_rozszerzony',
			'$s_polski', '$s_wos', '$s_matematyka','$s_angielski','$p_dodatkowy','$s_j_rozszerzony','$naukowe',
			'$sportowe','$artystyczne','$wolontariat', '$pasek','$kopia', '$j1_gimnazjum', '$j2_gimnazjum', 
			'$j1_wybrany','$j2_wybrany','$typ1','$typ2','$typ3','$suma_punkty','$suma_oke' );") or die("Błąd w dodaiu ucznia. Błąd z połączeniem bazy.");


//-------------------------------------------Dodawanie danych
		$dodaj_dane=mysqli_query($conn, "INSERT INTO dane_kandydata(pesel, imie, nazwisko, imie_ojca, telefon, adres, 
		kod_pocztowy, poczta, gimnazjum, plec)
		VALUES ('$pesel','$imie', '$nazwisko','$imie_ojca', '$telefon', '$adres', '$kod_pocztowy', '$poczta',
		'$gimnazjum','$plec');");
		
		if($dodaj_punkty && $dodaj_dane)
		{
			echo("<div style='color:green;font-size:21px;'>Uczeń: ".$imie." ".$nazwisko." został dodany</div>");
		}
		else
		{
			echo("<div style='color:red;font-size:20px;'>Błąd w dodaniu ucznia".$imie." ".$nazwisko." Error:".mysqli_errno($conn)."</div>");
			exit();
		}
?>