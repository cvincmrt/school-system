<?php
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
       
       require "assets/database.php";
       $conn = connectionDB();

//ochrana pred sql injection. Otazniky sluzia ako placeholder, cize kazdy otaznik drzi miesto premennej, ktora sa tam nacita neskor
       $sql = "INSERT INTO student (first_name, second_name, age, life, collage) VALUES (?, ?, ?, ?, ?)";

//príprava na odoslanie dotazu
       $statement = mysqli_prepare($conn, $sql);

       if($statement === false){
            echo mysqli_error($conn);
       }else {
            //funkcia vymeni otazniky za hodnoty. Musim definovat datove typy stlpcov napr.:first_name je string cize (s), second_name je (s),age je (i)
            mysqli_stmt_bind_param($statement, "ssiss", $formFirstName, $formSecondName, $formAge, $formLife, $formCollage);
            
            //odoslanie dotazu
            if (mysqli_stmt_execute($statement)) {
                    $last_id = mysqli_insert_id($conn);
                    echo "Student was saved with id = $last_id";
            }else {
                echo mysqli_stmt_error($statement);
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

    <?php require "assets/footer.php"; ?>
</body>
</html>