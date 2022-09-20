<?php
    include "../database/db.php";
    $db = new Database();
    $db->Add();
    $list = $db->getListTeachers();
    include "../home/adHeader.php";
    include "../server/addTeachers.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2 p-0 border-end h-screen position-relative">
            <?php include "../home/adSlidebars.php" ?>
        </div>
        <div class="col-12 col-md-9 col-lg-10 p-0"> 
            <div class=" d-flex justify-content-between mx-5 my-3">
                <div>
                    <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="w-1/4">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
           <div class="mx-5">
                <table class="table table-bordered border-primary">
                    <tr class="text-center">
                        <th>id</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th class="w-1/5">Delete</th>
                        <th class="w-1/5">Edit</th>
                    </tr>
                    <?php foreach($list as $row): ?>
                    <tr class="text-center">
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><img class="m-auto" width="120px"  src=".././../img/<?=$row['avatar']?>" alt=""></td>
                        <td class="w-1/5"><a class="btn btn-danger" href="../server/deleteTeachers.php?id=<?=$row['id']?>">Delete</a></td>
                        <td class="w-1/5"><a class="btn btn-warning" href="../server/editTeachers.php?id=<?=$row['id']?>">Edit</a></td>
                    </tr>
                    <?php endforeach ?>
                </table>        
            </div>
            <?php include "../home/adFooter.php" ?>
        </div>
    </div>
</div>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })
</script>
