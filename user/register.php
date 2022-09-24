<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body>
    <div id="register" class="flex justify-center items-center">
        <div class="register_body  md:w-2/4 xl:w-4/12">
           <h1 class="text-center text-3xl py-9">ĐĂNG KÝ TÀI KHOẢN</h1>
           <form class="sm:px-9 input_form" action="handle-signup.php" method="post">
                <input class="w-full my-2" type="text" name="name" placeholder="Họ và tên">
                <input class="w-full my-2" type="email" name="email" placeholder="Email">
                <input class="w-full my-2" type="text" name="phone" placeholder="Số điện thoại">
                <input class="w-full my-2" type="password" name="password" placeholder="Mật khẩu, phải lớn hơn 6">
                <input class="w-full my-2" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                <div class="form-group form-check">
                    <input
                      type="checkbox"
                      class="w-4 h-4"
                      id="exampleCheck3"
                      checked
                    />
                    <label
                      class="form-check-label inline-block text-gray-800"
                      for="exampleCheck2"
                      >Bạn đồng ý với điều khoản sử dụng</label
                    >
                  </div>
               <div class="text-red-500 my-2 text-sm md:text-lg"><?php if(isset($_SESSION['fail'])){
                       echo $_SESSION['fail'];
                       unset($_SESSION['fail']);
                   } ?></div>
                  <button
                  type="submit"
                  class="inline-block px-7 my-3 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                  data-mdb-ripple="true"
                  data-mdb-ripple-color="light"
                >
                  Đăng Ký
                </button>
                <!-- <span class="flex justify-center py-2 text-xl">Hoặc</span>
                <button class="w-full py-3 mb-2" type="submit" name="register"><a href="">Đăng nhập vào facebook</a></button> -->
                <span class="flex justify-center py-3 pb-9">Bạn đã có tài khoản?<a class="px-5 text-blue-600 hover:text-blue-300 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out" href="login.php">Đăng nhập</a></span>
           </form>
        </div>

    </div>
    
</body>
</html>