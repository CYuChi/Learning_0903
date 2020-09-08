<?php
    function get_counter($target){
        global $conn;
        $sql = "SELECT * from counter WHERE name = '$target'";
        $result = $conn -> query($sql);
        
        if ($result -> num_rows > 0) {    //檢查紀錄的數目
            $row = $result -> fetch_assoc();
            $value = $row["value"];
        } 
        else 
            $value = 0;
        $value ++;    
        echo "參觀人次 : " . $value . "人<br>"; 
        $sql = "UPDATE counter set value = $value WHERE name = '$target'";
        $conn -> query($sql);
        $conn->close();  
    }






?>