<?php 
    include "../database/db.php";
    $db = new Database();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $db->edit($id);
    $list = $db->EditIDCourses($id);
    $db->editcourses($id);
    include "../home/adHeader.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2 p-0 border-end h-screen position-relative">
            <?php include "../home/adSlidebars.php" ?>
        </div>
        <div class="col-12 col-md-9 col-lg-10 p-0">
                <div class="m-4">
                    <p class="mb-0 py-4 text-center text-2xl"><?=$list['name']?></p>
                    <form method="post" class="row g-3" enctype="multipart/form-data">
                        <div class="col-6">
                            <input type="text" name="name" value="<?=$list['name']?>" class="form-control" placeholder="Name" aria-label="First name">
                        </div>
                        <div class="col-6">
                            <input type="file" name="avatar"  class="form-control" placeholder="Last name" aria-label="Last name">
                            <img  class="w-1/5" src=".././../img/<?=$list['image']?>" alt="">
                        </div>
                        <div class="col-6">
                            <input type="text" name="price" value="<?=$list['price']?>" class="form-control" placeholder="Price" aria-label="First name">
                        </div>
                        <div class="col-6">
                            <input type="date" name="time" value="<?=$list['time']?>" class="form-control"  aria-label="First name">
                        </div>
                        <div class="col-6">
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?=$list['description']?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="edit" class="btn text-white bg-success">Sign in</button>
                        </div>
                    </form>
                </div>
            <?php include "../home/adFooter.php" ?>
        </div>
    </div>
</div>