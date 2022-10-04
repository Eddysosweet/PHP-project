<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/UserDAL.php   ';
$dal = new UserDAL();
$list = $dal->getList();
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $user = $dal->getOne($id);
    if (is_numeric($id) && $_GET['action'] == 'delete') {
        $dal->deleteOne($id);
        header("location:list.php");
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
            <h2 class="uppercase font-bold text-center mt-5">Danh sách tài khoản</h2>
            <div class="mx-5 my-3">
                <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                    <thead class="bg-sky-500 text-white">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($list as $value) {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value->name ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->password ?></td>
                            <td><?php echo $value->phone ?></td>
                            <td class="pl-0"><a onclick="return confirm('Bạn có chắc chắn muốn xoá tài khoản này?')"
                                                class="btn btn-danger"
                                                href="?action=delete&id=<?php echo $value->id; ?>">Xoá</a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="col-4 center">
                <form class="mx-5 my-3">
                    <div class="flex justify-center">
                        <input class="form-control me-2 " type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Tìm kiếm</button>
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
