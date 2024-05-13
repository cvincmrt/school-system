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
    $sql = "SELECT * FROM student WHERE id = 1";

//odosleme dotaz na databazu a ta mi vrati objekt result    
    $result = mysqli_query($conn, $sql);

//ak mi v result bude false vypis mi poslednu chybovu hlasku     
    if ($result === false) {
        echo mysqli_error($conn);
    }else{
//prevediem si objekt na assoc. pole s jednym zaznamom
        $students = mysqli_fetch_assoc($result);
    }

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
        <h1>Student data</h1>
    </header>
    <main>
       
    </main>
    <footer>
        <a href="index.php">Back to homepage</a>
    </footer>
    
</body>
</html>