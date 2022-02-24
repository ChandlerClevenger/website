<?php
session_start();
include_once("../connection.php");
$username = $_POST['username'];
$password = $_POST['password'];
include("./validatePassword.php");
if( isset($invalidPassword) ) {
    $_SESSION["error"] = $invalidPassword;
    unset($invalidPassword);
    header("Location: ../signup");
    return;
}
unset($invalidPassword);
$password = password_hash($password, PASSWORD_BCRYPT);

$query = "SELECT COUNT(*) FROM users WHERE username=:u";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$username]);
$result = $sql->fetchAll();
if( $result[0][0] ){
    $_SESSION["error"] = "Username is already being used.";
    header("Location: ../signup");
}

$query = "INSERT INTO users (username, password) VALUES (:u, :p)";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$username, "p"=>$password]);
$_SESSION['user'] = $username;
header("Location: ../profile");

$conn = null;
// certainly re-factorable with the logical flow of decisions
// and to make the error printing better in ./index.php