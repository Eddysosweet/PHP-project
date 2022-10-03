<?php
session_start();
include_once '../DAL/UserDAL.php';
include_once '../DAL/CartDAL.php';
$cart = new CartDAL();
$dal = new UserDAL();
var_dump($_POST);
if(isset($_POST['name'])){
    if($_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['password'] && $_POST['repassword']){
        if($_POST['password'] !== $_POST['repassword']){
            $_SESSION['fail'] ='Mật khẩu không trùng nhau';
            header("location:register.php");
        }else{
            $dal->addOne($_POST);
            $_SESSION['success']= 'Đăng ký thành công , vui lòng đăng nhập để sử dụng';
            $user =  $dal->getOneByEmail($_POST['email']);
            $rs =  $cart->addOne($user->id);
            header("location:login.php");

        }

    }else{
        $_SESSION['fail'] = 'Bạn phải nhập tất cả các ô';
        header("location:register.php");
    }

}
?>
