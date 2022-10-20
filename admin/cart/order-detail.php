<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/OrderDetailDAL.php';
include_once './../../DAL/CourseDAL.php';
$dal = new OrderDetailDAL();
$course = new CourseDAL();
$id = $_GET['id'];
$list = $dal->getListByOrderId($id);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3 col-md-2  p-0 border-end h-screen position-relative">
            <div id="slidebars">
                <ul class="mt-1">
                    <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;" class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../admin.php">
                            <i class="me-2 text-red-600 fa-solid fa-house"></i>Home
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../lecturer/list.php">
                            <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Teachers
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../courses/list.php">
                            <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Courses
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./../user/list.php">
                            <i class="text-yellow-500 me-2 fa-solid fa-user-gear"></i>Users
                        </a>
                    </li>

                    <li class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-sm hover:text-white font-bold" href="">
                            <i class="me-2 text-green-700 fa-regular fa-images"></i>Order Cart
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-9 col-md-10 p-2">
            <h2 class="uppercase font-bold text-center mt-5">Danh sách giỏ hàng</h2>
            <div class="mx-5 my-3">
                <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                    <thead class="bg-sky-500 text-white">
                    <tr>

                        <th>STT</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Desciption</th>
                        <th>Time</th>

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
                            <td><img class="m-auto" style="width: 50px;" src="<?php echo '../../' . $item->image ?>"
                                     alt="#"/></td>
                            <td><?php echo  $item->price.'$'?></td>
                            <td><?php echo $item->description ?></td>
                            <td><?php echo $item->time.' hours' ?></td>
                        </tr>
                        <?php
                        $i++;
                        $total +=$item->price;
                    }
                    ?>
                    <tr>
                        <td rowspan="2"></td>
                        <td rowspan="2" colspan="4">Tổng cộng : <?php echo $total.' $' ?></td>
                        <td rowspan="2"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <a class="btn btn-success mx-5" href="list.php">Quay lại</a>
        </div>
    </div>
</div>
<?php
include "../commons/admin-footer.php";
?>


