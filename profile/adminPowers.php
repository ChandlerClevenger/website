<?php
include_once("../connection.php");

$query = "SELECT * FROM USER";
$sql = $conn->prepare($query);
$sql->execute();
$result = $sql->fetchAll();

echo "<table>";
echo 
"<tr>
<th>Id</th><th>Username</th>
<th>Password</th><th>Email</th>
<th>DOB</th><th>FavColor</th>
<th>BIO</th><th>Gender</th>
<th>DateCreated</th>
</tr>";
foreach($result as $r) {
    echo "<tr>";
    echo "<td>". $r["Id"] . "</td>";
    echo "<td>". $r["Username"] . "</td>";
    echo "<td>". $r["Password"] . "</td>";
    echo "<td>". $r["Email"] . "</td>";
    echo "<td>". $r["DOB"] . "</td>";
    echo "<td>". $r["FavColor"] . "</td>";
    echo "<td>". $r["BIO"] . "</td>";
    echo "<td>". $r["Gender"] . "</td>";
    echo "<td>". $r["DayCreated"] . "</td>";
    echo "</tr>";
}
echo "</table>";