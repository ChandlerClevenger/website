<?php
session_start();
$ISBN = $_POST['ISBN'];
$name = $_POST['name'];
$price = $_POST['price'];
$author = $_POST['author'];
$fileName = $_FILES['picture']['name'];
if($_FILES['picture']['size'] == 0) {
    $error[] = "FILE IS TOO LARGE. PLEASE GO BELOW 2Mb";
}

if($_FILES['picture']['error']) {
    $error[] = "\$_FILES Error Code: ". $_FILES['picture']['error'];
}

if(strlen($ISBN) != 13) {
    $error[] = "ISBN needs to be 13 digits long.";
}
if(!is_numeric(intval($ISBN))) {
    $error[] = "ISBN needs to be 13 digits.";
}
if(strlen($author) > 70) {
    $error[] = "Author name must be at most 70 characters.";
}
if(strlen($name) > 70) {
    $error[] = "Book name must be at most 70 characters.";
}
if(strlen($fileName) > 30) {
    $error[] = "Image name must be at most 30 characters.";
}
if($price > 99999999) {
    $error[] = "Price must be below 99999999.";
}

include("../connection.php");
$query = "SELECT COUNT(*) FROM BOOK WHERE ISBN=:ISBN OR ImgLocation=:i";
$sql = $conn->prepare($query);
$sql->execute(["ISBN"=>$ISBN,"i"=>$fileName]);
$alreadyExists = $sql->fetch()[0];
if($alreadyExists) {
    $error[] = "DUPLICATE ISBN OR IMG LOCATION!";
}

if(isset($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../profile");
    return;
}
move_uploaded_file($_FILES['picture']['tmp_name'], '../images/'.$fileName);

include("../connection.php");
$query = "INSERT INTO BOOK (ISBN, Name, Price, Author, ImgLocation)
VALUES (:ISBN, :n, :p, :a, :i)";
$sql = $conn->prepare($query);
$sql->execute(["ISBN"=>$ISBN, "n"=>$name, "p"=>$price, "a"=>$author, "i"=>$fileName]);

$_SESSION['success'] = true;
header("Location: ../profile");