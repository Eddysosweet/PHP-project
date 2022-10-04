<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/OrderDAL.php';
include_once './../../DAL/UserDAL.php';
$dal = new OrderDAL();
$user = new UserDAL();
$list = $dal->getList();
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

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../lecturer/list.php">
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

                    <li class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-sm hover:text-white font-bold" href="">
                            <i class="me-2 text-green-700 fa-regular fa-images"></i>Đơn đặt hàng
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-9 col-md-10 p-2">
            <h2 class="uppercase font-bold text-center mt-5">Danh sách đơn hàng</h2>
            <div class="mx-5 my-3">
                <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                    <thead class="bg-sky-500 text-white">
                    <tr>
                        <th>ID</th>
                        <th>Ngày tạo đơn</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Người tạo</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($list as $value) {
                        $it = $user->getOne($value->user_id);
                        ?>
                        <tr>
                            <td><?php echo $value->id ?></td>
                            <td><?php echo $value->created_date ?></td>
                            <td><?php echo $value->sub_total.' VND' ?></td>
                            <td class="font-bold"><?php if($value->status == 0){echo 'Đang chờ ...';} if($value->status == 1){ echo 'Đã mua';} ?></td>
                            <td><?php echo $it->name ?></td>
                            </td><td class="pr-0"><a class="btn btn-success" href="order-detail.php?id=<?php echo $value->id; ?>">Chi tiết</a>
                            </td>
                            <td class="pr-0"><a class="btn btn-warning " href="edit.php?id=<?php echo $value->id; ?>">Cập nhật trạng thái</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php
include "../commons/admin-footer.php";
?>

