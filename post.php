<?php

    $message = $_POST["message"];
    echo $message;


    //Mysql 連結
    $servername = "localhost";
    $username = "root";
    $password = "Wisdom90234";
    $dbname = "bbs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO news (message) values ('$message')";
    $result = $conn->query($sql);
    $conn -> close();
    header("Location: EX02.php");
    exit;
?>