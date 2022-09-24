<?php
session_start();
include_once '../DAL/UserDAL.php';
$dal = new UserDAL();
if(isset($_POST['name'])){
    if($_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['password'] && $_POST['repassword']){
        if($_POST['password'] !== $_POST['repassword']){
            $_SESSION['fail'] ='Mật khẩu không trùng nhau';
            header("location:register.php");
        }else{
            $dal->addOne($_POST);
            $_SESSION['success']= 'Đăng ký thành công , vui lòng đăng nhập để sử dụng';
            header("location:login.php");
        }

    }else{
        $_SESSION['fail'] = 'Bạn phải nhập tất cả các ô';
        header("location:register.php");
    }

}
?>
