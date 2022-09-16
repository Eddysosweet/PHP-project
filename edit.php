<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "quanao");
if (mysqli_connect_errno()) {
    echo 'loi : ' . mysqli_connect_error();
}
$list = mysqli_query($conn,"SELECT * FROM category");
$query= mysqli_query($conn,"select *,quan_ao.id as quan_ao_id, category.name as category_name, quan_ao.name as quan_ao_name from quan_ao inner join category on quan_ao.category_id = category.id where quan_ao.id = $id ") ;
mysqli_error($conn);
$sv = mysqli_fetch_assoc($query);
}
?>
<?php
$url = "";
if (isset($_FILES['image']) && $_FILES['image']['name']!== null){
    unlink($sv['image']);
    $url = 'upload/'.time().$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$url);
}
    if(isset($_POST['name']) && $_POST['name']){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $query = mysqli_query($conn,"update quan_ao set name='$name',price= $price,image = '$url',description = '$description',category_id = $category_id where id = $id");
        if($query){
            header("location:list.php");
        }else {
            echo 'loi'.mysqli_connect_error($query);
        }
        

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <div>
            <h2>Tên</h2>
            <input type="text" name="name" value="<?php echo $sv['quan_ao_name'] ?>">
        </div>
        <div>
            <h2>category</h2>
            <select name="category_id">
                <?php
                while($row = mysqli_fetch_assoc($list)) {
                ?>
                <option <?php echo ($row['id'] == $sv['category_id']) ? "selected": "" ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>

            <h2>Image</h2>
            <img width="50" src="<?php echo $sv['image'] ?>">
            <input id="image" name="image" type="file" hidden>
            <label for="image" style="border: 1px solid ;">Thay đổi</label>
        </div>
        <div>
            <h2>price</h2>
            <input name="birthday" type="text" value="<?php echo $sv['price'] ?>">
        </div>

        
        <div>
            <h2>Description</h2>
            <textarea name="about" cols="50" rows="4" ><?php echo $sv['description'] ?></textarea>
        </div>
        <input type="submit" value="Cập nhật">
    </form>
</body>

</html>