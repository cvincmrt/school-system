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
            $collage =$students["collage"];
        }else{
            die("Student neexistuje");
        }
}else{
    die("Id nieje zadane a student neexistuje");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>List of students</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section-main-title>
            <h2>Student data</h2>
        </section>

        <section>
            <?php if($students === NULL): ?>
                <p>Student does not exist!!!</p>
            <?php else: ?>
                <h2><?php echo $firstName." ".$secondName; ?><h2>
                <p>Age:<?php echo $age; ?></p>
                <p>Additional information:<?php echo $life; ?></p>
                <p>Residence:<?php echo $collage; ?></p>
            <?php endif; ?>    
        </section>
        <section>
            <a href="edit-student.php?id=<?php echo $id; ?>" class="btn">Edit student</a>
            <a href="delete-student.php?id=<?php echo $id; ?>" class="btn">Delete student</a>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>
    <a href="index.php">Back to homepage</a>
   
    
</body>
</html>