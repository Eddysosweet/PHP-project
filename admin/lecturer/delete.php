<?php
session_start();
include_once './../../DAL/CourseDAL.php';
include_once './../../DAL/LecturerDAL.php';
$dal = new TeacherDAL();

$course = new CourseDAL();

if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if (is_numeric($id) && $_GET['action'] == 'delete') {
    $check = $course->getListByTeacherId($id);
    if ($check >= 1) {
        $_SESSION['fail'] = "Không xoá được vì giáo viên này có lớp học";
        header("location:list.php");
    } else {
            $teacher = $dal->getOne($id);
            $dal->deleteOne($id);
            unlink('./../../' . $teacher->avatar);
            header("location:list.php");
        }
    }
}
?>
