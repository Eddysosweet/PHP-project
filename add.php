<?php
$conn = mysqli_connect("localhost", "root", "", "quanao");
if (mysqli_connect_errno()) {
    echo 'loi : ' . mysqli_connect_error();
}
$select = mysqli_query($conn, "SELECT * FROM category");
?>
<?php
if (isset($_FILES['image']) && $_FILES['image']['name'] !== null) {
    $url = 'upload/' . time() . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $url);
    if (isset($_POST['name']) && $_POST['name']) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $query = mysqli_query($conn, "INSERT INTO quan_ao(name, price,description,category_id,image) VALUES('$name','$price','$description',$category_id,'$url') ");
        if ($query) {
            header("location:list.php");
        } else {
            echo 'loi' . mysqli_connect_error($query);
        }
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
            <h2>Name</h2>
            <input type="text" name="name">
        </div>
        <div>
            <h2>Price</h2>
            <input type="text" name="price">
        </div>
        <div>
            <h2>description</h2>
            <textarea name="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <h2>Category</h2>
            <select name="category_id">
                <?php while ($row = mysqli_fetch_assoc($select)) : ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div>
            <h2>image</h2>
            <input type="file" name="image">
        </div>
        <input type="submit" value="Add">
    </form>
</body>

</html>