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
                        <a class="nav-link px-0" href="home.php">Trang
                            chủ</a>
                    </li>
                    <li class="nav-item dropdown list-inline-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Khoá học
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="courses.php">Danh
                                    sách tất cả khoá học</a></li>
                            <li><a class="dropdown-item" href="#">Khoá
                                    học miễn phí</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-inline-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Giới thiệu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Giảng
                                    viên</a></li>
                            <li><a class="dropdown-item" href="#">Về
                                    chúng tôi</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-2" href="contact.php">Liên
                            hệ</a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-1" href="login.php">Đăng
                            nhập</a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a class="nav-link px-1" href="register.php">Đăng
                            ký</a>
                    </li>
                    <li class="list-inline-item me-4">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid
                                            fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <li class="list-inline-item me-2">
                        <i class="text-xl fa-solid fa-cart-shopping"></i>
                    </li>
                </ul>
                <div class="d-block d-lg-none float-end">
                    <button class="btn btn-outline-none p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
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
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="home.php">Trang chủ</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="#">Liên hệ</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="login.php">Đăng nhập</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link text-dark" href="register.php">Đăng ký</a>
                </li>

                <li class="list-group-item list-group-item-action">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Khoá học
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="courses.php">Danh sách tất cả khoá học</a></li>
                        <li><a class="dropdown-item" href="#">Khoá học miễn phí</a></li>
                    </ul>
                </li>
                <li class="list-group-item list-group-item-action">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Giới thiệu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Giảng viên</a></li>
                        <li><a class="dropdown-item" href="#">Về chúng tôi</a></li>
                    </ul>
                </li>


                <li class="list-group-item list-group-item-action">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="text-xl fa-solid fa-cart-shopping"></i>
                </li>

            </ul>
        </div>
    </div>
</menu>