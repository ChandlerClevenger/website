<?php
include_once("../connection.php");
try {
    $query = "SELECT * FROM BOOK";
    $sql = $conn->prepare($query);
    $sql->execute();
    $result = $sql->fetchAll();
} catch (exception $e) {
    echo $e. "<br>ERROR FETCHING DATA!";
}

echo "<table id='books'>";
echo 
"<thead><tr>
<th>ISBN-13</th>
<th>Name</th>
<th>Price</th>
<th>Author</th>
<th>Image</th>
</tr></thead>";
echo "<tbody>";
if(isset($result)) {
    foreach($result as $r) {
        echo "<tr data-id='". $r["ISBN"] ."'>";
        echo "<td>". $r["ISBN"] . "</td>";
        echo "<td>". $r["Name"] . "</td>";
        echo "<td>". "$" . $r["Price"] . "</td>";
        echo "<td>". $r["Author"] . "</td>";
        echo "<td>". "<img src='..\images\\". $r["ImgLocation"]."'>" . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>error</td><td>retreiving</td><td>data</td><td>!!!!!</td><td>!!!!!</td></tr>";
}

echo "</tbody></table>";
?>

<div id="actions">
    <h2>Actions<h2>
    
    <button id="checkout" class="button">Checkout</button>
    <?php
        // DISPLAY CART
        try {
            include("../view/cartTable.php");
        } catch (exception $e) {
            echo $e. "FAILURE TO FETCH CART";
        }
    ?>
    <div id="arrow" class="arrows prev"></div>
</div>