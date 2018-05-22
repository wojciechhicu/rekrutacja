//creating angular app
var myApp = angular.module('myApp', ['ngRoute']).filter('tel', function () {});

myApp.config(["$routeProvider", function ($routeProvider) {
    $routeProvider

        .when('/', {
            templateUrl: 'templates/main.html',
            controller: 'mainController'
        })

        .when('/kierunki_lista', {
            templateUrl: 'templates/kierunki_lista.html',
            controller: 'listaKierunkiController'
        })

        .when('/dodaj_kandydata', {
            templateUrl: 'templates/dodaj_kandydata.html',
            controller: 'dodajKandydataController'
        })

        .when('/lista_kandydatow', {
            templateUrl: 'templates/lista_kandydatow.html',
            controller: 'listaKandydatowController'
        })

        .when('/lista_przyjetych', {
            templateUrl: 'templates/lista_przyjetych.html',
            controller: 'listaPrzyjetychController'
        })

        .when('/zestawienie_zawodow', {
            templateUrl: 'templates/zestawienie_zawodow.html',
            controller: 'zestawienieZawController'
        })

        .otherwise({
            redirectTo: '/'
        });
}]);


//-----------------------CONTROLLERS----------------
//main controller
myApp.controller('mainController', function ($scope) {

});
//kierunki_lista controller
myApp.controller('listaKierunkiController', function ($scope) {
    $(document).ready(function () {


        //klasa=> element z klasą która została kliknięta
        function link(klasa) {
            $(klasa).click(function () {
                var link = $(this).attr("data-kierunek"); // atrybut data-kierunek przechowuje wybrany kierunek do wyświetlenia
                $.ajax({
                    url: "modules/listakierunki.php",
                    dataType: "text",
                    type: "POST",
                    data: "kierunek=" + link, //wysyłam do podanej strony dane który kierunek ma wyświetlić
                    success: function (result) {
                        //wyswietl dane w tym elemencie
                        $("#content").html(result);

                        //edycja kierunku na który kandydat został przyjęty
                        $(".edycja").on("change", function () {
                            var zmien = $(this).val(); //zmienna z wybranym kierunkiem
                            var atrybut = $(this).children("option").attr("data-zmien"); //dziecko selecta którego dziecko zostałe wybrane;pobiera jego wartość

                            //okno potwierdzenia wyświetlające
                            var conf = confirm("Czy napewno zmienić kierunek na " + zmien + " ?");

                            //jęsli potwierdzono to zmień dane
                            if (conf) {
                                $.ajax({
                                    type: "POST",
                                    url: "modules/zmienkierunek.php",
                                    data: "pesel=" + atrybut + "&kierunek=" + zmien,
                                    success: function (result) {
                                        alert(result); // wyświetl efekt w oknie alert
                                    },
                                    error: function () {
                                        alert("Błąd zmiany. Odśwież stronę i spróbuj jeszcze raz");
                                    }
                                }); //end ajax 2
                            } //end if
                        }); //end click


                        //funkcja usuwająca kandydata z bazy
                        $(".usun").click(function () {
                            var usunPesel = $(this).attr("data-usun"); //pesel kandydata którego chcemy usunąć
                            var usun = confirm("Czy napewno usunąć?"); //okno potwierdzenia
                            if (usun) {
                                $.ajax({
                                    type: "POST",
                                    url: "modules/usunkandydata.php",
                                    data: "pesel=" + usunPesel,
                                    success: function (usun) {
                                        alert(usun);
                                    },
                                    error: function () {
                                        alert("Nie można połączyć się z bazą");
                                    }
                                }); //end ajax 2
                            }
                        }); //end click
                    },
                    error: function () {
                        $("#content").html("Błąd połączenia z bazą"); //jeśli nie uda się połączyć z bazą/elementem to wyświetl błąd
                    }
                }); //end ajax
            });
        }; //end link function

        link(".elektronik");
        link(".mechPojSamochodowy");
        link(".informatyk");
        link(".mechatronik");
        link(".urzIsEnOdnawialnej");
        link(".zywIUsGastronomicznych");
        link(".mechRolnictwa");
        link(".hotelarz");
        link(".handlowiec");
        link(".mechSpawacz");
        link(".mechCad_cam");
        link(".opObSkrawajacych");
        link(".stolarz");
        link(".elektryk");
        link(".murarzTynkarz");
        link(".slusarz");
        link(".mechOpPojImRolnicznych");
        link(".mechPojSamochodowych");
        link(".sprzedawca");
        link(".fryzjer");
        link(".cukiernik");
        link(".piekarz");
        link(".kucharz");
    });
}); //end controller

