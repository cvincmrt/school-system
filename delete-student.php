<?php

require "assets/database.php";
$conn = connectionDB();
require "assets/student.php";

if(isset($_GET["id"]) and is_numeric($_GET["id"])){
    $students = getStudent($conn, $_GET["id"]);
    //NULL je vyhodnoteny ako false
        if($students){
            $id = $students["id"];
            deleteStudent($conn, $id);
        }else{
            die("Student neexistuje");
        }
}else{
    die("Id nieje zadane a student neexistuje");
}