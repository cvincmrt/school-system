<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      
       $formFirstName = $_POST['formFirstName'];
       $formSecondName = $_POST['formSecondName'];
       $formAge = $_POST['formAge'];
       $formLife =  $_POST['formLife'];
       $formCollage = $_POST['formCollage'];
       
       require "assets/database.php";

       $sql = "INSERT INTO student (first_name, second_name, age, life, collage) VALUES ('$formFirstName', '$formSecondName', '$formAge', '$formLife', '$formCollage')";
      
       $result = mysqli_query($conn,$sql);

       if ($result === false) {
            echo mysqli_error($conn);
       }else{
//id posledneho ulozeneho zaznamu do databazy
        $last_id = mysqli_insert_id($conn);
            echo "Student was saved with id = $last_id";
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
            <h2>Add Student</h2>
        </section>
        <section class="add-student-form">
            <form action="#" method="POST">
                <div class="row">
                    <label for="formFirstName">First name</label><br>
                    <input type="text" name="formFirstName" id="formFirstName">
                </div>
                <div class="row">
                    <label for="formSecondName">Second name</label><br>
                    <input type="text" name="formSecondName" id="formSecondName">
                </div>
                <div class="row">
                    <label for="formAge">Age</label><br>
                    <input type="number" name="formAge" id="formtAge" min="10">
                </div>
                <div class="row">
                    <label for="formCollage">Collage</label><br>
                    <input type="text" name="formCollage" id="formCollage">
                </div>
                <div class="row">
                    <label for="formLife">Life</label><br>
                    <textarea name="formLife" id="formLife"></textarea>
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