//dodaj kandydatacontroller
myApp.controller('dodajKandydataController', function ($scope) {
    $(document).ready(function () {


        //ukrycie wszystkich zakładek poza pierwszą przy pierwszym załadowaniu oraz dodanie przyciskowi klasę btnActive która pokazuje która zakładka jest dokładnie aktywna
        
        $("#2").stop().hide();
        $("#3").stop().hide();
        $("#4").stop().hide();
        $("#one").addClass("btnActive");

        //po kliknięciu przycisku przypisanemu z zakładce pokaż konkretną zakładkę a pozostałe ukryj
        $("#one").click(function () {
            $("#1").fadeIn().show();
            $("#2").hide();
            $("#3").hide();
            $("#4").hide();
            $("#one").addClass("btnActive");
            $("#two").removeClass("btnActive");
            $("#three").removeClass("btnActive");
            $("#four").removeClass("btnActive");
        });

        $("#two").click(function () {
            $("#1").hide();
            $("#2").fadeIn().show();
            $("#3").hide();
            $("#4").hide();
            $("#one").removeClass("btnActive");
            $("#two").addClass("btnActive");
            $("#three").removeClass("btnActive");
            $("#four").removeClass("btnActive");
        });

        $("#three").click(function () {
            $("#1").hide();
            $("#2").hide();
            $("#3").fadeIn().show();
            $("#4").hide();
            $("#one").removeClass("btnActive");
            $("#two").removeClass("btnActive");
            $("#three").addClass("btnActive");
            $("#four").removeClass("btnActive");
        });

        $("#four").click(function () {
            $("#1").hide();
            $("#2").hide();
            $("#3").hide();
            $("#4").fadeIn().show();
            $("#one").removeClass("btnActive");
            $("#two").removeClass("btnActive");
            $("#three").removeClass("btnActive");
            $("#four").addClass("btnActive");
        });

        //walidacja
        function reg(podpinamDo, coObsluguje, klasa, wyrazenie) {
            $(podpinamDo).on('blur', function () {
                var input = $(this);
                var coObsluguje = wyrazenie.test(input.val());

                if (coObsluguje) {
                    input.removeClass("invalid");

                    input.addClass("valid");
                } else {
                    input.addClass("invalid");

                    input.removeClass("valid");
                }
            });
        };

        // podpinamDo = odwołuję się do elementu o ID np input;
        //coObsluguje = na czym akurat pracuję np odnośnie imienia;
        //klasa = do jakiej klasy się odwołuję;
        //wyrazenie = reg podany i co ma zawierać input aby zwrócił true;


        //walidacja w DANE
        reg('#imie', imie, '.imie', /^[a-zA-Z]{2,20}$/);
        reg('#nazwisko', nazwisko, '.nazwisko', /^[a-zA-Z]{2,20}$/);
        reg('#imie_ojca', imie_ojca, '.imie_ojca', /^[a-zA-Z]{2,20}$/);
        reg('#telefon', telefon, '.telefon', /^[0-9]{9}$/);
        reg('#adres', adres, '.adres', /^[a-zA-Z0-9 ]{1,100}$/);
        reg('#kod_pocztowy', kod_pocztowy, '.kod_pocztowy', /^[0-9]{2}-[0-9]{3}$/);
        reg('#poczta', poczta, '.poczta', /^[a-zA-Z ]{2,30}$/);
        reg('#PESEL', PESEL, '.PESEL', /^[0-9]{11}$/);
        reg('#gimnazjum', gimnazjum, '.gimnazjum', /^[a-zA-Z]{2,30}$/);

        //walidacja w PUNKTACJA EGZAMIN GIMNAZJALNY

        reg('#polski_egzamin', polski_egzamin, '.polski_egzamin', /^[0-9]{1,2}$/);
        reg('#wos_egzamin', wos_egzamin, '.wos_egzamin', /^[0-9]{1,2}$/);
        reg('#matem_egzamin', matem_egzamin, '.matem_egzamin', /^[0-9]{1,2}$/);
        reg('#przyroda_egzamin', przyroda_egzamin, '.przyroda_egzamin', /^[0-9]{1,2}$/);
        reg('#j_podstawowy_egzamin', j_podstawowy_egzamin, '.j_podstawowy_egzamin', /^[0-9]{1,2}$/);
        reg('#j_rozszerzony_egzamin', j_rozszerzony_egzamin, '.j_rozszerzony_egzamin', /^[0-9]{1,2}$/);

        //walidacja w PUNKTACJA ŚWIADECTWO

        reg('#polski_swiadectwo', polski_swiadectwo, '.polski_swiadectwo', /^[0-9]{1,2}$/);
        reg('#wos_swiadectwo', wos_swiadectwo, '.wos_swiadectwo', /^[0-9]{1,2}$/);
        reg('#matem_swiadectwo', matem_swiadectwo, '.matem_swiadectwo', /^[0-9]{1,2}$/);
        reg('#angielski_swiadectwo', angielski_swiadectwo, '.angielski_swiadectwo', /^[0-9]{1,2}$/);
        reg('#przed_dod_swiadectwo', przed_dod_swiadectwo, '.przed_dod_swiadectwo', /^[0-9]{1,2}$/);
        reg('#j_rozszerzony_swiadectwo', j_rozszerzony_swiadectwo, '.j_rozszerzony_swiadectwo', /^[0-9]{1,2}$/);
        reg('#naukowe_swiadectwo', naukowe_swiadectwo, '.naukowe_swiadectwo', /^[0-9]{1,2}$/);
        reg('#sportowe_swiadectwo', sportowe_swiadectwo, '.sportowe_swiadectwo', /^[0-9]{1,2}$/);
        reg('#art_swiadectwo', art_swiadectwo, '.art_swiadectwo', /^[0-9]{1,2}$/);
        reg('#wol_swiadectwo', wol_swiadectwo, '.wol_swiadectwo', /^[0-9]{1,2}$/);


    });

    $("#submit").click(function () {
        var imie = $("#imie").val();
        var nazwisko = $("#nazwisko").val();
        var imie_ojca = $("#imie_ojca").val();
        var telefon = $("#telefon").val();
        var adres = $("#adres").val();
        var kod_pocztowy = $("#kod_pocztowy").val();
        var poczta = $("#poczta").val();
        var pesel = $("#PESEL").val();
        var gimnazjum = $("#gimnazjum").val();
        var plec = form.plec.value;

        //punktacja egzamin gimnazjalny
        var polski_egzamin = $("#polski_egzamin").val();
        var wos_egzamin = $("#wos_egzamin").val();
        var matem_egzamin = $("#matem_egzamin").val();
        var przyroda_egzamin = $("#przyroda_egzamin").val();
        var j_podstawowy_egzamin = $("#j_podstawowy_egzamin").val();
        var j_rozszerzony_egzamin = $("#j_rozszerzony_egzamin").val();

        //punktacja swiadectwo
        var polski_swiadectwo = $("#polski_swiadectwo").val();
        var wos_swiadectwo = $("#wos_swiadectwo").val();
        var matem_swiadectwo = $("#matem_swiadectwo").val();
        var angielski_swiadectwo = $("#angielski_swiadectwo").val();
        var przed_dod_swiadectwo = $("#przed_dod_swiadectwo").val();
        var j_rozszerzony_swiadectwo = $("#j_rozszerzony_swiadectwo").val();
        var naukowe_swiadectwo = $("#naukowe_swiadectwo").val();
        var sportowe_swiadectwo = $("#sportowe_swiadectwo").val();
        var art_swiadectwo = $("#art_swiadectwo").val();
        var wol_swiadectwo = $("#wol_swiadectwo").val();
        var pasek = form2.pasek.value;
        var kopia = form3.kopia.value;

        //dodatkowe informacje
        var j1_gimnazjum = $("#j1_gimnazjum").val();
        var j2_gimnazjum = $("#j2_gimnazjum").val();
        var j1_wybrany = $("#j1_wybrany").val();
        var j2_wybrany = $("#j2_wybrany").val();
        var typ1 = $("#typ1").val();
        var typ2 = $("#typ2").val();
        var typ3 = $("#typ3").val();

        if (plec != '' && pasek != '' && kopia != '' && $("#imie").hasClass("valid") && $("#nazwisko").hasClass("valid") &&
            $("#imie_ojca").hasClass("valid") && $("#telefon").hasClass("valid") && $("#adres").hasClass("valid") && $("#kod_pocztowy").hasClass("valid") &&
            $("#poczta").hasClass("valid") && $("#PESEL").hasClass("valid") && $("#gimnazjum").hasClass("valid") &&
            $("#polski_egzamin").hasClass("valid") && $("#wos_egzamin").hasClass("valid") && $("#matem_egzamin").hasClass("valid") && $("#przyroda_egzamin").hasClass("valid") &&
            $("#j_podstawowy_egzamin").hasClass("valid") && $("#j_rozszerzony_egzamin").hasClass("valid") && $("#polski_swiadectwo").hasClass("valid") && $("#wos_swiadectwo").hasClass("valid") &&
            $("#matem_swiadectwo").hasClass("valid") && $("#angielski_swiadectwo").hasClass("valid") && $("#przed_dod_swiadectwo").hasClass("valid") && $("#j_rozszerzony_swiadectwo").hasClass("valid") &&
            $("#naukowe_swiadectwo").hasClass("valid") && $("#sportowe_swiadectwo").hasClass("valid") && $("#art_swiadectwo").hasClass("valid") && $("#wol_swiadectwo").hasClass("valid")) {
            var data = 'imie=' + imie + '&&nazwisko=' + nazwisko + '&&imie_ojca=' + imie_ojca + '&&telefon=' + telefon +
                '&&adres=' + adres + '&&kod_pocztowy=' + kod_pocztowy + '&&poczta=' + poczta + '&&pesel=' + pesel + '&&gimnazjum=' + gimnazjum +
                '&&plec=' + plec + '&&polski=' + polski_egzamin + '&&wos=' + wos_egzamin + '&&matematyka=' + matem_egzamin + '&&przyrodnicze=' + przyroda_egzamin +
                '&&j_podstawowy=' + j_podstawowy_egzamin + '&&j_rozszezony=' + j_rozszerzony_egzamin + '&&s_polski=' + polski_swiadectwo +
                '&&s_wos=' + wos_swiadectwo + '&&s_matematyka=' + matem_swiadectwo + '&&s_angielski=' + angielski_swiadectwo + '&&p_dodatkowy_punkty=' + przed_dod_swiadectwo +
                '&&s_j_rozszezony=' + j_rozszerzony_swiadectwo + '&&naukowe=' + naukowe_swiadectwo + '&&sportowe=' + sportowe_swiadectwo + '&&artystyczne=' + art_swiadectwo +
                '&&wolontariat=' + wol_swiadectwo + '&&pasek=' + pasek + '&&kopia=' + kopia + '&&j1_gimnazjum=' + j1_gimnazjum + '&&j2_gimnazjum=' + j2_gimnazjum +
                '&&j1_wybrany=' + j1_wybrany + '&&j2_wybrany=' + j2_wybrany + '&&typ1=' + typ1 + '&&typ2=' + typ2 + '&&typ3=' + typ3;

            $.ajax({
                type: "POST",
                url: "modules/dodawanie.php",
                dataType: "text",
                data: data,
                success: function (result) {
                    $("#result").html(result);
                },
                error: function () {
                    $("#result").html("<div style='color:red;font-size:20px;'>Niepowodzenie wysłania żądania, spróbuj ponownie później</div>");
                }
            }); //end ajax
        } else {
            alert("Podano nie wszystkie poprawne dane");
        } //end if
    }); //end click

});

