<?php
echo "<div id='visited-lable'>VISITED</div>";
echo "<div id='visited-wrapper'><table id='visited'>";
echo
"<thead><tr>
<th>ISBN-13</th>
<th>Book Name</th>
<th>Price</th>
<th>Image</th>
</tr></thead>";
echo "<tbody>";
foreach ($_COOKIE['visited'] as $key => $r) {
    $ISBN = $r;
    $query = "SELECT * FROM BOOK WHERE ISBN=:ISBN";
    $sql = $conn->prepare($query);
    $sql->execute(["ISBN" => $ISBN]);
    $book = $sql->fetch();

    echo "<tr>";
    echo "<td>" . $book["ISBN"] . "</td>";
    echo "<td>" . $book["Name"] . "</td>";
    echo "<td>$" .  number_format($book["Price"], 2)  . "</td>";
    echo "<td>" . "<img src='..\images\\" . $book["ImgLocation"] . "'>" . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table></div>";
