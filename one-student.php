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
//isset skontroluje ci dane id bolo nastavene a is_numeric skontroluje ci id je cislo

    if(isset($_GET["id"]) and is_numeric($_GET["id"])){

        $sql = "SELECT * FROM student WHERE id =".$_GET["id"];

        /*co sa stane ak zadam id=100 a take nemam? Stane sa to ze navratova hodnota bude NULL preto to musim pri vypise 
        do stranky osetrit*/

    //odosleme dotaz na databazu a ta mi vrati objekt result    
        $result = mysqli_query($conn, $sql);

    //ak mi v result bude false vypis mi poslednu chybovu hlasku     
        if ($result === false) {
            echo mysqli_error($conn);
        }else{
    //prevediem si objekt na assoc. pole s jednym zaznamom
            $students = mysqli_fetch_assoc($result);
        }
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
    <header>
        <h1>Student data</h1>
    </header>
    <main>
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
    <footer>
        <a href="index.php">Back to homepage</a>
    </footer>
    
</body>
</html>