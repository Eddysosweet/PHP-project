<?php
session_start();
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if (is_numeric($id) && $_GET['action'] == 'delete') {
        unset($_SESSION['cart'][$id]);
        header("location:cart.php");
    }
}

?>
<?php include_once '../commons/head.php'; ?>
<body>
<?php include_once '../commons/body-menu.php'; ?>

<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-4 text-center">Giỏ hàng của tôi</h3>
        <div class="mx-5 my-3">
            <?php
            if(isset($_SESSION['cart'])){
            ?>
            <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                <thead class="bg-sky-500 text-white">
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Desciption</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                $total =0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $value['name']?></td>
                        <td><img class="m-auto" style="width: 50px;" src="<?php echo '../' . $value['image'] ?>"
                                 alt="#"/></td>
                        <td><?php echo $value['price'].'$'?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><?php echo $value['time'].' hours' ?></td>
                        <td class="pl-0"><a onclick="return confirm('Are you sure you want to delete ?')"
                                            class="btn btn-danger"
                                            href="?action=delete&id=<?php echo $key; ?>">Delete</a></td>
                    </tr>
                    <?php
                    $i++;
                    $total += $value['price'];
                }
                ?>
                    <tr>
                        <td rowspan="2"></td>
                        <td rowspan="2" colspan="4">Tổng cộng</td>
                        <td rowspan="2" colspan="2"><?php echo $total.' $' ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
            }
            ?>
            <div class="container my-4 text-center">
                <a type="submit" href="courses.php"
                   class="btn text-white text-xl bg-green-600 hover:bg-green-600 py-2 border-none my-3">
                    Thêm khoá học khác</a>
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