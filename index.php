<?php
include_once './DAL/LecturerDAL.php';
include_once './DAL/CourseDAL.php';
$teacher = new TeacherDAL();
$course = new CourseDAL();
$list = $teacher->getList();

$new = $course->getListByPage(0,8);
$popular= $course->getListByPage(0,8);
?>
<?php include_once './commons/head.php';?>
<body>
<?php
session_start();
?>
<menu class="bg m-0 py-3 fixed-top px-3">
    <div class="">
        <div class="row">
            <div class="col-2">
                <img src="https://unica.vn/media/img/logo-unica.svg" alt="logo-image"
                     class=" w-24 logo-image d-flex m-auto pt-2">
            </div>
            <div class="col-10 list-menu">
                <ul class="d-none d-lg-block list-inline m-0 float-end">
                        <li class="list-inline-item me-4">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm"
                                       aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fa-solid
                                            fa-magnifying-glass"></i></button>
                            </form>
                        </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-0" href="index.php">Trang
                            chủ</a>
                    </li>

                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown list-inline-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Khoá học
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user/courses.php">Danh
                                        sách tất cả khoá học</a></li>
                                <li><a class="dropdown-item" href="user/mycourses.php">Khoá
                                        học của tôi</a></li>
                            </ul>
                        </li>

                        <li class="list-inline-item me-4">
                            <a class="nav-link px-2" href="user/contact.php">Liên
                                hệ</a>
                        </li>
                        <li class="nav-item dropdown list-inline-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-person-circle"></i><?php echo $_SESSION['user']['email'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user/handleLogout.php">Đăng xuất</a></li>
                                <li><a class="dropdown-item" href="user/order.php">Quản lí đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Quản lí tài khoản</a></li>
                            </ul>
                        </li>
                        <li class="list-inline-item me-2">
                            <a href="user/cart.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item dropdown list-inline-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Khoá học
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user/courses.php">Danh
                                        sách tất cả khoá học</a></li>
                                <li><a class="dropdown-item" href="#">Khoá
                                        học của tôi</a></li>
                            </ul>
                        </li>

                        <li class="list-inline-item me-4">
                            <a class="nav-link px-2" href="user/contact.php">Liên
                                hệ</a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a class="nav-link px-1" href="user/login.php">Đăng
                                nhập</a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a class="nav-link px-1" href="user/register.php">Đăng
                                ký</a>
                        </li>
                        <li class="list-inline-item me-4">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm"
                                       aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fa-solid
                                            fa-magnifying-glass"></i></button>
                            </form>
                        </li>
                        <li class="list-inline-item me-2">
                            <a href="user/login.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <div class="d-block d-lg-none float-end">
                    <button class="btn btn-outline-none p-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class='bx bx-menu bx-md bx-flip-vertical'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header ">
            <img class="logo-image w-25" src="https://unica.vn/media/img/logo-unica.svg" alt="">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="text-xl text-danger fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="p-0">
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="bi bi-person-circle"></i><?php echo $_SESSION['user']['email'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user/handleLogout.php">Đăng xuất</a></li>
                            <li><a class="dropdown-item" href="user/order.php">Quản lí đơn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Quản lí tài khoản</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link text-dark" href="user/login.php">Đăng nhập</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link text-dark" href="user/register.php">Đăng ký</a>
                    </li>
                    <?php
                }
                ?>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="index.php">Trang chủ</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="#">Liên hệ</a>
                </li>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Khoá học
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user/courses.php">Danh sách tất cả khoá học</a></li>
                            <li><a class="dropdown-item" href="user/mycourses.php">Khoá học của tôi</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="list-group-item list-group-item-action">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Khoá học
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user/courses.php">Danh sách tất cả khoá học</a></li>
                            <li><a class="dropdown-item" href="#">Khoá học của tôi</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>




                <li class="list-group-item list-group-item-action">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="cart.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="login.php"><i class="text-xl fa-solid fa-cart-shopping hover:text-red-600"></i></a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</menu>
    <!-- banner -->
    <div>
        <div id="banner" class="bg-[url('./img/banner.jpg')] mt-16 w-100
        justify-content-center d-flex align-items-center" style="height: 550px;">
            <div class="w-10/12 md:w-6/12 text-white ">
                <p class="mb-0 text-3xl  md:text-5xl md:text-center font-bold">CHƯƠNG TRÌNH ĐÀO TẠO IT TRỰC TUYẾN</p>
                <p class="mb-0 pt-3  md:text-lg">Với sứ mệnh cung cấp và đào tạo nguồn nhân lực IT chất lượng cao cho
                    các dự án lớn trên toàn cầu, UNICA mang đến cơ hội nghề nghiệp không giới hạn và môi trường đào tạo
                    chuyên nghiệp theo chuẩn quốc tế. UNICA chính là nơi khởi đầu cho
                    những thành công của các kỹ sư CNTT trong tương lai.</p>
            </div>
        </div>

        <div id="main" class="container mx-auto my-2 border-bottom border-top">
            <h2 style="font-weight:bold ;" class=" md:text-3xl my-4">MÔ HÌNH ĐÀO TẠO CỦA UNICA</h2>
            <div class="row  my-3">
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/doituong-1.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Dành cho mọi đối tượng</h2>
                        <p class="my-2">Các khóa đào tạo được thiết kế cho mọi đối tượng, kể cả những người không biết
                            gì về CNTT. Thời gian đào tạo linh hoạt (Fulltime/Parttime) phù hợp cho những người đang đi
                            làm.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/thucchien.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Thực chiến cùng chuyên gia</h2>
                        <p class="my-2">Học viên được tham gia thực hành trong hơn 60% thời lượng khóa học tại Labs. Đội
                            ngũ giảng viên là chuyên gia Công nghệ với nhiều năm kinh nghiệm chinh chiến các dự án quy
                            mô lớn tại UNICA.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/phuongphap.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Phương pháp đào tạo</h2>
                        <p class="my-2">Lấy học viên làm trung tâm, sử dụng hệ thống học liệu đạt chuẩn quốc tế và kỹ
                            thuật đào tạo hiện đại, xây dựng kiến thức từ cơ bản đến nâng cao, giúp học viên trang bị
                            đầy đủ hành trang trong ngành Công nghệ.</p>
                    </div>
                </div>


            </div>
            <div class="row my-3">
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/coso.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Cơ sở vật chất</h2>
                        <p class="my-2">Học viên tại UNICA sẽ được trải nghiệm và sử dụng hệ thống giảng đường, văn
                            phòng làm việc chuẩn quốc tế tại những Campus đẹp và hiện đại nhất Việt Nam.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/camket.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Chứng chỉ và cam kết việc làm</h2>
                        <p class="my-2">Chứng chỉ được cấp bởi UNICA sau khi hoàn thành khóa học. Đối với 1 số khóa học
                            dài hạn, chúng tôi cam kết sắp xếp vị trí chính thức cho học viên có kết quả học tập đạt
                            loại B trở lên (7/10).</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-inner mb-2">
                        <img src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/moitruong.png"
                            class="attachment-medium size-medium" alt="" loading="lazy">
                    </div>
                    <div class="icon-box-text last-reset">
                        <h2 style="font-weight: bold;">Môi trường chuyên nghiệp</h2>
                        <p class="my-2">Môi trường làm việc đạt chuẩn quốc tế, văn phòng hiện diện trên toàn cầu (Việt
                            Nam, Mỹ, Úc, Nhật Bản, Singapore, Đức, Pháp…)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-2 border-bottom">
            <h3 class="font-bold text-sm md:text-2xl mb-2">Khoá học mới ! <span style="font-weight: 200  ;"
                    class="float-end text-sm md:text-xl"><a href="user/courses.php">xem thêm -></a></span></h3>
            <div class="row">
                <?php foreach ($new as $nw) { ?>
                    <div class="col-12 col-md-3 cursor-pointer my-1 my-md-3">
                        <div class="border hover:shadow-xl rounded-md">
                            <img class="w-100" style="height: 200px;" src="<?php echo './' . $nw->image ?>" alt="">
                            <div class="w-100 px-4 py-3 text-sm lg:text-xl truncate" >
                                <div class="py-3">
                                    <a class="text-orange-500 font-bold " href="#"><?php echo $nw->name ?></a>
                                    <p><?php echo $nw->description ?></p>
                                </div>
                                <div class="pb-2">
                                    <span class="font-bold"><?php echo number_format($nw->price) . ' VND' ?></span>
                                    <p class="mb-0"><?php echo $nw->time . ' giờ' ?></p>
                                </div>
                                <button class="bg-orange-500
                      text-white font-bold py-2 px-4 border
                      rounded">
                                    <a class="hover:text-white" href="">Chi tiết</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container py-2  border-bottom">
        <h3 class="font-bold text-sm md:text-2xl mb-2">Khoá học phổ biến nhất ! <span style="font-weight: 200  ;"
                class="float-end text-sm md:text-xl"><a href="user/courses.phpgit">xem thêm -></a></span></h3>
        <div class="row">
            <?php foreach ($popular as $po) { ?>
                <div class="col-12 col-md-3 cursor-pointer my-1 my-md-3">
                    <div class="border hover:shadow-xl rounded-md">
                        <img class="w-100" style="height: 200px;" src="<?php echo './' . $po->image ?>" alt="">
                        <div class="w-100 px-4 py-3 text-sm lg:text-xl truncate" >
                            <div class="py-3">
                                <a class="text-orange-500 font-bold " href="#"><?php echo $po->name ?></a>
                                <p><?php echo $po->description ?></p>
                            </div>
                            <div class="pb-2">
                                <span class="font-bold"><?php echo number_format($po->price) . ' VND' ?></span>
                                <p class="mb-0"><?php echo $po->time . ' giờ' ?></p>
                            </div>
                            <button class="bg-orange-500
                      text-white font-bold py-2 px-4 border
                      rounded">
                                <a class="hover:text-white" href="">Chi tiết</a>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    </div>
    <div style=" background-color:#a1bcc9;
    border-top-left-radius:100px ;
   border-top-right-radius:100px ;
   " class=" py-24 t mt-2">
        <div class="text-center py-3">
            <h1 class="text-3xl fw-bold py-2">NÓI VỀ FPT SOFTWARE ACADEMY</h1>
            <p class="w-2/4 m-auto text-lg">FPT Software Academy chính là nơi khởi đầu cho những thành công của các kỹ
                sư CNTT trong
                tương lai, cung cấp và đào tạo nguồn nhân lực IT chất lượng cao cho các dự án lớn trên toàn cầu.</p>
        </div>

        <div class="container ">
                   <div class="row">
                    <div class="slide inline-block text-xs md:text-base col-12 col-md-6 col-lg-3 my-3 cursor-pointer">
                        <div class="rounded-lg bg-white">
                            <div class="p-1">
                                <p class="mb-0 p-2">
                                    FPT Software xứng đáng là một công ty phần mềm lớn nhất Việt Nam,
                                    có định hướng phát triển một cách bền vững và có trách nhiệm với cộng đồng.
                                </p>
                                <div class="d-flex align-items-center  p-2 bg-slate-400 rounded-lg text-white">
                                    <img width="60px" height="60px" class="rounded-full mr-4"
                                        src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/05/HongNTA-150x150.jpg"
                                        alt="">
                                    <div>
                                        <p class="mb-0 fw-bold">Trần Ngọc Quang</p>
                                        <p class="mb-0">Phó khoa CNTT - ĐH Công Nghệ TP HCM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide inline-block text-xs md:text-base col-12 col-md-6 col-lg-3 my-3 cursor-pointer">
                        <div class="rounded-lg bg-white">
                            <div class="p-1">
                                <p class="mb-0 p-2">
                                    FPT Software xứng đáng là một công ty phần mềm lớn nhất Việt Nam,
                                    có định hướng phát triển một cách bền vững và có trách nhiệm với cộng đồng.
                                </p>
                                <div class="d-flex align-items-center  p-2 bg-slate-400 rounded-lg text-white">
                                    <img width="60px" height="60px" class="rounded-full mr-4"
                                        src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/05/HongNTA-150x150.jpg"
                                        alt="">
                                    <div>
                                        <p class="mb-0 fw-bold">Trần Ngọc Quang</p>
                                        <p class="mb-0">Phó khoa CNTT - ĐH Công Nghệ TP HCM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide inline-block text-xs md:text-base col-12 col-md-6 col-lg-3 my-3 cursor-pointer">
                        <div class="rounded-lg bg-white">
                            <div class="p-1">
                                <p class="mb-0 p-2">
                                    FPT Software xứng đáng là một công ty phần mềm lớn nhất Việt Nam,
                                    có định hướng phát triển một cách bền vững và có trách nhiệm với cộng đồng.
                                </p>
                                <div class="d-flex align-items-center  p-2 bg-slate-400 rounded-lg text-white">
                                    <img width="60px" height="60px" class="rounded-full mr-4"
                                        src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/05/HongNTA-150x150.jpg"
                                        alt="">
                                    <div>
                                        <p class="mb-0 fw-bold">Trần Ngọc Quang</p>
                                        <p class="mb-0">Phó khoa CNTT - ĐH Công Nghệ TP HCM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide inline-block text-xs md:text-base col-12 col-md-6 col-lg-3 my-3 cursor-pointer">
                        <div class="rounded-lg bg-white">
                            <div class="p-1">
                                <p class="mb-0 p-2">
                                    FPT Software xứng đáng là một công ty phần mềm lớn nhất Việt Nam,
                                    có định hướng phát triển một cách bền vững và có trách nhiệm với cộng đồng.
                                </p>
                                <div class="d-flex align-items-center  p-2 bg-slate-400 rounded-lg text-white">
                                    <img width="60px" height="60px" class="rounded-full mr-4"
                                        src="https://fsoft-academy.edu.vn/wp-content/uploads/2021/05/HongNTA-150x150.jpg"
                                        alt="">
                                    <div>
                                        <p class="mb-0 fw-bold">Trần Ngọc Quang</p>
                                        <p class="mb-0">Phó khoa CNTT - ĐH Công Nghệ TP HCM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   </div>
        </div>

    </div>

    <div class="container">
        <div class="text-center my-10">
            <p class="font-bold pb-2 text-2xl">ĐỘI NGŨ CHUYÊN GIA</p>
            <p class="mb-0">Học viên của UNICA Academy sẽ được hướng dẫn bởi đội ngũ giảng viên, mentor là </p>
            <p class="mb-0">các lập trình viên, chuyên gia công nghệ giàu kinh nghiệm của tập đoàn UNICA.</p>
        </div>
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="row pb-4">
                    <?php
                    foreach ($list as $value){

                    ?>
                    <div class=" col-12 col-md-4 pb-4 hover:drop-shadow-2xl ">
                        <a href="# "><img src="<?php echo './'.$value->avatar ?>" alt=" " width="100% " style="height: 85%;"></a>
                        <h3 class="text-center font-bold py-2"><?php echo $value->name ?></h3>

                    </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
            <div class="col-12 col-md-5 "
                style="background-image: url(https://fsoft-academy.edu.vn/wp-content/uploads/2021/04/bg.svg) ">
                <div class="pt-6 pl-6 text-slate-100 ">
                    <p class="font-bold pb-2 " style="font-size:1rem; "><strong>1/26</strong></p>
                    <p class="font-bold pb-2 " style="font-size:0.8rem; "><strong>GIẢNG VIÊN NỘI BỘ</strong></p>
                    <p class="font-bold pb-2 " style="font-size:1.3rem; "><strong><?php echo $list[0]->name ?></strong></p>
                    <ul>
                        <li class="pl-10 font-semibold "><strong>- Vị trí công tác hiện tại:</strong> Giảng viên bộ môn
                            .NET</li>
                        <li class="pl-10 font-semibold "><strong>- Trình độ học vấn:</strong> <?php echo $list[0]->degree ?></li>
                        <li class="pl-10 font-semibold "><strong>- Quá trình công tác</strong></li>
                        <ul>
                            <li class="pl-20 ">- 2017 - 2020: FPT Telecom</li>
                            <li class="pl-20 ">- 2020 - 07/2021: Vingroup</li>
                            <li class="pl-20 ">- 08/2021 - 03/2022: UNICA - FHN.MAS</li>
                            <li class="pl-20 ">- 04/2022 - nay: UNICA Academy - Giảng viên nội bộ</li>
                        </ul>
                        <li class="pl-10 font-semibold "><strong>- Các chứng chỉ đã đạt được:</strong> Nghiệp vụ sư phạm
                        </li>
                        <li class="pl-10 font-semibold "><strong>- Châm ngôn yêu thích:</strong> <i>"Tuổi trẻ không áp
                                lực chẳng lẽ đợi đến già? "</i> </li>
                        <li class="pl-10 font-semibold "><strong>- Lời khuyên cho các bạn học viên: "</strong> Chúng ta
                            chỉ sống có một lần, tuổi trẻ qua đi cũng không thể trở lại. Sẽ thật đáng tiếc nếu chúng ta
                            lãng phí quãng thời gian ấy. Vì vậy, chúng ta cần thật nỗ lực để khi nhìn
                            lại không phải nuối tiếc rằng nếu ngày ấy cố gắng, chắc hẳn đã có sự nghiệp thành công hơn.
                            Áp lực tạo kim cương!"</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php include_once './commons/body-footer.php';?>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }

        #main {
            width: 80%;
            margin: 0 auto;
        }

        .btn:focus,
        .btn-close:focus {
            box-shadow: none;
        }


        .bg {
            background-color: #fff;
            box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
        }

        .list-menu ul li a {
            font-size: 1.1rem;
            color: #333;
        }
    </style>
</body>

</html>