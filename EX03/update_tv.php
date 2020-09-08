<?php
    $title = $_POST["title"];
    $vid = $_POST["vid"];
    $pid = $_POST["pid"];
    $name = $_POST["name"];

    $id = $_POST["id"];
    if($id==NULL){
        header("Location: index.php");
        exit;
    }
    
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
    //使用UPDATE指令找出要編輯得對象
    $sql = "UPDATE video SET title ='$title' , vid = '$vid'  
        WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    $conn->close();
    header("Location: tvshow.php?pid=$pid&name=$name");
    exit;
?>