<?php
    session_start();
    session_regenerate_id();
    if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
        header("location:index.php");
    }
?>
