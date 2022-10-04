<?php include_once '../commons/head.php'; ?>

<body>
<?php include_once '../commons/body-menu.php'; ?>
<?php
include_once '../DAL/CourseDAL.php';
include_once '../DAL/UserDAL.php';
include_once '../DAL/OrderDetailDAL.php';
$email = $_SESSION['user']['email'];
$user = new  UserDAL();
$user_id = $user->getOneByEmail($email)->id;
$order_detail = new OrderDetailDAL();
$list= $order_detail->getListByUserId($user_id);
$course = new CourseDAL();
?>

<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-2">Khoá học của tôi</h3>
        <div class="row my-3">
            <?php foreach ($list as $item) {
                $rs = $course->getOne($item->course_id);
                ?>
                <div class="col-12 col-md-3 cursor-pointer my-1 my-md-3">
                    <div class="border hover:shadow-xl rounded-md">
                        <img class="w-100" style="height: 200px;" src="<?php echo '../' . $rs->image ?>" alt="">
                        <div class="w-100 px-4 py-3 text-sm lg:text-xl truncate" >
                            <div class="py-3">
                                <a class="text-orange-500 font-bold " href="#"><?php echo $rs->name ?></a>
                                <p><?php echo $rs->description ?></p>
                            </div>
                            <button class="bg-orange-500
                      text-white font-bold py-2 px-4 border
                      rounded">
                                <a class="hover:text-white" href="detail-course.php?id=<?php echo $rs->id ?>&status=success">Chi tiết</a>
                            </button>
                        </div>
                    </div>
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

</html>