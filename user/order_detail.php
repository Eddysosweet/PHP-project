<?php include_once '../commons/head.php'; ?>
<?php

?>
<body>
<?php
include_once '../commons/body-menu.php';
include_once '../DAL/OrderDetailDAL.php';
include_once '../DAL/OrderDAL.php';
$order = new OrderDAL();
$id = $_GET['id'];
$dal = new OrderDetailDAL();
$list = $dal->getListByOrderId($id);
$item = $order->getOne($id);

?>


<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-4 text-center">Chi tiết đơn hàng</h3>
        <div class="mx-5 my-3">
            <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                <thead class="bg-sky-500 text-white">
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Thời lượng</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                $total =0;
                foreach ($list as $value) {

                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><img class="m-auto" style="width: 50px;" src="<?php echo '../' . $value->image ?>"
                                 alt="#"/></td>
                        <td><?php echo $value->name?></td>
                        <td><?php echo $value->time?></td>
                        <td><?php echo number_format($value->price).' VND'?></td>
                        <td><?php echo $value->description?></td>
                    </tr>
                    <?php
                    $i++;
                    $total +=$value->price;
                }
                ?>
                <tr>
                    <td  class="font-bold" colspan="6">Tổng cộng: <?php echo number_format($total).' VND' ?></td>

                </tr>
                </tbody>
            </table> <?php
            if($item->status == 0){
            ?>
            <div class="container my-4 text-center">
                <a type="submit" href="handle_order.php?user_id=<?php echo $user_id ?>&total=<?php echo $total ?>"
                   class="btn text-white text-xl bg-red-500 hover:bg-red-400 py-2 px-5 border-none my-3 mx-2 ">
                    Huỷ đơn</a>
            </div>
            <?php
            }else{
                ?>

                <div class="container my-4 text-center">
                    <a type="submit" href="order.php"
                       class="btn text-white text-xl bg-green-500 hover:bg-green-400 py-2 px-5 border-none my-3 mx-2 ">
                        Ok</a>
                </div>
            <?php
            }
            ?>
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