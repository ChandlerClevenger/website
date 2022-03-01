<?php
if( strlen($password) < 12 ) {
    $invalidPassword[] = "Password is not at least 10 characters long.";
}

if( !preg_match("/\w*[A-Z]\w*[A-Z]\w*/", $password) ) {
    $invalidPassword[] = "No capital is in your password.";
}

if( !preg_match("/\w*[!|@|#|\$|%|\^|&|\*|\(|\)|_|\+]\w*[!|@|#|\$|%|\^|&|\*|\(|\)|_|\+]\w*/", $password)) {
    $invalidPassword[] = "Must have 2 special character!";
}