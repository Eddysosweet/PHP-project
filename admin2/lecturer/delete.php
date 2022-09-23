<?php
session_start();
include_once './../../DAL/CourseDAL.php';
$course = new CourseDAL();

if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $check = $course->getListByTeacherId($id);
    if ($check) {
        $_SESSION['fail'] = "Không xoá được vì giáo viên này có lớp học";
        header("location:list.php");
    } else {
        $teacher = $dal->getOne($id);
        if (is_numeric($id) && $_GET['action'] == 'delete') {
            $dal->deleteOne($id);
            unlink('./../../' . $teacher->avatar);
            header("location:list.php");
        }
    }
}
?>
