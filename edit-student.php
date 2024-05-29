<?php

require "assets/database.php";
$conn = connectionDB();
require "assets/student.php";

    if(isset($_GET["id"]) and is_numeric($_GET["id"])){

        $students = getStudent($conn, $_GET["id"]);
        
        //NULL je vyhodnoteny ako false
            if($students){
                $id = $students["id"];
                $firstName = $students["first_name"];
                $secondName = $students["second_name"];
                $age = $students["age"];
                $life = $students["life"];
                $collage = $students["collage"];
            }else{
                die("Student neexistuje");
            }
    }else{
        die("Id nieje zadane a student neexistuje");
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formFirstName = $_POST['formFirstName'];
    $formSecondName = $_POST['formSecondName'];
    $formAge = $_POST['formAge'];
    $formLife =  $_POST['formLife'];
    $formCollage = $_POST['formCollage'];

    updateStudent($conn, $formFirstName, $formSecondName, $formAge, $formLife, $formCollage, $id); 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add student</title>
</head>
<body>
    <?php require "assets/header.php"; ?>

    <main>
        <section class="main-title">
            <h2>Edit Student</h2>
        </section>
        <section class="form-student">
            <?php require "assets/formular-student.php"; ?>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
</body>
</html>