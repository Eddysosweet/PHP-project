<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/LecturerDAL.php';
$dal = new TeacherDAL();
$list = $dal->getList();
?>

<div class="container-fluid">
    <?php
    if (isset($_SESSION['fail'])){
        echo
            '<div class="bg-blue-500 bg-red-200 text-red-800  py-2 px-4 rounded">' . $_SESSION['fail'] . '</div>';
        unset($_SESSION['fail']);
    } ?>

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
                        <a class="text-sm hover:text-white font-bold" href="">Danh sách giảng viên
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
        <div class="col-9 col-md-10 p-2">
            <h2 class="uppercase font-bold text-center mt-5">Danh sách giảng viên</h2>
            <div class="mx-5 my-3">
                <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                    <thead class="bg-sky-500 text-white">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Bằng cấp</th>
                        <th colspan="2">Thao tác</th>
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
                            <td><img class="m-auto" style="width: 50px;" src="<?php echo './../../' . $value->avatar ?>"
                                     alt="#"/></td>
                            <td><?php echo $value->degree ?></td>
                            <td class="pr-0"><a class="btn btn-warning " href="edit.php?id=<?php echo $value->id; ?>">Sửa</a>
                            </td>
                            <td class="pl-0"><a onclick="return confirm('Are you sure you want to delete ?')"
                                                class="btn btn-danger"
                                                href="delete.php?action=delete&id=<?php echo $value->id; ?>">Xoá</a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <a href="add.php" class="btn btn-primary mx-5 my-3">Thêm</a>

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
