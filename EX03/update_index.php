<?php
    $message = $_POST["message"];
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
    $sql = "UPDATE playlist SET name='$message' WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    $conn->close();
    header("Location: index.php");
    exit;
?>