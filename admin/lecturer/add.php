<?php
include_once './../../DAL/LecturerDAL.php';
$dal = new TeacherDAL();
if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] !== null) {
    $dir = 'img/uploads/lecturer/' . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], './../../' . $dir);
    if (isset($_POST['name']) && $_POST['name']) {
        $_POST['image'] = $dir;
        $dal->addOne($_POST);
        header("location:list.php");
    }
}
?>
<?php
include_once '../commons/admin-header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 col-md-2  p-0 border-end h-screen position-relative">
            <div id="slidebars">
                <ul class="mt-1">
                    <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;" class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../admin.php">
                            <i class="me-2 text-red-600 fa-solid fa-house"></i>Trang chủ
                        </a>
                    </li>

                    <li class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-sm hover:text-white font-bold" href="">
                            <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Danh sách giảng viên
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../courses/list.php">
                            <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Danh sách khoá học
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../user/list.php">
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
        <div class="col-9 col-md-10 p-0">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-5">
                    <h5 class="modal-title text-2xl text-center" id="exampleModalLabel">Thêm giảng viên</h5>
                    <div class="modal-body mt-5">
                        <form method="post" class="row g-3" enctype="multipart/form-data">
                            <div class="my-3">
                                <h4>Họ và tên </h4>
                                <input type="text" name="name" class="form-control" placeholder="fullname">
                            </div>
                            <div class="my-3">
                                <h4>Ảnh đại diện</h4>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <div class="my-3">
                                <h4>Bằng cấp </h4>
                                <input type="text" name="degree" class="form-control" placeholder="degree">
                            </div>
                            <div class="my-3">
                                <input type="submit" value="Thêm" class="btn px-5 text-white bg-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include "../commons/admin-footer.php";
?>


