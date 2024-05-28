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

       $sql = "UPDATE student SET first_name = ?,
                                  second_name = ?,
                                  age = ?,
                                  life = ?,
                                  collage = ?
               WHERE id = ?";

       $stmt = mysqli_prepare($conn, $sql);

       if ($stmt === false) {
            echo mysqli_error($conn);
       }else{
            mysqli_stmt_bind_param($stmt, "ssissi", $formFirstName, $formSecondName, $formAge, $formLife, $formCollage, $id);

            if(mysqli_stmt_execute($stmt)){
                echo "info prebehlo OK";
            }
       }
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
        <section-main-title>
            <h2>Edit Student</h2>
        </section>

        <?php require "assets/formular-student.php"; ?>




        </section>
    </main>

    <?php require "assets/footer.php"; ?>
</body>
</html>