<?php
$conn = mysqli_connect("localhost", "root", "", "quanao");
if (mysqli_connect_errno()) {
    echo 'loi : ' . mysqli_connect_error();
}

echo mysqli_error($conn);
?>
<?php 
$sql="select *,quan_ao.id as quan_ao_id, category.name as category_name, quan_ao.name as quan_ao_name from quan_ao inner join category on quan_ao.category_id = category.id ";
    if(isset($_GET['min'])){
        if($_GET['min'] == null){
            header("location:list.php");
        }else{
        $min = $_GET['min'];
        $max = $_GET['max'];
        
        $sql = "select *,quan_ao.id as quan_ao_id, category.name as category_name, quan_ao.name as quan_ao_name from quan_ao inner join category on quan_ao.category_id = category.id where price between $min and $max";
        }
    }
    $query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List-Product</title>
</head>

<body>
    <form action="" method="get">
        <h2>Tim kiếm theo khoảng giá</h2>
        <input type="text" placeholder="min" name="min">
        <input type="text" placeholder="max" name="max">
        <input type="submit" value="Tìm">
    </form>
    
    <table border="1" cellpadding="20" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>price</th>
                <th>description</th>
                <th>category</th>
                <th>image</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            while($row = mysqli_fetch_assoc($query)){
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['quan_ao_name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><img src="<?php echo $row['image'] ?>" alt="#" width="50"></td>
                <td><a onclick="return confirm('bạn có chắc chắn muốn xoá sản phẩm này không?')" href="delete.php?id=<?php echo $row['quan_ao_id'] ?>">Xoá</a></td>
                <td><a  href="edit.php?id=<?php echo $row['quan_ao_id'] ?>">Edit</a></td>
            </tr>
           
            <?php
             } 
            ?>
        </tbody>
    </table>
    <a href="add.php"> Add</a>
</body>


</html>