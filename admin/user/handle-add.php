<?php
include_once './../../DAL/UserDAL.php';
session_start();
$dal = new UserDAL();
if (isset($_POST['name'])) {
    if($_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['password']) {
        $check = $dal->checkEmail($_POST['email']);
        if($check == 0) {
            $dal->addOne($_POST);
            header("location:list.php");
        }else{
            $_SESSION['failemail']= "Email đã tồn tại";
            header('location:add.php');
        }
    }else {
        $_SESSION['fail'] = 'Bạn phải nhập tất cả thông tin';
        header('location:add.php');
    }
}
?>
