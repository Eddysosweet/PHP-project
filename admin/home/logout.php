<?php
    session_start();
    if(isset($_SESSION['myEmail'])){
        unset($_SESSION['myEmail']);
    }
    header('location:.././../user/');
?>