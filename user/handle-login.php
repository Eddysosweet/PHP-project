<?php
session_start();
include_once '../DAL/UserDAL.php';
$dal = new UserDAL();
$list = $dal->getList();
if (isset($_POST['username'])) {
    if($_POST['username'] && $_POST['username'] ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check = $dal->check($username, $password);
        echo $check;
        if ($check == 1) {
            $_SESSION['user'] = [
                'email' => $username,
                'password' => $password
            ];
            header("location:../index.php");
        } else {
            $_SESSION['fail'] = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
            header("location:login.php");
        }
    }else{
        $_SESSION['fail'] = 'Bạn phải nhập tên đăng nhập và mật khẩu';
        header("location:login.php");
    }
}

?>
