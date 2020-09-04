<?php
    session_start();
    session_destroy();
    header("Location: EX02.php");
    exit;


?>