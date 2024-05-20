<?php
require "assets/database.php";
$conn = connectionDB();

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