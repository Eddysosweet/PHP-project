<?php 
if(isset($_GET['id']) && $_GET['id']){
    $id= $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "quanao");
if (mysqli_connect_errno()) {
    echo 'loi : ' . mysqli_connect_error();
}
$sql = "delete from quan_ao where id= '$id'";
$remove = mysqli_query($conn,"select image from quan_ao where id = $id");
$src = mysqli_fetch_assoc($remove);
if(file_exists($src['image'])){
    $status = unlink($src['image']);
    $query= mysqli_query($conn,$sql);
    if($query && $status){
        header("location:list.php");
        
    }else{
        echo 'loi';
    }
}
}
