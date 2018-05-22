//creating angular app
var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(function ($routeProvider) {
    $routeProvider

        .when('/', {
            templateUrl: 'templates/home.html',
            controller: 'homeController'
        })

        .when('/uzytkownicy', {
            templateUrl: 'templates/uzytkownicy.html',
            controller: 'uzytkownicyController'
        })

        .when('/kandydaci', {
            templateUrl: 'templates/kandydaci.html',
            controller: 'kandydaciController'
        })

        .when('/baza', {
            templateUrl: 'templates/baza.html',
            controller: 'bazaController'
        })

        .otherwise({
            redirectTo: '/'
        });
});


//-----------------------CONTROLLERS----------------
//home controller
myApp.controller('homeController', function ($scope) {

});

//uzytkownicy controller
myApp.controller('uzytkownicyController', function ($scope) {
    $(document).ready(function () {
        $("#2").hide(); //ukrywam na początku te divy usuń/zmień
        $("#3").hide();

        //JS dla strony dodającej użytkownika do bazy
        $("#dodaj").click(function () {
            $("#1").fadeIn(200);
            $("#2").hide();
            $("#3").hide();
        });

        $("#reset").click(function () {
            $("#login").val("");
            $("#pass").val("");
            $("#result1").html("");
        });

        $("#btnDodaj").click(function () {
            var $login = $("#login").val();
            var $pass = $("#pass").val();

            if ($login.length < 6 || $login.length > 16 || ($pass.length < 6 || $pass.length > 16)) {
                $("#result1").html("<div title='Login i hasło użytkownika powinny składać się z conajmniej 6 znaków i maksymalnie 16 znaków' style='color:red;'>Dane nieprawidłowe</div>");
            } else {
                $.ajax({
                    url: "modules/dodaj.php",
                    type: "POST",
                    data: "login=" + $login + "&pass=" + $pass,
                    success: function (result) {
                        $("#result1").html(result);
                    },
                    error: function () {
                        $("#result1").html("<div style='color:red;'>Niepowodzenie żądania</div>")
                    }
                }); //end ajax
            }
        }); // end dodawania


        // funkcje dla usuwania użytkownika z bazy 
        $.ajax({
            url: "modules/logUsers.php",
            type: "POST",
            success: function (deleteResult) {
                $("#22").html(deleteResult);

                $("#delete").click(function () {
                    confirm = confirm("Czy napewno usunąć?");
                    if (confirm == true) {
                        var user = $("#selectDelete").val();
                        $.ajax({
                            url: "modules/delete.php",
                            type: "POST",
                            data: "usun=" + user,
                            success: function (resultat) {
                                $("#deleteResult").html(resultat);
                            },
                            error: function () {
                                $("#deleteResult").html("<div style='color:red;'>Niepowodzenie żądania</div>")
                            }
                        }); //end 2 ajax
                    }
                });
            },
            error: function () {
                $("#22").html("<div style='color:red;'>Niepowodzenie żądania</div>")
            }
        }); //end ajax



        $("#usun").click(function () {
            $("#1").hide();
            $("#2").fadeIn(200);
            $("#3").hide();
        });

        //funkcje dla zmiany hasła
        $("#zmien").click(function () {
            $("#1").hide();
            $("#2").hide();
            $("#3").fadeIn(200);
        });
        $.ajax({
            url: "modules/logUsersPass.php",
            success: function (resultChange) {
                $("#33").html(resultChange);

                $("#change").click(function () {
                    var who = $("#selectChange").val();
                    var newPass = $("#changePass").val();
                    if (newPass.length > 6 && newPass.length < 20) {
                        $.ajax({
                            type: "POST",
                            url: "modules/newpass.php",
                            data: "komu=" + who + "&newpass=" + newPass,
                            success: function (resultPass) {
                                $("#changeResult").html(resultPass);
                            },
                            error: function () {
                                $("#changeResult").html("<div style='color:red;'>Niepowodzenie żądania</div>");
                            }
                        }); //end ajax2
                    } else {
                        $("#changeResult").html("<div style='color:red;'>Hasło powinno zawierać od 6-20 znaków</div>");
                    }
                }); // end click f
            },
            error: function () {
                $("#33").html("<div style='color:red;'>Niepowodzenie żądania</div>");
            }
        }); //end ajax 1

        //funkcja wyświetla wszystkich użytkowników w bazie
        $.ajax({
            url: "modules/listusers.php",
            cashe: false,
            success: function (result) {
                $(".listUsers").html(result);
            },
            error: function () {
                $("#list").html("<span style='coor:red;'> Błąd połączenia z listą użytkowników</span>");
            }
        }); //end ajax
    });
});

