<?php
    $id = $_GET["id"];
    $pid = $_GET["pid"];
    $name = $_GET["name"];
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
    //使用SELECT指令找出要編輯得對象
    $sql = "SELECT * from video WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {    //檢查紀錄的數目
       
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $title = $row["title"];
        $vid = $row["vid"];
        $pid = $row["pid"];

        echo "<form method=POST action=update_tv.php>";
        echo "<input type=hidden value=$id name=id>";
        echo "<input type=hidden value='$name' name= name>";
        echo "<input type=hidden value='$pid' name= pid>";
        echo "影片名稱 ( 請修改 ) ： <input type=text value = '$title' size = 30 name = title><br>";
        echo "影片網址 ( 請修改 ) ： <input type=text value = '$vid' size = 30 name = vid><br>";
        echo "<input type=submit value=修改>";
        echo "</form>";
        echo "<a href = 'tvshow.php?pid=$pid&name=$name'>不修改，直接回去</a>";
        
        //echo "<td>" . $row["message"]. "</td><td>" . $row["postdate"]. "</td>";
    } 
    else {
        echo "找不到要編輯的紀錄<br>";
        echo "<a href='tvshow.php?pid=$pid&name=$name'>回上頁</a>";
    }
    $conn->close();
    //header("Location: tvshow.php?pid=$pid&name=$name");

?>
