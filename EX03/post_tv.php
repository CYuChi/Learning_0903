<?php

    $title = $_POST["title"];
    $vid = $_POST["vid"];
    $pid = $_POST["pid"];
    $name = $_POST["name"];

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
    
    
    $sql = "SELECT * FROM video WHERE vid='$vid'";
    $result = $conn -> query($sql);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO video (title , vid , pid ) 
        VALUES ('$title' , '$vid' , '$pid')";
        $conn->query($sql);
    }
    $conn -> close();
    header("Location: tvshow.php?pid=$pid&name=$name");
    exit;
    
?>