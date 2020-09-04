<?php 
    session_start(); 
    $user_type = $_SESSION["user_type"];
    //$redir = $_GET["redir"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Chi Try & Learn</title>
        <link rel="stylesheet" type="text/css" href="EX02.css">
    </head>
    <body>
        <h3>Chi Try & Learn</h3>
        <img src="banner_logo1.jpg" width = 900><br>
        <hr>
            <?php
                include "menu.php";
            ?>
        <hr>
        <?php
            //order by ""  <<<<< sql 針對 "" 查詢
            $sql = "SELECT * FROM news order by id desc";
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
                echo "<form method=POST action=post.php>";
                echo "訊息 : <input type=text name=message size = 40>";
                echo "<input type=submit value=張貼>";
                echo "</form>";
                echo "<button><a href=logout.php>登出</a></button>";
                echo "<hr>";
            }       

            if ($result->num_rows > 0) {    //檢查紀錄的數目
                // output data of each row
                echo "<table width = 700>";
                //如果有沒登入就不會有管理欄位
                if($user_type ==NULL)
                    echo "<tr bgcolor=#ff8888><td> 訊息 </td><td> 時間 </td></tr>";
                else
                    echo "<tr bgcolor=#ff8888><td> 訊息 </td><td> 時間 </td><td> 管理 </td></tr>";
                //內部資料顯示
                while($row = $result->fetch_assoc()) {
                    $id = $row["id"];

                    echo "<tr><td>" . $row["message"]. "</td><td>" . $row["postdate"]. "</td>";
                    if($user_type != NULL){
                        echo "<td>";
                        echo "<a href='edit.php?id=$id'>編輯</a>";
                        echo " -";
                        echo "<a href='delete.php?id=$id'> 刪除 </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } 
            else 
                echo "0 results";

            $conn->close();
            
            
        ?>
        <hr>
        <?php
            include "footer.php";
        ?>
    </body>
</html>