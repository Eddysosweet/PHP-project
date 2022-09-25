<?php
include "commons/admin-header.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="container text-center p-5 w-50 m-auto">
            <form class="sm:px-9 input_form mt-5" action="handle-login.php" method="post">
                <div class="mb-6">

                    <input
                            id="username"
                            name="username"
                            type="text"
                            class="form-control m-auto px-2 py-2 w-50 text-lg  text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600"
                            placeholder="username"
                    />
                </div>
                <div class="mb-6">

                    <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control m-auto px-2 py-2 w-50 text-lg  text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600"
                            placeholder="password"
                    />
                </div>
                <div class="text-red-500 mb-2 text-sm md:text-lg"><?php if(isset($_SESSION['fail'])){
                        echo $_SESSION['fail'];
                        unset($_SESSION['fail']);
                    } ?></div>
                <button
                        type="submit"
                        class="inline-block px-2 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-50"
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                >
                    Đăng Nhập
                </button>

            </form>
        </div>
    </div>



