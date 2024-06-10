<?php
/**
 * Overuje ci je uzivatel prihlaseny alebo nie
 * 
 * @return boolean true ak je uzivatel prihlaseny inak false
 */

function isLoggedIn(){
    return isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]; 
}