//kandydaci controller
myApp.controller('kandydaciController', function ($scope) {

});

//baza controller
myApp.controller('bazaController', function ($scope) {
    $(document).ready(function () {
        // na początku ukrywam niepotrzebne sekcje 
        $("#resultClear").fadeIn(200);
        $("#resultExport").hide();
        $("#resultLogi").hide();
        $("#resultDelete").hide();

        //funkcje dla czyszczenia bazy
        $("#clear").click(function () {
            $("#resultClear").fadeIn(200);
            $("#resultExport").hide();
            $("#resultLogi").hide();
            $("#resultDelete").hide();


        }); //end clear click

        $("#clearDB").click(function () {
            var baza = $("#whichDB").val();

            var message = confirm("Czy napewno usunąć wszystko z bazy " + baza + "? \n Dane będą nie do odzyskania. \n Poleca się zrobić wcześniej backup tabel.")

            if (message) {
                $.ajax({
                    url: "modules/clear.php",
                    type: "POST",
                    data: "database=" + baza,
                    success: function (clear) {
                        $("#whatHappenC").html(clear);
                    },
                    error: function () {
                        $("#whatHappenC").html("<div style='color:red;'>Niepowodzenie żądania</div>");
                    }
                }); //end ajax   
            } //end if
        }); //end click

        //funkcje dla exportu bazy
        $("#export").click(function () {
            $("#resultClear").hide();
            $("#resultExport").fadeIn(200);
            $("#resultLogi").hide();
            $("#resultDelete").hide();
        }); //end export click

        $("#exportDB").click(function () {
            $.ajax({
                type: "POST",
                url: "modules/export.php",
                success: function (exportDB) {
                    $("#whatHappenEx").html(exportDB);
                },
                error: function () {
                    $("#whatHappenEx").html("<div style='color:red;'>Niepowodzenie żądania</div>")
                }
            }); //end ajax
        }); //end export click



        //funkcje dla usuwania tabel
        $("#delete").click(function () {
            $("#resultClear").hide();
            $("#resultExport").hide();
            $("#resultDelete").fadeIn(200);
            $("#resultLogi").hide();
        }); //end delete click

        $.ajax({
            type: "POST",
            url: "modules/tablelist.php",
            success: function (table) {
                $("#deleteSecelct").html(table);
                //klik wysyla ajaxem dane z selecta
                $("#deleteBTN").click(function () {
                    var table = $("#deleteSecelct").val();
                    dialog = confirm("Czy napewno usunąć?");

                    if (dialog) {
                        $.ajax({
                            url: "modules/deleteTable.php",
                            type: "POST",
                            data: "delete=" + table,
                            success: function (deleteTable) {
                                $("#whatHappenDel").html(deleteTable);
                            },
                            error: function () {
                                $("#whatHappenDel").html("<div style='color:red;'>Niepowodzenie żądania</div>");
                            }

                        }); //end ajax 2
                    }//end if
                }); //end click
            },
            error: function () {
                $("#deleteSecelct").html("Brak połączenia z serwerem");
            }
        }); //end ajax








        //funkcje da logów
        $("#log").click(function () {
            $("#resultClear").hide();
            $("#resultExport").hide();
            $("#resultDelete").hide();
            $("#resultLogi").fadeIn(200);
        }); //end log click









    });
});
