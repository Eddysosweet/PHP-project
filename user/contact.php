<?php include_once 'commons/head.php';?>

<body>
<?php include_once 'commons/body-menu.php';?>
    <div id="contact">
        <div class="container" style="margin-top: 7rem !important;">
            <div class="flex items-center my-4 before:flex-1 before:border-t
                    before:border-gray-300 before:mt-0.5 after:flex-1
                    after:border-t after:border-gray-300 after:mt-0.5">
                <h1 class="text-center text-4xl font-semibold">Liên hệ</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-0 mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9231238536895!2d105.81679105066439!3d21.035761792845992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d127a01e7%3A0xab069cd4eaa76ff2!2zMjg1IMSQ4buZaSBD4bqlbiwgVsSpbmggUGjDuiwgQmEgxJDDrG5oLCBIw6AgTuG7mWkgMTAwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1662693682503!5m2!1svi!2s"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                </div>
                <div class="col-12 col-md-6">
                    <p class="mb-0 text-xl pb-2"><i class="fa-solid fa-location-arrow me-1
                                text-sky-500"></i> 373/226 Lý Thường Kiệt, P.8, Q.Tân Bình, Tp. HCM</p>
                    <a class="text-lg font-bold" href="tel:+1900 636 648">
                        <i class="fa-solid fa-phone me-1 text-sky-500"></i> 1900 636 648</a>
                    <p class="mb-0 text-lg font-bold pt-2">
                        <a href="mailto:info@mona-media.com">
                            <i class="fa-solid fa-envelope me-1
                                    text-sky-500"></i> info@mona-media.com
                        </a>
                    </p>
                    <!-- form contact -->
                    <h3 class="text-center py-3 text-2xl">Liên hệ: <span class="text-cyan-600">UNICA</span></h3>
                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control py-2" id="inputEmail4" placeholder="Họ và tên">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control py-2" id="inputPassword4" placeholder="Số điện thoại">
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" class="form-control py-2" id="inputAddress" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control py-2" name="address" id="inputAddress2" placeholder="Địa chỉ">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lời nhắn ..."></textarea>
                        </div>
                        <div class="col-12 d-flex justify-center">
                            <button type="submit" class=" btn
                                    btn-outline-primary w-100 py-2">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>

            <!--  -->
            <div class="advise border mt-5">
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="px-4 py-8">
                            <h3 class="text-3xl font-bold pb-3">Liên hệ chuyên viên tư vấn</h3>
                            <p class="text-lg">Nếu quý khách còn đang phân vân hoặc còn khúc mắc gì trong kế hoạch kinh doanh khóa học trực tuyến, xin vui lòng liên hệ các chuyên gia của chúng tôi thông qua:</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-center
                            items-center">
                        <div class="px-4 py-6">
                            <p class="text-lg">Hotline: <span class="text-2xl sm:text-4xl font-bold
                                        text-red-600 hover:text-orange-600 ">1900
                                        636 648</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'commons/body-footer.php';?>
    <style>
        
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
        
        input::placeholder {
            font: 1.1rem sans-serif;
        }
    </style>
</body>

</html>