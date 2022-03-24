<?php 
session_start();
include("../connection.php");
$user = $_SESSION['user'];

if ( isset($_POST['quantity']) && isset($_POST['id']) ) {
    $quantity = $_POST['quantity'];
    $itemId = $_POST['id'];
    $query = "INSERT INTO CART VALUES (:u, :ISBN, :q)";
    $sql = $conn->prepare($query);
    $sql->execute(["u"=>$user, "ISBN"=>$itemId, "q"=>$quantity]);
    $_SESSION['cartSubmitted'] = true;
    unset($_POST['quantity']);
    unset($_POST['id']);
    header('Location: ../cart');
}

$query = "SELECT Username, ISBN, SUM(Quantity) AS Total FROM CART WHERE Username=:u GROUP BY ISBN;";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$user]);
$result = $sql->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <title>Cart</title>
</head>
<body>
    <?php 
        echo "<table>";
        echo 
        "<tr>
        <th>ISBN-13</th>
        <th>Book Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
        </tr>";
        
        foreach($result as $r) {
            $ISBN = $r["ISBN"];
            $query = "SELECT * FROM BOOK WHERE ISBN=:ISBN";
            $sql = $conn->prepare($query);
            $sql->execute(["ISBN"=>$ISBN]);
            $book = $sql->fetch();

            echo "<tr>";
            echo "<td>". $r["ISBN"] . "</td>";
            echo "<td>". $book["Name"] . "</td>";
            echo "<td>". $r["Total"] . "</td>";
            $price = $book["Price"] * $r["Total"];
            echo "<td>$".  number_format($price, 2)  . "</td>";
            echo "<td>". "<img src='..\images\\". $book["ImgLocation"] ."'>". "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>