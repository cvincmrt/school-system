<?php

require "assets/database.php";
$conn = connectionDB();
require "assets/student.php";

if(isset($_GET["id"]) and is_numeric($_GET["id"])){
    $students = getStudent($conn, $_GET["id"]);
    //NULL je vyhodnoteny ako false
        if($students){
            $id = $students["id"];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                deleteStudent($conn, $id);
            }
            
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
    <title>Delete student</title>
</head>
<body>
    <form action="#" method="POST">
        <h2>Urcite chces zmazat studenta?</h2>
        <input type="submit" value="Ano">
        <a href="students.php">Nie</a>
    </form>
</body>
</html>
