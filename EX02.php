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
        <h2>快訊快訊</h2>
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
                echo "<tr bgcolor=#ff8888><td> 編號 </td><td> 訊息 </td><td> 時間</td>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["message"]. "</td><td>" . $row["postdate"]. "</td></tr>";
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