<?php
session_start();

if (isset($_POST['username'])) {
    if($_POST['username'] && $_POST['password']) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $pdo = new PDO("mysql:host=localhost;dbname=unica", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dal = $pdo->prepare("SELECT count(*) FROM admin WHERE username=:username AND password=:password");
        $dal->bindParam(':username', $username);
        $dal->bindParam(':password', $password);

        $dal->execute();
        $rs = $dal->fetchColumn();
        echo $rs;
        if ($rs == 1) {
            $_SESSION['admin'] = [
                'username' => $username,
                'password' => $password
            ];
            header("location:admin.php");
        } else {
            $_SESSION['fail'] = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
            header("location:login-admin.php");
        }
    }else{
        $_SESSION['fail'] = 'Bạn phải nhập tên đăng nhập và mật khẩu';
        header("location:login-admin.php");
    }
}

?>
