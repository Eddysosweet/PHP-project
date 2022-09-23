<?php
include_once './../../DAL/CourseDAL.php';
include_once './../../DAL/LecturerDAL.php';
$dal = new CourseDAL();
$teacher = new TeacherDAL();
if (isset($_FILES['image']) && $_FILES['image']['name'] !== null) {
    $dir = 'img/uploads/course/' . time() . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], './../../' . $dir);
    if (isset($_POST['name']) && $_POST['name']) {
        $_POST['image'] = $dir;
        $dal->addOne($_POST);
        header("location:list.php");
    }
}
?>
<?php
include_once './../../admin/home/adHeader.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-2  p-0 border-end h-screen position-relative">
            <div id="slidebars">
                <ul class="mt-1">
                    <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;" class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-2xl hover:text-white font-bold" href="./../admin.php">
                            <i class="me-2 text-red-600 fa-solid fa-house"></i>Home
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-2xl hover:text-white font-bold" href="./../lecturer/list.php">
                            <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Teachers
                        </a>
                    </li>

                    <li class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-2xl hover:text-white font-bold" href="">
                            <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Courses
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-2xl hover:text-white font-bold" href="./../user/list.php">
                            <i class="text-yellow-500 me-2 fa-solid fa-user-gear"></i>Users
                        </a>
                    </li>

                    <li class="p-3 border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-2xl hover:text-white font-bold" href="">
                            <i class="me-2 text-green-700 fa-regular fa-images"></i>Slider
                        </a>
                    </li>

                </ul>
            </div>

        </div>
        <div class="col-12 col-md-10 p-0">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-5">
                    <h5 class="modal-title text-2xl text-center" id="exampleModalLabel">Add Course</h5>
                    <div class="modal-body mt-5">
                        <form method="post" class="row g-3" enctype="multipart/form-data">
                            <div class="my-3">
                                <h4>Name </h4>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="my-3">
                                <h4>Image</h4>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="my-3">
                                <h4>Lecturer</h4>
                                <select class="form-control" name="teacher_id">
                                    <?php
                                    $rs = $teacher->getList();
                                    foreach ($rs as $row) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="my-3">
                                <h4>Price</h4>
                                <input type="text" name="price" class="form-control" placeholder="price">
                            </div>
                            <div class="my-3">
                                <h4>Desciption</h4>
                                <textarea name="description" class="form-control"
                                          placeholder="description..."></textarea>
                            </div>
                            <div class="my-3">
                                <h4>Time</h4>
                                <input type="text" name="time" class="form-control" placeholder="time">
                            </div>
                            <div class="my-3">
                                <input type="submit" value="add" class="btn px-5 text-white bg-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include "./../../admin/home/adFooter.php";
?>


