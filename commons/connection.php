<?php
$conn = mysqli_connect("localhost", "root", "", "unica");
if (!$conn) {
    echo 'loi' . mysqli_connect_error();
}
?>