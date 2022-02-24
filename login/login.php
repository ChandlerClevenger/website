<?php
session_start();
include_once("../connection.php");
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM USER WHERE Username=:u";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$username]);
$result = $sql->fetch(PDO::FETCH_ASSOC);

if(password_verify($password, $result["Password"])) {
    $_SESSION['user'] = $username;
    header("Location: ../profile");
} else {
    $_SESSION['error'] = $username . " " . $password;
    header("Location: ../login");
}

$conn = null;