<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
       
       
        $sql = "INSERT INTO student (first_name, second_name, age, life) VALUES ('Martin','Hruska',100,'informacie o skole','Nebelvir')";


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
            <h2>Add Student</h2>
        </section>
        <section class="add-student-form">
            <form action="#" method="POST">
                <div class="row">
                    <label for="firstName">First name</label><br>
                    <input type="text" name="firstName" id="firstName">
                </div>
                <div class="row">
                    <label for="secondName">Second name</label><br>
                    <input type="text" name="secondName" id="secondName">
                </div>
                <div class="row">
                    <label for="studentAge">Age</label><br>
                    <input type="number" name="studentAge" id="studentAge" min="10">
                </div>
                <div class="row">
                    <label for="studentCollage">Collage</label><br>
                    <input type="text" name="studentCollage" id="studentCollage">
                </div>
                <div class="row">
                    <label for="studentData">Life</label><br>
                    <textarea name="studentData" id="studentData"></textarea>
                </div>
                <div class="row">
                    <input type="submit" value="Save student" name="saveStudent">
                </div>

            </form>

        </section>
    </main>

    <?php require "assets/footer.php"; ?>
</body>
</html>