//Kandydaci lista controller
myApp.controller('listaKandydatowController', function ($scope) {
    $(document).ready(function () {
        $.ajax({
            url: "modules/listakand.php",
            error: function () {
                $("#show").html("<div style='color:red;font-size:20px;'>Błąd w wyświetlaniu tabel</div>")
            },
            success: function (result) {
                $("#show").html(result);
                
                function szukajNazwisko() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("search").value;
                    filter = input.toUpperCase();
                    table = document.getElementById("searchTable");
                    tr = table.getElementsByTagName("tr");

                    for (i = 1; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        } //end if
                    } //end for
                } //end function

                
                $("#search").keyup(function () {
                    szukajNazwisko();
                });


                // pobieram okno modalne
                var modal = $('#myModal');

                //pobieram body okna
                var modalBody = $(".modal-content");

                // element zamykający okno
                var close = $(".close");

                // element otwierajcy okno modalne
                var open = $(".edycja");

                //dane z formularza imie/naziwsko
                var noweImie = $("#zmienImie");
                var noweNazwisko = $("#zmienNazwisko");

                //po otwarciu okna
                open.click(function () {
                    modal.fadeIn(150);

                    //ajax dla wyświetlenia danych kandydata do zmiany
                    var pesel = $(this).attr("data-pesel");
                    
                    $.ajax({
                        type: "post",
                        url: "modules/kandydat.php",
                        data: "pesel="+ pesel,
                        success: function(show){
                            $("#formularzAktualizuj").html(show);
                        },
                        error: function(){
                            $("#formularzAktualizuj").html("Błąd połączenia");
                        }
                    });//end ajax danych do zmiany 

                })
                
                //funkcja do zamknięcia okna, zamyka okno po czym czyści pola input z imienia oraz nazwiska
                function zamknij() {
                    modal.fadeOut(150);
                    document.getElementById("formularzAktualizuj").reset();
                }

                // po kliknięciu na przycisk zamyka okno oraz czyści dane formularza po czym odświeża stronę aby uzyskać najnowsze dane
                close.click(function () {
                    zamknij();
                }) //end click

            } //end success
        }); // end ajax


    });
});
//lista przyjetych controller
myApp.controller('listaPrzyjetychController', function ($scope) {
    $(document).ready(function () {
        $("#pokaz").click(function () {
            var data = $("#mainSelect").val();
            $.ajax({
                url: "modules/przyjeci.php",
                data: "przyjety="+ data,
                type: "POST",
                error: function () {
                    $("#error").html("<div style='color:red;font-size:20px;'>Błąd w wyświetlaniu tabel</div>")
                },
                success: function (result) {
                    $("#listaPrzyjetych").html(result);
                }
            }); // end ajax

        }); //end click
    }); //end ready
});
//zastawienie zawodow controller
myApp.controller('zestawienieZawController', function ($scope) {
    $(document).ready(function () {
        $("#jeden").hide();
        $("#dwa").hide();
        $("#drukuj").hide();
        $("#drukuj").attr("href", "/modules/pdf_zestawienie_zawodowe.php");
        $.ajax({
            url: "modules/zestawieniez.php",
            success: function (result) {
                //kiedy sukces to rób to:
                $("#preloader").remove();
                $("#loader").remove();
                $("#jeden").show();
                $("#dwa").show();
                $("#jeden").addClass("btnActive");
                $("#drukuj").show()

                $("#zestawienieZaw").html(result);
                $("#fieldTwo").hide();

                $("#jeden").click(function () {
                    $("#fieldOne").show();
                    $("#fieldTwo").stop().hide();
                    $(this).addClass("btnActive");
                    $("#dwa").removeClass("btnActive");
                    $("#drukuj").attr("href", "/modules/pdf_zestawienie_zawodowe.php");

                });

                $("#dwa").click(function () {
                    $("#fieldTwo").show().show();
                    $("#fieldOne").stop().hide();
                    $(this).addClass("btnActive");
                    $("#jeden").removeClass("btnActive");
                    $("#drukuj").attr("href", "/modules/pdf_zestawienie_branzowe.php");
                });

                $("#drukuj").click(function () {
                    var drukuj = $(this).attr("href");
                    window.location.assign(drukuj);
                });
            },
            error: function (result) {
                $("#zestawienieZaw").html(result);
            }
        }); //end ajax
    }); //end document
}); //end controller
