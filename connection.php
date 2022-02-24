<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "user";
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e){
    echo $e->getMessage();
    echo '<br>It failed';
}
?>