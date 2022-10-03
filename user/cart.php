<?php include_once '../commons/head.php'; ?>
<?php
session_start();
if(isset($_SESSION['fail'])){?>
    <script type='text/javascript'>alert('<?php echo $_SESSION['fail']; ?>')</script>";

<?php
    unset($_SESSION['fail']);
}
?>
<body>
<?php
include_once '../commons/body-menu.php';
$email = $_SESSION['user']['email'];
include_once '../DAL/CartDAL.php';
include_once '../DAL/CourseDAL.php';
include_once '../DAL/CartDetailDAL.php';
include_once '../DAL/UserDAL.php';
$course =new CourseDAL();
$cart = new CartDAL();
$user = new UserDAL();
$cart_detail = new CartDetailDAL();
$user_id = $user->getOneByEmail($email)->id;
$cart_id = $cart->getOneByUserID($user_id)->id;
$list = $cart_detail->getListByCartId($cart_id);

?>


<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-4 text-center">Giỏ hàng của tôi</h3>
        <div class="mx-5 my-3">
            <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                <thead class="bg-sky-500 text-white">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Thời lượng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                $total =0;
                foreach ($list as $value) {

                    $item = $course->getOne($value->course_id);
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $item->name?></td>
                        <td><img class="m-auto" style="width: 50px;" src="<?php echo '../' . $item->image ?>"
                                 alt="#"/></td>
                        <td><?php echo number_format($item->price).' VND'?></td>
                        <td><?php echo $item->description ?></td>
                        <td><?php echo $item->time.' giờ' ?></td>
                        <td class="pl-0"><a onclick="return confirm('Are you sure you want to delete ?')"
                                            class="btn btn-danger"
                                            href="delete_item.php?action=delete&id=<?php echo $value->id; ?>">Xoá</a></td>
                    </tr>
                    <?php
                    $i++;
                    $total +=$item->price;
                }
                ?>
                    <tr>
                        <td rowspan="2"></td>
                        <td class="font-bold" rowspan="2" colspan="5">Tổng cộng: <?php echo number_format($total).' VND' ?></td>
                        <td rowspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <div class="container my-4 text-center">
                <a type="submit" href="courses.php "
                   class="btn text-white text-xl bg-green-600 py-2 border-none my-3 mx-2">
                    Thêm khoá học khác</a>
                <a type="submit" href="handle_order.php?user_id=<?php echo $user_id ?>&total=<?php echo $total ?>&cart_id=<?php echo $cart_id ?>"
                   class="btn text-white text-xl bg-red-500 hover:bg-red-400 py-2 px-5 border-none my-3 mx-2 ">
                    Đặt mua</a>
            </div>
        </div>
    </div>
</div>

<?php include_once '../commons/body-footer.php'; ?>
<style>
    .container {
        width: 80%;
        margin: 0 auto;
    }

    #main {
        width: 80%;
        margin: 0 auto;
    }

    .btn:focus,
    .btn-close:focus {
        box-shadow: none;
    }

    .logo-image {
        width: 100px;
    }

    .bg {
        background-color: #fff;
        box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
    }

    .list-menu ul li a {
        font-size: 1.1rem;
        color: #333;
    }

    .content {
        margin-top: 130px;
    }
</style>
</body>

</html>