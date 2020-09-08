<?php 
    $pid = $_GET["pid"];
    session_start(); 
    $user_type = $_SESSION["user_type"];
    $page_name = $_GET["name"];
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
        <h1><?php echo $page_name ?></h1>
        <hr>
            <?php
                include "../includes/menu.php";?>
        <hr>
        <?php
            //order by ""  <<<<< sql 針對 "" 查詢
            $sql = "SELECT * FROM video WHERE pid='$pid'";
            $result = $conn->query($sql);
            //如果未登入顯示登入
            if($user_type != NULL){
                echo "<form method=POST action=post_tv.php>";
                echo "<input type=hidden value='$page_name' name= name>";
                echo "<input type=hidden value='$pid' name=pid>";
                echo "影片標題 : <input type=text name=title size = 40><br>";
                echo "影片網址 : <input type=text name=vid size = 40><br>";
                echo "<input type=submit value=新增>";
                echo "</form>";
            }       

            if ($result->num_rows > 0) {    //檢查紀錄的數目
                // output data of each row
                echo "<table width = 1000>";
                //如果有沒登入就不會有管理欄位
                if($user_type ==NULL)
                    echo "<tr bgcolor=#ff8888><td> 標題 </td><td>影片ID</td></tr>";
                else
                    echo "<tr bgcolor=#ff8888><td> 標題 </td><td>影片ID</td><td> 管理 </td></tr>";
                //內部資料顯示
                while($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    echo "<tr>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["vid"] . "</td>";

                    if($user_type != NULL){
                        echo "<td>";
                        echo "<a href='edit_tv.php?id=$id&name=$page_name&pid=$pid'>編輯</a>";
                        echo " -";
                        echo "<a href='delete_tv.php?id=$id&name=$page_name&pid=$pid'> 刪除 </a>";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } 
            else 
                echo "0 results";

            $conn->close();
        ?>
        <hr>
        <?php
            include "../includes/footer.php";
        ?>
    </body>
</html>