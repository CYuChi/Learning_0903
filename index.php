<?php 
    session_start(); 
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Chi Try & Learn</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
        <h3>Chi Try & Learn</h3>
        <h2>歡迎來到我的網站</h2>
        <hr>
            <?php
                include "includes/menu.php";
            ?>
        <hr>
        <?php

            include "includes/footer.php";
        ?>
    </body>
</html>