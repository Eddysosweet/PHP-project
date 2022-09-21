<?php
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\product","",__DIR__);//C:\xampp\htdocs\shops\
require_once $dir.'dals/ProductDAL.php';//relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
require_once $dir .'config.php';
$dal = new ProductDAL();
if(isset($_GET['action'])){
    $id = $_GET['id'];

    if(is_numeric($id) && $_GET['action']=='delete'){
        $dal->deleteOne($id);
    }
}
$list = $dal->getList();
?>