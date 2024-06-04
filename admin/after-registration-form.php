<?php

require "../assets/url.php";
require "../assets/database.php";
require "../assets/user.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = connectionDB();

//nikdy neukladat heslo do databazy ako plain text = nbu123
//treba hashovat heslo pomocou password_hash a az potom ho ulozit
//tato funkcia automaticky vklada salt do hash
//PASSWORD_DEFAULT zabezpecuje ze sa vzdy pouzije najnovsi algoritmus preto
//treba v databaze dat pozor aby dlzka hesla bola nastavena na 255 znakov

    $firstName = $_POST["first-name"];
    $secondName = $_POST["second-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $passwordAgain = $_POST["password-again"];

    $id = createUser($conn, $firstName, $secondName, $email, $password);

    if (!empty($id)) {
        //ochrana pred fixation attack
        session_regenerate_id(true);

        //nastavenie ze je uzivatel prihlaseny
        $_SESSION["is_logged_in"] = true;

        //nastavenie userId
        $_SESSION["userId"] = $id;

        redirectUrl("/clone/school-system/admin/students.php");
    } else {
        echo "The user has not been added to the database!!! ";
    }
    


} 
