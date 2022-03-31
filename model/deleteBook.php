<?php
session_start();
include("../connection.php");
$user = $_SESSION['user'];
if ( isset($_POST['id']) ) {
    $itemId = $_POST['id'];
    $query = "DELETE FROM CART WHERE Username=:u AND ISBN=:ISBN" ;
    $sql = $conn->prepare($query);
    $sql->execute(["u"=>$user, "ISBN"=>$itemId]);
}

header("Location: ../cart");