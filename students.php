<?php
require "assets/database.php";
require "assets/student.php";

$conn = connectionDB();

$students = getAllStudent($conn,"id, first_name, second_name");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="query-css/header-query.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/9b7133f7b6.js" crossorigin="anonymous"></script>
    <title>List of students</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="main-title">
            <h2>List of students</h2>
        </section>

        <?php if(empty($students)): ?>
            <p>The list of students is empty!!!</p>
        <?php else: ?>
            <ul>
                <?php foreach ($students as $one_student): ?>
                    <li><?= $one_student["first_name"]." ".$one_student["second_name"]." "; ?><a href="one-student.php?id=<?php echo $one_student['id']; ?>">More infor...</a></li>
                <?php endforeach; ?> 
            </ul>
        <?php endif; ?>    
    </main>
    <?php require "assets/footer.php"; ?>
    <script src="js/header.js"></script>
    
   
</body>
</html>
