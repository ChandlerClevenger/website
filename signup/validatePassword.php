<?php
if( strlen($password) < 10 ) {
    $invalidPassword[] = "Password is not at least 10 characters long.";
}

if( !preg_match("/[A-Z]/", $password) ) {
    $invalidPassword[] = "No capital is in your password.";
}

if( !preg_match("/!|@|#|\$|%|\^|&|\*|\(|\)|_|\+/", $password) ) {
    $invalidPassword[] = "Must have a special character!";
}