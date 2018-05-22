<?php
session_start();
require_once("../database.php");

$login = mysqli_real_escape_string($conn, $_SESSION['login']);
$password = mysqli_real_escape_string($conn, $_SESSION['pass']);

if(isset($_SESSION['login']) && isset($_SESSION['pass']))
{

	
	//funkcja sprawdzajaca czy istnieje użytkownik o danych w sesyjnych
	$query_login = mysqli_query($conn, "SELECT login, password FROM users WHERE login='$login' AND password='$password'");
	$rows_login_try = mysqli_num_rows($query_login);
	
	if($rows_login_try == 1)
	{
        // pobieram pesel
        $pesel = mysqli_real_escape_string($conn, $_POST['pesel']);
        
        // zapytania do bazy zwracające kandydata z podanym peselem
        $punktacja = mysqli_query($conn, "SELECT * FROM punktacja WHERE pesel = $pesel");
        $dane = mysqli_query($conn, "SELECT * FROM dane_kandydata WHERE pesel = $pesel");
        
        //jeśli nie ma błędu to twórz tablice oraz wyswietl dane
        if(mysqli_errno($conn) == 0)
        {
            //tworzę z zapytać tablicę asocjacyjną
            $pkt = mysqli_fetch_assoc($punktacja);
            $data = mysqli_fetch_assoc($dane);

            //wyświetlam dane z bazy, dane kandydata
            $form = "
                <div class='header'>Dane kandydata</div>
                <div class='section'>
                    <div class='line'>
                        <div class='inline'>
                            <div>Imię:</div> 
                            <input class='modalInput' type='text' placeholder=".$data['imie']." />
                        </div>
                            
                        <div class='inline'>
                            <div>Nazwisko:</div> <input class='modalInput' type='text' placeholder=".$data['nazwisko']." />
                        </div>
                            
                        <div class='inline'>
                            <div>Imię ojca:</div> <input class='modalInput' type='text' placeholder=".$data['imie_ojca']." />
                        </div>
                    </div>

                <div class='line'>
                    <div class='inline'>
                        <div> Telefon:</div> <input class='modalInput' type='text' placeholder=".$data['telefon']." />
                    </div>
                    
                    <div class='inline'>
                        <div> Adres:</div> <input class='modalInput' type='text' placeholder=".$data['adres']." />
                    </div>
                    
                    <div class='inline'>
                        <div> Kod pocztowy:</div> <input class='modalInput' type='text' placeholder=".$data['kod_pocztowy']." />
                    </div>
                </div>
            
                <div class='line'>
                    <div class='inline'>
                        <div> Poczta:</div> <input class='modalInput' type='text' placeholder=".$data['poczta']." />
                    </div>
                    
                    <div class='inline'>
                        <div> Gimnazjum:</div> <input class='modalInput' type='text' placeholder=".$data['gimnazjum']." />
                    </div>";
                
            //jeśli kandydat jest mezczyzna to zaznacz odrazu mezczyzna a jesli nie to kobieta
            if($data['plec'] == "mezczyzna")
                {
                 $form.="<div class='inline'>
                        <div> Płeć: </div> 
                        <label for='male'>M</label><input id='male' type='radio' checked name='plec' value='mezczyzna' />
                        <label for='female'>K</label><input id='female' type='radio' name='plec' value='mezczyzna' />
                    </div>";                    
                }
                else
                {   
                 $form.="<div class='inline'>
                        <div> Płeć: </div> 
                        <label for='male'>M</label><input id='male' type='radio' name='plec' value='mezczyzna' />
                        <label for='female'>K</label><input id='female' type='radio' checked name='plec' value='mezczyzna' />
                    </div>";                       
                }
            
            
            $form.="
                </div>
            </div>";//koniec sekcji
            
            //punktacja gimnazjum
            $form.= "<div class='header'>Punktacja gimnazjum</div>
                <div class='section'>
                    <div class='line'>
                        <div class='inline'>
                            <div> Język polski:</div> <input class='modalInput' type='text' placeholder=".$pkt['j_polski']." />  
                        </div>
                        
                        <div class='inline'>
                            <div> WOS:</div> <input class='modalInput' type='text' placeholder=".$pkt['wos']." />  
                        </div>
                        
                        <div class='inline'>
                            <div> Matematyka:</div> <input class='modalInput' type='text' placeholder=".$pkt['matematyka']." />
                        </div>
                    </div>
            </div>

                    <div class='line'>
                        <div class='inline'>
                            <div>Przyrodnicze:</div> <input class='modalInput' type='text' placeholder=".$pkt['przyrodnicze']." /> 
                        </div>
                        
                        <div class='inline'>
                            <div>Język podstawowy:</div> <input class='modalInput' type='text' placeholder=".$pkt['j_podstawowy']." />
                        </div>
                        
                        <div class='inline'>
                            <div>Język rozszerzony:</div> <input class='modalInput' type='text' placeholder=".$pkt['j_rozszerzony']." />
                        </div>
                    </div>
                </div>";//koniec sekcji
            
            //punktacja świadectwo
            $form.= "<div class='header'>Punktacja świadectwo</div>
                <div class='section'>
                    <div class='line'>
                        <div class='inline'>
                            <div> Język polski:</div> <input class='modalInput' type='text' placeholder=".$pkt['s_polski']." />
                        </div>
                        
                        <div class='inline'>
                            <div> WOS:</div> <input class='modalInput' type='text' placeholder=".$pkt['s_wos']." />     
                        </div> 
                        
                        <div class='inline'>
                            <div> Matematyka:</div> <input class='modalInput' type='text' placeholder=".$pkt['s_matematyka']." />
                        </div>
                    </div>

                    <div class='line'>
                        <div class='inline'>
                            <div> Język angielski:</div> <input class='modalInput' type='text' placeholder=".$pkt['s_angielski']." /> 
                        </div>
                        
                        <div class='inline'>
                            <div> Przedmiot dodatkowy:</div> <input class='modalInput' type='text' placeholder=".$pkt['p_dodatkowy']." />  
                        </div>
                        
                        <div class='inline'>
                            <div> Język rozszerzony:</div> <input class='modalInput' type='text' placeholder=".$pkt['s_j_rozszerzony']." />
                        </div>
                    </div>
            
                <div class='line'>
                    <div class='inline'>
                        <div> Osiągnięcia naukowe:</div> <input class='modalInput' type='text' placeholder=".$pkt['naukowe']." /> 
                    </div>
                    
                    <div class='inline'>
                        <div> Osiągnięcia sportowe:</div> <input class='modalInput' type='text' placeholder=".$pkt['sportowe']." />
                    </div>
                    
                    <div class='inline'>
                        <div> Osiągnięcia artystyczne:</div> <input class='modalInput' type='text' placeholder=".$pkt['artystyczne']." /> 
                    </div>
                </div>

                <div class='line'>
                    <div class='inline'>
                        <div> Wolontariat:</div> <input class='modalInput' type='text' placeholder=".$pkt['wolontariat']." />
                    </div>";
            //jeśli kandydat ma zaznaczone posiadanie paska to default opcją będzie opcja Tak
            if($pkt['pasek'] == "tak")
            {
               $form.= "<div class='inline'>
                        <div> Pasek:</div> 
                        
                        <select>
                            <option selected >Tak</option>
                            <option>Nie</option>
                        </select>
                    </div>";
            }
            else
            {
                $form.= "<div class='inline'>
                        <div> Pasek:</div> 

                        <select>
                            <option>Tak</option>
                            <option selected >Nie</option>
                        </select>
                    </div>";
                }
            
            
                $form.="
                    <div class='inline'>
                        <div> Świadectwo oryginał:</div> <input class='modalInput' type='text' placeholder=".$pkt['kopia']." />
                    </div>
                </div>";
            // suma punktów oraz suma OKE zmieniana jest podczas aktualizacji
            echo($form);
        }
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
?>
