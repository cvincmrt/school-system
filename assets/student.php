<?php

require "url.php";

/**
 * Funkcia vrati vsetkích ziakov
 * 
 * @param object $conn - spojenie s databazou
 * 
 * @return array -vracia pole objektov 
 */
//$columns su na zadanie nazvov stlpcov a ked stpce nezadam tak tam prirad hviezdicku*  

function getAllStudent($conn, $columns = "*"){

//vytvoreny dotaz na tabulku student

    $sql = "SELECT $columns FROM student";

//odosleme dotaz na databazu a ta mi vrati objekt result    
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo mysqli_error($conn);
    }else{
//prevediem si objekt na pole v poli
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

/**
 * Funkcia vrati jedneho studenta
 * 
 * @param object - pripojenie k databaze
 * @param integer - id konkretneho studenta
 * 
 * @return asociativne pole, ktore obsahuje jedneho konkretneho studenta 
 */
function getStudent($conn, $id, $columns = "*"){

    $sql = "SELECT $columns FROM student WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    }else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}


/**
 * Funkcia na update studenta
 * 
 * @param string $fName - zadaj meno
 * @param string $sName - zadaj priezvisko
 * @param integer $age - zadaj vek
 * @param string $life - zadaj info o ziakovi
 * @param string $collate - zadaj kde byva ziak
 * @param integer $id - id ziaka
 * 
 * @return void -funkcia nema navratovu hodnotu
 * 
 */
function updateStudent($conn, $fName, $sName, $age, $life, $collage, $id) {

    $sql = "UPDATE student SET first_name = ?,
                                  second_name = ?,
                                  age = ?,
                                  life = ?,
                                  collage = ?
               WHERE id = ?";

       $stmt = mysqli_prepare($conn, $sql);

       if ($stmt === false) {
            echo mysqli_error($conn);
       }else{
            mysqli_stmt_bind_param($stmt, "ssissi", $fName, $sName, $age, $life, $collage, $id);

            if(mysqli_stmt_execute($stmt)){
                //header("Location:one-student.php?id=$id");
                redirectUrl("/clone/school-system/admin/one-student.php?id=$id");
            }
       }

}

/**
 * Funkcia na zmazanie studenta
 * 
 * @param integer $id - idecko ktore sa ma zmazat
 * @param object $conn - spojenie s databazou
 * 
 * @return void
 */
function deleteStudent($conn,$id){
    $sql = "DELETE FROM student WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            redirectUrl("/clone/school-system/admin/students.php");
        }

    }
}

/**
 * Funkcia na vytvorenie studenta 
 * 
 * @param object $conn - spojenie s databazou
 * 
 * @return void
 */
function createStudent($conn,$formFirstName, $formSecondName, $formAge, $formLife, $formCollage){
    //ochrana pred sql injection. Otazniky sluzia ako placeholder, cize kazdy otaznik drzi miesto premennej, ktora sa tam nacita neskor
    $sql = "INSERT INTO student (first_name, second_name, age, life, collage) VALUES (?, ?, ?, ?, ?)";

    //príprava na odoslanie dotazu
           $statement = mysqli_prepare($conn, $sql);
    
           if($statement === false){
                echo mysqli_error($conn);
           }else {
                //funkcia vymeni otazniky za hodnoty. Musim definovat datove typy stlpcov napr.:first_name je string cize (s), second_name je (s),age je (i)
                mysqli_stmt_bind_param($statement, "ssiss", $formFirstName, $formSecondName, $formAge, $formLife, $formCollage);
                
                //odoslanie dotazu
                if (mysqli_stmt_execute($statement)) {
                        $last_id = mysqli_insert_id($conn);
                        //echo "Student was saved with id = $last_id";
                       // header("Location:one-student.php?id=$last_id");
                        redirectUrl("/clone/school-system/admin/one-student.php?id=$last_id");
                }else {
                    echo mysqli_stmt_error($statement);
                }
           
           }
}