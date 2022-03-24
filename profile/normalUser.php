<?php
include_once("../connection.php");

$query = "SELECT * FROM BOOK";
$sql = $conn->prepare($query);
$sql->execute();
$result = $sql->fetchAll();

echo "<table>";
echo 
"<tr>
<th>ISBN-13</th>
<th>Name</th>
<th>Price</th>
<th>Author</th>
<th>Image</th>
</tr>";

foreach($result as $r) {
    echo "<tr data-id='". $r["ISBN"] ."'>";
    echo "<td>". $r["ISBN"] . "</td>";
    echo "<td>". $r["Name"] . "</td>";
    echo "<td>". "$" . $r["Price"] . "</td>";
    echo "<td>". $r["Author"] . "</td>";
    echo "<td>". "<img src='..\images\\". $r["ImgLocation"]."'>" . "</td>";
    echo "</tr>";
}
echo "</table>";