<?php 
session_start();
include("../connection.php");
$query = "SELECT * FROM CART WHERE Username=:u;";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$_SESSION['user']]);
$result = $sql->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <title>Cart</title>
</head>
<body>
    <?php 
        include("../view/cartTable.php")
    ?>
    <button id="update">Update Cart</button>
</body>
</html>