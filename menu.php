<?php
    session_start();
    $username = $_SESSION["username"];

    // option 用結合陣列去建構
    $menudata = array(
        array("name" => "回首頁" ,  "link" => "index.php"),
        array("name" => "Try 1" ,   "link" => "EX01.php"),
        array("name" => "Try 2" ,   "link" => "EX02.php"),
        array("name" => "Try 3" ,   "link" => "EX03.php"),
        array("name" => "中工" ,   "link" => "http://www.tcivs.tc.edu.tw/ischool/publish_page/0/"),
        array("name" => "高科大" ,  "link" => "https://www.nkust.edu.tw/" )
    );
    //表單
    echo "<form method=POST action=index.php >";
        echo "選單 : <select name = choice >";
            foreach($menudata as $choicedata){
                echo "<option value =" . $choicedata["link"] . ">" . $choicedata["name"] . "</option>"; 
            }
        echo "</select> ";
        echo "<input type= 'submit' value='前往'>" ;
    echo "</form>";
    //測試
    $choice = $_POST["choice"];
    if($choice != NULL){
        //echo $choice;
        header("Location: $choice");
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



?>