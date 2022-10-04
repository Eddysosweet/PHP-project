
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-blue-400">
    <li class="container-fluid mx-5">
        <a class="navbar-brand" href=""><img width="120px" src="https://unica.vn/media/img/logo-unica.svg"
                                             alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
        ">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown ">
                <?php
                if (isset($_SESSION['admin'])){ ?>
            <li class="list-group-item list-group-item-action">
                <a class="nav-link text-lg dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false"><i class="fa-solid fa-user mx-1"></i>
                    <?php echo $_SESSION['admin']['username'] ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="handle-logout.php"><i
                                    class=" me-2 text-fuchsia-900 fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
                    </a></li>
                </ul>
            </li>
            <?php } else { ?>
                <li class="text-white text-lg font-bold " id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Đăng nhập
                </li>
                <?php
            }
            ?>

            </li>
        </ul>
        </div>
        </div>
    </li>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-3 col-md-2 p-0 border-end h-screen position-relative">
            <?php
            if (isset($_SESSION['admin'])){ ?>
            <div id="slidebars">
                <ul class="mt-1">
                    <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;  " class="p-3 border-bottom bg-blue-400 text-white">
                        <a class="text-sm hover:text-white font-bold" href="">
                            <i class="me-2 text-red-600 fa-solid fa-house"></i>Trang chủ
                        </a>
                    </li>

                    <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="lecturer/list.php">
                            <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Danh sách giảng viên
                        </a>
                    </li>

                    <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="courses/list.php">
                            <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Danh sách lớp học
                        </a>
                    </li>

                    <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="user/list.php">
                            <i class="text-yellow-500 me-2 fa-solid fa-user-gear"></i>Danh sách người dùng
                        </a>
                    </li>

                    <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                        <a class="text-sm hover:text-white font-bold" href="./cart/list.php">
                            <i class="me-2 text-green-700 fa-regular fa-images"></i>Đơn đặt hàng
                        </a>
                    </li>

                </ul>
            </div>
            <?php
            }else{?>
                <div id="slidebars">
                    <ul class="mt-1">
                        <li style="border-top-left-radius:10px;
        border-top-right-radius:10px ;  " class="p-3 border-bottom bg-blue-400 text-white">
                            <a class="text-sm hover:text-white font-bold" href="">
                                <i class="me-2 text-red-600 fa-solid fa-house"></i>Trang chủ
                            </a>
                        </li>

                        <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                            <a class="text-sm hover:text-white font-bold" href="login-admin.php">
                                <i class="text-indigo-800 me-2 fa-solid fa-chalkboard-user"></i>Danh sách giảng viên
                            </a>
                        </li>

                        <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                            <a class="text-sm hover:text-white font-bold" href="login-admin.php">
                                <i class="text-yellow-600 me-2 fa-solid fa-calendar"></i>Danh sách khoá học
                            </a>
                        </li>

                        <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                            <a class="text-sm hover:text-white font-bold" href="login-admin.php">
                                <i class="text-yellow-500 me-2 fa-solid fa-user-gear"></i>Danh sách người dùng
                            </a>
                        </li>

                        <li class="p-3   border-bottom hover:bg-blue-400 hover:text-white">
                            <a class="text-sm hover:text-white font-bold" href="login-admin.php">
                                <i class="me-2 text-green-700 fa-regular fa-images"></i>Đơn đặt hàng
                            </a>
                        </li>

                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="text-center md:text-xl col-9  col-md-10 p-0 h-80  m-auto" >
            Chào mừng bạn đến với trang quản trị !
        </div>
    </div>
</div>
<?php include "commons/admin-footer.php" ?>
