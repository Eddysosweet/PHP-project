<?php
session_start();
$email = $_SESSION['user']['email'];
include_once '../DAL/CartDAL.php';
include_once '../DAL/CartDetailDAL.php';
include_once '../DAL/UserDAL.php';
$cart = new CartDAL();
$user = new UserDAL();
$cart_detail = new CartDetailDAL();
$id = $_GET['id'];
$user_id = $user->getOneByEmail($email)->id;
$cart_id = $cart->getOneByUserID($user_id)->id;
$check = $cart_detail->checkId($id, $cart_id);
if ($check == 0) {
    $rs = $cart_detail->addOne($id, $cart_id);
}else{
    $_SESSION['fail'] = 'Khoá học này đã có trong giỏ hàng của bạn';
}
header("location:cart.php");
?>