<?php
    require "../assets/student.php";

    $formFirstName = null;
    $formSecondName = null;
    $formAge = null;
    $formLife =  null;
    $formCollage = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      
       $formFirstName = $_POST['formFirstName'];
       $formSecondName = $_POST['formSecondName'];
       $formAge = $_POST['formAge'];
       $formLife =  $_POST['formLife'];
       $formCollage = $_POST['formCollage'];
       
       require "../assets/database.php";
       $conn = connectionDB();
       
       createStudent($conn,$formFirstName,$formSecondName,$formAge,$formLife,$formCollage);

    }   
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../query-css/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://kit.fontawesome.com/9b7133f7b6.js" crossorigin="anonymous"></script>
    <title>Add student</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    <main>
        <section class="main-title">
            <h2>Add Student</h2>
        </section>
        <section class="add-student-form">
            <form action="#" method="POST">
                <div class="row">
                    <label for="formFirstName">First name</label><br>
                    <input type="text"
                        name="formFirstName"
                        id="formFirstName"
                        value="<?php echo $formFirstName; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formSecondName">Second name</label><br>
                    <input type="text" 
                        name="formSecondName"
                        id="formSecondName" 
                        value="<?php echo $formSecondName; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formAge">Age</label><br>
                    <input type="number" 
                        name="formAge" 
                        id="formtAge" 
                        min="10" 
                        value="<?php echo $formAge; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formCollage">Collage</label><br>
                    <input type="text" 
                    name="formCollage" 
                    id="formCollage"
                    value="<?php echo $formCollage; ?>" 
                    required>
                </div>
                <div class="row">
                    <label for="formLife">Life</label><br>
                    <textarea name="formLife" id="formLife" required><?php echo $formLife; ?></textarea>
                </div>
                <div class="row">
                    <input type="submit" value="Save student" name="saveStudent">
                </div>

            </form>

        </section>
    </main>

    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>