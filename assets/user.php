<?php

/**
 * Funkcia na vytvorenie uzivatela 
 * 
 * @param object $conn - spojenie s databazou
 * 
 * @return integer $last_id - posledne pridane id uzivatela do databazy
 */

function createUser($conn, $firstName, $secondName, $email, $password){
    //ochrana pred sql injection. Otazniky sluzia ako placeholder, cize kazdy otaznik drzi miesto premennej, ktora sa tam nacita neskor
    $sql = "INSERT INTO user (first_name, second_name, email, password) VALUES (?, ?, ?, ?)";

    //príprava na odoslanie dotazu
           $statement = mysqli_prepare($conn, $sql);
    
           if($statement === false){
                echo mysqli_error($conn);
           }else {
                //funkcia vymeni otazniky za hodnoty. Musim definovat datove typy stlpcov napr.:first_name je string cize (s), second_name je (s),age je (i)
                mysqli_stmt_bind_param($statement, "ssss", $firstName, $secondName, $email, $password);
                
                //odoslanie dotazu
                if (mysqli_stmt_execute($statement)) {
                        $last_id = mysqli_insert_id($conn);
                        return $last_id;
                }else {
                    echo mysqli_stmt_error($statement);
                }
           
           }
}