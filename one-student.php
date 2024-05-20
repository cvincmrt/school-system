<?php
require "assets/database.php";
$conn = connectionDB();
require "assets/student.php";

    if(isset($_GET["id"]) and is_numeric($_GET["id"])){
        $students = getStudent($conn, $_GET["id"]);
    }else{
        echo "Wrong id";
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
                <h2><?php echo $students["first_name"]." ".$students["second_name"]; ?><h2>
                <p>Age:<?php echo $students["age"]; ?></p>
                <p>Additional information:<?php echo $students["life"]; ?></p>
                <p>Residence:<?php echo $students["collage"]; ?></p>
            <?php endif; ?>    
        </section>
    </main>
    <?php require "assets/footer.php"; ?>
    <a href="index.php">Back to homepage</a>
   
    
</body>
</html>