<?php 
    $pid = $_GET["pid"];
    $vid = $_GET["vid"];
    session_start(); 
    $user_type = $_SESSION["user_type"];
    $page_name = $_GET["name"];
    $tag = "https://www.youtube.com/embed/^^^^";
    $imgtag = "https://i.ytimg.com/vi/^^^^/hqdefault.jpg";
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Chi Try & Learn</title>
        <link rel="stylesheet" type="text/css" href="../css/EX02.css">
        <script src="tvshow.js"></script>
    </head>
    <body style="margin:0 auto ; border:0">
        <h3>Chi Try & Learn</h3>
        <h1><?php echo $page_name ?></h1>
        <hr>
            <?php
                include "../includes/menu.php";?>
        <hr>
        <?php
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
        ?>
        <!-- 初始化影片 -->
        
        <!-- 嵌入youtube影片 use html -->
        <div id="screen" style="margin:10 auto  ; position:relative ; left:35% ">
            <?php
                echo "<iframe  width='560' height='315' src='" . str_replace("^^^^",$vid , $tag). "'frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            ?>
        </div>

        <?php
            //order by ""  <<<<< sql 針對 "" 查詢
            $sql = "SELECT * FROM video WHERE pid='$pid'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {    //檢查紀錄的數目
                echo "<center>";
                // 影片集的TABLE
                echo "<table width=800>";
                // 如果放在迴圈裏面 ，</tr>會自己補上
                echo "<tr>";
                $vc = 0;
                while($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $vid = $row['vid'];
                    echo "<td><a href=javascript:choice_change('". $row['vid']."');>" . $row["title"] . "</a><br>";
                    echo "<img src='" . str_replace("^^^^",$row["vid"] , $imgtag). "'width=200>";
                    echo "</td>";
                    $vc++;
                    if($vc % 4 == 0)
                        echo "</tr>";
                    
                }
                echo "</tr>";
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