<?php 
    //require "/mysite/0903/includes/config.php";
    require "../includes/utils.php";
    session_start(); 
    $user_type = $_SESSION["user_type"];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Chi Try & Learn</title>
        <link rel="stylesheet" type="text/css" href="../css/EX02.css">
    </head>
    <body>
    
        <h3>Chi Try & Learn</h3>
        <h1>我的播放清單</h1>
        <hr>
            <?php
                include "../includes/menu.php";?>
        <hr>
        <?php
            //order by ""  <<<<< sql 針對 "" 查詢
            $sql = "SELECT * FROM playlist order by id desc";
            $result = $conn->query($sql);
            //如果未登入顯示登入
            if($user_type == NULL){
                echo "<form method='POST' action='checkpass.php'>";
                echo "密碼 : <input type=password name=password>";
                echo "<input type=submit value=登入>";
                echo "</form>";
            }
            //如果登入了顯示登出
            else{
                echo "<form method=POST action=post_index.php>";

                echo "新播放清單名稱 : <input type=text name=playlist_name size = 40>";
                echo "<input type=submit value=新增>";

                echo "</form>";
                echo "<button><a href=logout.php>登出</a></button>";
                echo "<hr>";
            }       

            if ($result->num_rows > 0) {    //檢查紀錄的數目
                // output data of each row
                echo "<table width = 700>";
                //如果有沒登入就不會有管理欄位
                if($user_type ==NULL)
                    echo "<tr bgcolor=#ff8888><td> 播放清單 </td></tr>";
                else
                    echo "<tr bgcolor=#ff8888><td> 播放清單 </td><td> 管理 </td></tr>";
                //內部資料顯示
                while($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row["name"];
                    
                    $sql = "SELECT * FROM video WHERE pid='$id'";
                    $r = $conn->query($sql);
                    $yap = $r->fetch_assoc();
                    $vid = $yap["vid"];

                    echo "<tr><td><a href=tvshow.php?pid=$id&name=$name&vid=$vid>" . $row["name"]. "</a> ( " . get_video_number($id) . " 支影片 )</td>";
                    if($user_type != NULL){
                        echo "<td>";
                        echo "<a href='edit_index.php?id=$id&name=$name'>編輯</a>";
                        echo " -";
                        echo "<a href='delete_index.php?id=$id&name=$name'> 刪除 </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } 
            else 
                echo "0 results";
            
        ?>
        <hr>
        <?php
            get_counter("EX03");    
        ?>
    </body>
</html>