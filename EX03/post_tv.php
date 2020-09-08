<?php

    $title = $_POST["title"];
    $vid = $_POST["vid"];
    $pid = $_POST["pid"];

    //echo $title . $vid . $pid;    test

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
    $sql = "INSERT INTO video (title , vid , pid ) 
    VALUES ('$title' , '$vid' , '$pid')";

    $result = $conn->query($sql);
    $conn -> close();
    header("Location: index.php");
    exit;
    
?>