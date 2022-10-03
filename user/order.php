<?php include_once '../commons/head.php'; ?>
<?php

?>
<body>
<?php
include_once '../commons/body-menu.php';
$email = $_SESSION['user']['email'];
include_once '../DAL/UserDAL.php';
$user = new UserDAL();
$user_id = $user->getOneByEmail($email)->id;
include_once '../DAL/OrderDAL.php';
$order = new OrderDAL();
$list = $order->getListByUserId($user_id);

?>


<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-4 text-center">Đơn hàng của tôi</h3>
        <div class="mx-5 my-3">
            <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                <thead class="bg-sky-500 text-white">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày tạo đơn</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
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
                        <td><?php echo $value->id?></td>
                        <td><?php echo $value->created_date ?></td>
                        <td><?php echo $value->sub_total ?></td>
                        <td class="font-bold"><?php if($value->status == 0){echo 'Đang chờ ...';};
                        if($value->status == 1){echo 'Đã mua!';};
                        if($value->status == 2) {echo 'Đã huỷ'; };
                        ?></td>
                        <td class="pr-0"><a class="btn btn-warning " href="order_detail.php?id=<?php echo $value->id; ?>">Chi Tiết</a>
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

</html>oc-dao-nguoc/