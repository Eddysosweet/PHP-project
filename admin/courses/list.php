<?php
include_once '../commons/admin-header.php';
include_once './../../DAL/CourseDAL.php';
$dal = new CourseDAL();
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $course = $dal->getOne($id);
    if (is_numeric($id) && $_GET['action'] == 'delete') {
        $dal->deleteOne($id);
        unlink('./../../'.$course->image);
        header("location:list.php");
    }
}
$list = $dal->getList();
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
            <div class="col-12 col-md-10 p-2">
                <h2 class="uppercase font-bold text-center mt-5">Danh sách khoá học</h2>
                <div class="mx-5 my-3">
                    <table class="table table-bordered container m-auto text-center" cellpadding="20" cellspacing="0">
                        <thead class="bg-sky-500 text-white">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Teacher</th>
                            <th>Price</th>
                            <th>Desciption</th>
                            <th>Time</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $i = 1;
                        foreach ($list as $value) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><img class="m-auto" style="width: 50px;" src="<?php echo './../../' . $value->image ?>"
                                         alt="#"/></td>
                                <td><?php echo $value->teacher_name ?></td>
                                <td><?php echo $value->price.'$'?></td>
                                <td><?php echo $value->description ?></td>
                                <td><?php echo $value->time.' hours' ?></td>
                                <td class="pr-0"><a class="btn btn-warning " href="edit.php?id=<?php echo $value->course_id; ?>">Edit</a>
                                </td>
                                <td class="pl-0"><a onclick="return confirm('Are you sure you want to delete ?')"
                                                    class="btn btn-danger"
                                                    href="?action=delete&id=<?php echo $value->course_id; ?>">Delete</a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <a href="add.php" class="btn btn-primary mx-5 my-3">Add Course</a>

                <div class="col-4 center">
                    <form class="mx-5 my-3">
                        <div class="flex justify-center">
                            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success " type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include "../commons/admin-footer.php";
?>