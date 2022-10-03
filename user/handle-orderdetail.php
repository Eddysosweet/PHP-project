<?php
$conn = mysqli_connect("localhost","root","","unica");
include_once '../DAL/OrderDetailDAL.php';
include_once '../DAL/CartDetailDAL.php';
include_once '../DAL/CartDAL.php';
include_once '../DAL/CourseDAL.php';
$course = new CourseDAL();
$cart = new CartDAL();
$cart_detail = new CartDetailDAL();
$order_detail = new OrderDetailDAL();
$date = $_GET['date'];
$user_id = $_GET['user_id'];
$query = mysqli_query($conn,"SELECT * FROM orders WHERE created_date = '$date'");
$rs = mysqli_fetch_assoc($query);
$order_id = $rs['id'];
$cart_id = $cart->getOneByUserID($user_id)->id;
$list = $cart_detail->getListByCartId($cart_id);

foreach ($list as $value) {

    $id = $value->course_id;
    $item = $course->getOne($id);
    $order_detail->addOne($id,$item->name,$item->image,$item->time,$order_id,$item->price,$item->description);

}
$cart_detail->resetTable();
header("location:order.php");
?>