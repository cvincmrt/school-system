<?php
    $db_host = "localhost";
    $db_user = "cvincmrt";
    $db_password = "Cisco1234";
    $db_name = "skola";


    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    
//vracia popis poslednej chyby prihlasenia - ak je tam neaky text je to true inak false
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit();
    }

    //echo "Database connected...";

//vytvoreny dotaz na tabulku student
    $sql = "SELECT first_name, second_name FROM student";

//odosleme dotaz na databazu a ta mi vrati objekt result    
    $result = mysqli_query($conn, $sql);

//prevediem si objekt na pole v poli
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of students</title>
</head>
<body>
    <header>
        <h1>List of students</h1>
    </header>
    <main>
        <?php if(empty($students)): ?>
            <p>The list of students is empty!!!</p>
        <?php else: ?>
            <ul>
                <?php foreach ($students as $one_student): ?>
                    <li><?= $one_student["first_name"]." ".$one_student["second_name"]; ?></li>
                <?php endforeach; ?> 
            </ul>
        <?php endif; ?>    
    </main>
    <footer>
        <a href="index.php">Back to homepage</a>
    </footer>
    
</body>
</html>
