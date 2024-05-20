<?php
/**
 * Funkcia vrati jedneho studenta
 * 
 * @param object - pripojenie k databaze
 * @param integer - id konkretneho studenta
 * 
 * @return asociativne pole, ktore obsahuje jedneho konkretneho studenta 
 */

function getStudent($conn, $id){

    $sql = "SELECT * FROM student WHERE id = ?";

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