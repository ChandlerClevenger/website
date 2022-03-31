<?php
session_start();
include("../connection.php");
$user = $_SESSION['user'];
if ( isset($_POST['quantity']) && isset($_POST['id']) ) {
    $quantity = $_POST['quantity'];
    $itemId = $_POST['id'];
    $query = "SELECT COUNT(*) FROM CART WHERE Username=:u AND ISBN=:ISBN" ;
    $sql = $conn->prepare($query);
    $sql->execute(["u"=>$user, "ISBN"=>$itemId]);
    $alreadyIn = $sql->fetch()[0];

    if($alreadyIn) {
        $query = "UPDATE CART SET Quantity = Quantity + :q WHERE Username=:u AND ISBN=:ISBN";
        $sql = $conn->prepare($query);
        $sql->execute(["u"=>$user, "ISBN"=>$itemId, "q"=>$quantity]);
    } else {
        $query = "INSERT INTO CART VALUES (:u, :ISBN, :q)";
        $sql = $conn->prepare($query);
        $sql->execute(["u"=>$user, "ISBN"=>$itemId, "q"=>$quantity]);
    }
} else {
    echo "OH NO! POST VARIABLES WERE NOT SET PROPERLY!";
}
header("Location: ../cart");
?>