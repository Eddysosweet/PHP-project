<?php include_once '../../commons/head.php' ?>
<body>
<?php
session_start();
$email = $_SESSION['user']['email'];
include_once '../../DAL/UserDAL.php';
$user = new UserDAL();
$rs = $user->getOneByEmail($email);
if(isset($_POST['name'])){
    if($_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['password']){
        $user->updateOne($rs->id,$_POST);
        header("location:account.php");
    }else{
        $_SESSION['fail']= 'Phải điền tất cả thông tin';
        header("location:edit-account.php");
    }
}
?>

<menu class="bg m-0 py-3 fixed-top px-3 ">
    <div class="">
        <div class="row">
            <div class="col-2">
                <img src="https://unica.vn/media/img/logo-unica.svg" alt="logo-image"
                     class=" w-24 logo-image d-flex m-auto pt-2">
            </div>
            <div class="col-10 list-menu">
                <ul class="d-none d-lg-block list-inline m-0 float-end">
                    <li class="list-inline-item me-4">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm"
                                   aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid
                                            fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-0" href="../../index.php">Trang
                            chủ</a>
                    </li>
                    <li class="nav-item dropdown list-inline-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Khoá học
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../courses.php">Danh
                                    sách tất cả khoá học</a></li>
                            <li><a class="dropdown-item" href="#">Khoá
                                    học của tôi</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-2" href="../contact.php">Liên
                            hệ</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown list-inline-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-person-circle"></i><?php echo $_SESSION['user']['email'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../handleLogout.php">Đăng xuất</a></li>
                                <li><a class="dropdown-item" href="../order.php">Quản lí đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Quản lí tài khoản</a></li>
                            </ul>
                        </li>
                        <li class="list-inline-item me-2">
                            <a href="../cart.php"><i
                                        class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="list-inline-item me-4">
                            <a class="nav-link px-1" href="../login.php">Đăng
                                nhập</a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a class="nav-link px-1" href="../register.php">Đăng
                                ký</a>
                        </li>
                        <li class="list-inline-item me-2">
                            <a href="../login.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <div class="d-block d-lg-none float-end">
                    <button class="btn btn-outline-none p-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class='bx bx-menu bx-md bx-flip-vertical'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header ">
            <img class="logo-image w-25" src="https://unica.vn/media/img/logo-unica.svg" alt="">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="text-xl text-danger fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="p-0">
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="bi bi-person-circle"></i><?php echo $_SESSION['user']['email'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../handleLogout.php">Đăng xuất</a></li>
                            <li><a class="dropdown-item" href="../order.php">Quản lí đơn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Quản lí tài khoản</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link text-dark" href="../login.php">Đăng nhập</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link text-dark" href="../register.php">Đăng ký</a>
                    </li>
                    <?php
                }
                ?>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="../../index.php">Trang chủ</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="#">Liên hệ</a>
                </li>


                <li class="list-group-item list-group-item-action">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Khoá học
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../courses.php">Danh sách tất cả khoá học</a></li>
                        <li><a class="dropdown-item" href="#">Khoá học của tôi</a></li>
                    </ul>
                </li>


                <li class="list-group-item list-group-item-action">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="../cart.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="../login.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</menu>
<div class="container">
    <div style="border-radius: 5px; border: 1px solid rosybrown;">
        <h1 class="text-center text-3xl py-9">Thay đổi thông tin</h1>
        <form class="sm:px-9 input_form" method="post">
            <label class="font-bold">Họ Tên</label>
            <input class="w-full my-2 p-1 border rounded" type="text" name="name" value="<?php echo $rs->name ?>"
                   placeholder="Họ và tên">
            <label class="font-bold">Email</label>
            <input class="w-full my-2 p-1 border rounded" type="email" name="email" value="<?php echo $rs->email ?>"
                   placeholder="Email">
            <label class="font-bold">Số điện thoại</label>
            <input class="w-full my-2 p-1 border rounded" type="text" name="phone" value="<?php echo $rs->phone ?>"
                   placeholder="Số điện thoại">
            <label class="font-bold">Mật Khẩu</label>
            <input class="w-full my-2 p-1 border rounded" type="text" name="password" value="<?php echo $rs->password ?>"
                   placeholder="Mật khẩu">
            <div class="text-red-500 p-1 my-2"><?php if(isset($_SESSION['fail'])){
                    echo $_SESSION['fail'];
                    unset($_SESSION['fail']);
                } ?></div>
            <div class="text-center my-9">
                <input type="submit" class="btn btn-success text-green-700" value="Cập nhật">
            </div>
        </form>
    </div>
</div>


</div>
<?php include_once '../../commons/body-footer.php' ?>
<style>
    .container {
        width: 80%;
        margin: 6rem auto;
    }

    #main {
        width: 80%;
        margin: 0 auto;
    }

    .btn:focus,
    .btn-close:focus {
        box-shadow: none;
    }


    .bg {
        background-color: #fff;
        box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
    }

    .list-menu ul li a {
        font-size: 1.1rem;
        color: #333;
    }
</style>
</body>
</html>