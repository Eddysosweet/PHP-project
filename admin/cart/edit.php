<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/OrderDAL.php';
include_once './../../DAL/UserDAL.php';
$id = $_GET['id'];
$dal = new OrderDAL();
$user = new UserDAL();
$order = $dal->getOne($id);
$name = $user->getOne($order->user_id)->name;
if(isset($_POST['status']) && $_POST['status']){
    $dal->updateOne($id,$_POST['status']);
}
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

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white ">
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
            <h2 class="uppercase font-bold text-center mt-5">Cập nhật trạng thái đơn hàng</h2>
            <div class="modal-body mt-5">
                <form method="post" class="row g-3" enctype="multipart/form-data">
                    <div class="my-3">
                        <h4>Mã đơn hàng</h4>
                        <input type="text" name="name" class="form-control" placeholder="fullname"
                               value="<?php echo $order->id ?>" disabled>
                    </div>
                    <div class="my-3">
                        <h4>Ngày tạo đơn </h4>
                        <input type="text" name="date" class="form-control" placeholder="date"
                               value="<?php echo $order->created_date ?>" disabled>
                    </div>
                    <div class="my-3">
                        <h4>Người tạo đơn </h4>
                        <input type="text" name="name" class="form-control" placeholder="fullname"
                               value="<?php echo $name ?>" disabled>
                    </div>
                    <div class="my-3">
                        <h4>trạng thái </h4>
                        <select name="status">
                            <option value="0">Đang chờ ...</option>
                            <option value="1">Đã mua !</option>
                            <option value="2">Đã huỷ</option>
                        </select>
                    </div>
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

