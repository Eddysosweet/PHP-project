<?php
include_once '../DAL/LecturerDAL.php';
include_once '../DAL/CourseDAL.php';
$teacher = new TeacherDAL();
$course = new CourseDAL();
if(isset($_GET['search']) && $_GET['search']){
    $str = $_GET['search'];
    $rs  = $course->search($str);
}else {
    $so = $course->countCourse();
    $sotrang = ceil($so / 12);
    $vitri = 0;
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $vitri = ($id - 1) * 12;
    }
    $rs = $course->getListByPage($vitri, 12);
}
?>

<?php include_once '../commons/head.php'; ?>
<body>
<?php include_once '../commons/body-menu.php'; ?>
<?php
$arr = array();
if(isset($_SESSION['user'])){
include_once '../DAL/UserDAL.php';
include_once '../DAL/OrderDetailDAL.php';
$email = $_SESSION['user']['email'];
$user = new  UserDAL();
$user_id = $user->getOneByEmail($email)->id;
$order_detail = new OrderDetailDAL();
$mc= $order_detail->getListByUserId($user_id);
foreach ($mc as $item){
    $arr[] = $item->course_id;
}}
?>

<div class="content border-bottom py-3">
    <div class="container py-2 ">
        <h3 class="font-bold text-sm md:text-2xl mb-2">Danh sách khoá học</h3>
        <div class="row my-3">
            <?php foreach ($rs as $list) {
                if(!in_array($list->id,$arr)){
                ?>
                <div class="col-12 col-md-3 cursor-pointer my-1 my-md-3">
                    <div class="border hover:shadow-xl rounded-md">
                        <img class="w-100" style="height: 200px;" src="<?php echo '../' . $list->image ?>" alt="">
                        <div class="w-100 px-4 py-3 text-sm lg:text-xl truncate" >
                            <div class="py-3">
                                <a class="text-orange-500 font-bold " href="#"><?php echo $list->name ?></a>
                                <p><?php echo $list->description ?></p>
                            </div>
                            <div class="pb-2">
                                <span class="font-bold"><?php echo number_format($list->price) . ' VND' ?></span>
                                <p class="mb-0"><?php echo $list->time . ' giờ' ?></p>
                            </div>
                            <button class="bg-orange-500
                      text-white font-bold py-2 px-4 border
                      rounded">
                                <a class="hover:text-white" href="detail-course.php?id=<?php echo $list->id ?>">Chi tiết</a>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <?php if(isset($_GET['search']) && $_GET['search']){


    }else{?>
    <nav class="container" aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <?php
            $i = 1;
            while ($i <= $sotrang) { ?>
                <li class="page-item <?php if (!$id) {
                    $id = 1;
                }
                echo ($id == $i) ? 'active' : '';
                ?>"><a class="page-link" href="?id=<?php echo $i ?>"><?php echo $i ?></a></li>

                <?php
                $i++;
            }
            ?>

        </ul>
    </nav>
    <?php
    }
    ?>
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