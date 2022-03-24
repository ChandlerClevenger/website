<?php 
session_start();
if(!isset($_SESSION['user'])) header("Location: ../login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div id="welcome">Hello, <?php echo $_SESSION['user']; ?>.</div>
    <?php
        if($_SESSION['user'] == "adminadmin12"){
            //include("adminPowerSeeUsers.php");
            include("adminPowerAddItem.php");
        } else {
            include("normalUser.php");
        }
    ?>
</body>
</html>