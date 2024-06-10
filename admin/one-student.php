<?php
require "../assets/database.php";
require "../assets/student.php";
require "../assets/auth.php";

session_start();

//otocena podmienka
if ( !isLoggedIn() ) {
    die("Unauthorized access!!!");
}

$conn = connectionDB();

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
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../query-css/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://kit.fontawesome.com/9b7133f7b6.js" crossorigin="anonymous"></script>
    <title>List of students</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <section class="main-title">
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
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
   
    
</body>
</html>