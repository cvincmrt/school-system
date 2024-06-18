<?php

require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $conn = connectionDB();
    
    $email = $_POST["emailF"];
    $password = $_POST["passwordF"];

    //overovanie ci heslo je rovnake ako hash z databazy
    //podmienka vracia true pokial sa hash z databazy rovna heslu zadanemu vo formulari

    if(authUser($conn, $email, $password)){
        echo "User je overeny";
    }else{
        echo "User is deat!!!!";
    }
    

}
