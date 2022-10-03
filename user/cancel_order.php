<?php
include_once '../DAL/OrderDAL.php';
$dal = new OrderDAL();
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if (is_numeric($id) && $_GET['action'] == 'cancel') {
        $dal->cancelOrder($id);
        header("location:order.php");
    }
}
?>
