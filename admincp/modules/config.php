<?php
$tenmaychu = 'localhost';
$tentaikhoan = 'root';
$pass = '123456';
$csdl = 'ai';
$conn = mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl) or die('Ko kết nối được');
mysqli_select_db($conn, $csdl);
?>