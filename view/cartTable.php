<?php
$query = "SELECT * FROM CART WHERE Username=:u";
$sql = $conn->prepare($query);
$sql->execute(["u"=>$_SESSION['user']]);
$result = $sql->fetchAll();

echo "<table id='cart'>";
echo 
"<thead><tr>
<th>ISBN-13</th>
<th>Book Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Image</th>
</tr></thead>";
echo "<tbody>";
foreach($result as $r) {
    $ISBN = $r["ISBN"];
    $query = "SELECT * FROM BOOK WHERE ISBN=:ISBN";
    $sql = $conn->prepare($query);
    $sql->execute(["ISBN"=>$ISBN]);
    $book = $sql->fetch();

    echo "<tr>";
    echo "<td>". $r["ISBN"] . "</td>";
    echo "<td>". $book["Name"] . "</td>";
    echo "<td>". $r["Quantity"] . "</td>";
    $price = $book["Price"] * $r["Quantity"];
    echo "<td>$".  number_format($price, 2)  . "</td>";
    echo "<td>". "<img src='..\images\\". $book["ImgLocation"] ."'>". "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
