<?php
/**
 * Funkcia presmeruje na zadanu adresu
 * 
 * @param string $path - cesta kam sa ma presmerovat
 * 
 * @return void
 */

function redirectUrl($path){
    if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
        $url_protocol = "https";
    } else {
        $url_protocol = "http";
    }
// localhost je to iste ako $_SERVER["HTTP_HOST"]. Do funkcie si budem posielat cestu

    header("Location:$url_protocol://".$_SERVER["HTTP_HOST"].$path);

}