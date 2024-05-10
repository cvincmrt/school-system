<?php
    $db_host = "localhost";
    $db_user = "cvincmrt";
    $db_password = "Cisco1234";
    $db_name = "skola";


    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    
//vracia popis poslednej chyby prihlasenia-ak je tam neaky text je to true inak false
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit();
    }

    echo "Vsetko je ok";

?>