<?php
    include ".././database/db.php";
    $db = new Database();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $db->delete($id);
?>