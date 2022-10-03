<?php
include_once '../DAL/OrderDAL.php';
$order = new OrderDAL();
$user_id = $_GET['user_id'];
$sub_total = $_GET['total'];
$date = date('d/m/Y - H:i:s');
$order->addOne($date,$user_id,$sub_total);
header('location:handle-orderdetail.php?date='.$date.'&user_id='.$user_id);

?>
