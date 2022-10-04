<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/UserDAL.php   ';
$dal = new UserDAL();
$id = $_GET['id'];
$user = $dal->getOne($id);

if (isset($_POST['name'])) {
    if($_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['password']) {
        $dal->updateOne($id,$_POST);
        header("location:list.php");
    }else {
        $_SESSION['fail'] = 'Bạn phải nhập tất cả thông tin';
        header('location:add.php');
    }
}
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-2  p-0 border-end h-screen position-relative">
            <div id="slidebars">
                <ul class="mt-1">
                    <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;" class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../admin.php">
                            <i class="me-2 text-red-600 fa-solid fa-house"></i>Trang chủ
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../lecturer/list.php">
                            <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Danh sách giảng viên
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../courses/list.php">
                            <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Danh sách lớp học
                        </a>
                    </li>

                    <li class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-sm hover:text-white font-bold" href="">
                            <i class="text-yellow-500 me-2 fa-solid fa-user-gear"></i>Danh sách người dùng
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../cart/list.php">
                            <i class="me-2 text-green-700 fa-regular fa-images"></i>Đơn đặt hàng
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-12 col-md-10 p-2">
            <h2 class="uppercase font-bold text-center mt-5">Thay đổi thông tin tài khoản</h2>
            <div class="modal-body mt-5">
                <form method="post" class="row g-3" enctype="multipart/form-data">
                    <div class="my-3">
                        <h4 class="my-2">Họ và tên </h4>
                        <input type="text" name="name" class="form-control" placeholder="họ và tên" value="<?php echo $user->name ?>">
                    </div>
                    <div class="my-3">
                        <h4 class="my-2">Email</h4>
                        <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $user->email ?>">
                    </div>
                    <div class="my-3">
                        <h4 class="my-2">Mật khẩu</h4>
                        <input type="text" name="password" class="form-control" placeholder="mật khẩu" value="<?php echo $user->password ?>">
                    </div>
                    <div class="my-3">
                        <h4 class="my-2">Số điện thoại</h4>
                        <input type="text" name="phone" class="form-control" placeholder="số điện thoại" value="<?php echo $user->phone ?>">
                    </div>
                    <div class="text-red-500 mb-2 text-sm md:text-lg"><?php if(isset($_SESSION['fail'])){
                            echo $_SESSION['fail'];
                            unset($_SESSION['fail']);
                        } ?></div>
                    <div class="my-3">
                        <input type="submit" value="Cập nhật" class="btn px-5 text-white bg-success">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include "../commons/admin-footer.php";
?>


?>
