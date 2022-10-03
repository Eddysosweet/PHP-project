<?php
include_once '../DAL/CartDetailDAL.php';
$cart_detail = new CartDetailDAL();
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if (is_numeric($id) && $_GET['action'] == 'delete') {
        $cart_detail->deleteOne($id);
        header("location:cart.php");
    }
}
?>
