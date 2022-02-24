<?php
session_start();
include_once("../connection.php");
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST["confirm-password"];
$email = $_POST["email"];
$DOB = $_POST["dob"];
$color = $_POST["favorite-color"];
$BIO = $_POST["bio"];
$gender = $_POST["gender"];

//need to change to validateInput instead and do all my validation there
include("./validatePassword.php");
if( isset($invalidPassword) ) {
    $_SESSION["error"] = $invalidPassword;
    unset($invalidPassword);
    header("Location: ../signup");
    return;
}

$password = password_hash($password, PASSWORD_BCRYPT);

$query = "SELECT COUNT(*) FROM USER WHERE username=:u";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$username]);
$result = $sql->fetchAll();

if( $result[0][0] ){
    $_SESSION["error"] = array("Username is already being used.");
    header("Location: ../signup");
    return;
}

$query = "INSERT INTO USER 
(Username, Password, Email, DOB, FavColor, BIO, Gender, DayCreated)
VALUES (:u, :p, :email, :dob, :color, :bio, :gender, :created);";
$sql = $conn->prepare($query);
$sql->execute([
    "u"=>$username, 
    "p"=>$password,
    "email"=>$email,
    "dob"=>$DOB,
    "color"=>$color,
    "bio"=>$BIO,
    "gender"=>$gender,
    "created"=>gmdate("Y-m-d H:i:s")
]);
$_SESSION['user'] = $username;
header("Location: ../profile");

$conn = null;
// certainly re-factorable with the logical flow of decisions
// and to make the error printing better in ./index.php