<?php
include_once '../DAL/CourseDAL.php';
session_start();
$id = $_GET['id'];
$dal = new CourseDAL();
$course = $dal->getOne($id);
$_SESSION['cart'][]= array(
    'id' => $course->id,
    'name'=> $course->name,
    'image'=> $course->image,
    'price'=> $course->price,
    'description'=> $course->description,
    'time'=> $course->time
);
header("location:cart.php");
?>