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


/**
 * Funkcia na overenie uzivatela pomocou emailu a hesla
 * 
 * @param object $conn - spojenie s databazou
 * @param string $email - email z formulara login
 * @param string $password - heslo z formulara login
 * 
 * @return boolean true - ak sa email aj hesla zhoduju, false - ak sa nezhoduju
 */


function authUser($conn, $email, $password) {

     $sql = "SELECT password FROM user WHERE email = ?";

     $statement = mysqli_prepare($conn, $sql);

     if ($statement === false) {
          echo mysqli_error($conn);
     } else {
          mysqli_stmt_bind_param($statement, "s", $email);

          if (mysqli_stmt_execute($statement)) {
               $result = mysqli_stmt_get_result($statement);
               
               // do db_password_hash sa ulozi pole[] kde je hash hesla z databazy
               $db_password_hash = mysqli_fetch_row($result);

               $user_password_hash = $db_password_hash[0];

               if ($user_password_hash) {
                    return password_verify($password, $user_password_hash);
               }

          } else {
               echo mysqli_stmt_error();
          }
          
     }
     



} 