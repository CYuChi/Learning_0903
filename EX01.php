<!DOCTYPE html>
<?php
    function day($start , $end){
        for($i = $start ; $i <= $end ; $i++){
            echo "<option value=" . $i . ">" . $i . "</option>";
        } 
    }
?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Chi Try & Learn</title>
    </head>

    <body>
        <h3>Chi Try & Learn</h3>
        <h2>0903 Try1</h2>
        <hr>
            <?php   include "menu.php"; ?>
        <hr>
       
        <form method=POST action="response.php">
            民國
            <select name = year>
                <?php
                    day(50,109);
                ?>
            </select>年
            <select name = month>
                <?php
                    day(1,12);
                ?>
            </select>月
            <select name = day>
                <?php
                    day(1,31);    
                ?>
            </select>日

            <input type = submit value = "轉換">
        </form> 
        
        <hr>
        <?php   include "footer.php";   ?>
    </body>
</html>