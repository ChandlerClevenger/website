<?php 
if(!isset($_GET['id'])) header("Location: ../profile");
$itemId = $_GET['id'];

include("../connection.php");
$query = "SELECT * FROM BOOK WHERE ISBN=:i";
$sql = $conn->prepare($query);
$sql->execute(["i"=>$itemId]);
$result = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <title>Item Page</title>
</head>
<body>
    <?php 
    echo "<table>";
    echo 
    "<tr>
    <th>ISBN-13</th>
    <th>Name</th>
    <th>Price</th>
    <th>Author</th>
    <th>Image</th>
    </tr>";
    
    echo "<tr data-id='". $result["ISBN"] ."'>";
    echo "<td>". $result["ISBN"] . "</td>";
    echo "<td>". $result["Name"] . "</td>";
    echo "<td>". "$" . $result["Price"] . "</td>";
    echo "<td>". $result["Author"] . "</td>";
    echo "<td>". "<img src='..\images\\". $result["ImgLocation"] ."'>". "</td>";
    echo "</tr>";
    echo "</table>";
    
    ?>

    <form action="..\cart\index.php" method="POST">
        <lable>Quantity</lable>
        <input type="number" min=1 value=1 name="quantity">
        <input type="text" value="<?php echo $result["ISBN"] ?>" name="id" hidden>
        <input type="submit" value="Add to cart">
    </form>
</body>
</html>