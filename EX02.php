<?php 
    session_start(); 
    
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
        <form method="POST" action="checkpass.php">
            <!-- 將來源網址一倂post出去，但不讓人看到，所以用hidden -->
            <!--<input type="hidden" name="redir" value=<?php echo $redir; ?>> -->
            密碼 : <input type="text" name="password">
            <input type="submit" value="登入">
        </form>
        <hr>

        <?php
            //order by ""  <<<<< sql 針對 "" 查詢
            $sql = "SELECT * FROM news order by id desc";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {    //檢查紀錄的數目
                // output data of each row
                echo "<table width = 700>";
                echo "<tr bgcolor=#ff8888><td> 編號 </td><td> 訊息 </td><td> 時間</td>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["message"]. "</td><td>" . $row["postdate"]. "</td></tr>";
                }
            } 
            else 
                echo "0 results";

            $conn->close();
            
            include "footer.php";
        ?>
        
    </body>
</html>