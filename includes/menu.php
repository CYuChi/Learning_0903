<?php
    session_start();
    $username = $_SESSION["username"];

    // option 用結合陣列去建構
    $menudata = array(
        array("name" => "回首頁" ,  "link" => "/mysite/0903/index.php"),
        array("name" => "生日詢問表單" ,   "link" => "/mysite/0903/EX01/index.php"),
        array("name" => "快訊·快訊" ,   "link" => "/mysite/0903/EX02/index.php"),
        array("name" => "我的播放清單" ,   "link" => "/mysite/0903/EX03/index.php"),
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