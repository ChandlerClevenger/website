<?php
echo "<form action='./insertbook.php' method='POST' enctype='multipart/form-data'>";
echo "<label for='ISBN'>ISBN-13: </label><input type='text' name='ISBN' id='ISBN' max=13>";
echo "<label for='name'>Name: </label><input type='text' name='name' id='name' max=70>";
echo "<label for='price'>Price: </label><input type='number' name='price' id='price' step=0.01 max=99999999>";
echo "<label for='author'>Author: </label><input type='text' name='author' id='author' max=70>";
echo "<label for='picture'>Picture: </label><input type='file' accept='image/*' name='picture' id='picture'>";
echo "<input type='submit' name='submit' value='Add Book'>";
echo "</form>";
echo "<div id='error'>";
if(isset($_SESSION['error'])) {
    echo implode("", $_SESSION['error']);
    unset($_SESSION['error']);
}
echo "</div>";

if(isset($_SESSION['success'])) {
    echo "Successful upload!";
    unset($_SESSION['success']);
}