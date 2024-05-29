<?php
require "assets/database.php";
require "assets/student.php";

$conn = connectionDB();

$students = getAllStudent($conn);
  
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
    <a href="index.php">Back to homepage</a>
   
</body>
</html>
