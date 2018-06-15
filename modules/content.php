<?php

if (isset($_GET['quanly']) && ($_GET['quanly']) != '') {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}if ($tam == 'chitietsp') {
    include('modules/contain/chitietsp.php');
} elseif ($tam == 'giohang') {
    include('modules/contain/giohang.php');
} elseif ($tam == 'dangkymoi') {
    include('modules/contain/dangkymoi.php');
} elseif ($tam == 'dangnhap') {
    include('modules/contain/dangnhap.php');
} elseif ($tam == 'tintuc') {
    include('modules/contain/tintuc.php');
} elseif ($tam == 'chitiettintuc') {
    include('modules/contain/chitiettintuc.php');
} elseif ($tam == 'loaisp') {
    include('modules/contain/loaisp.php');
} elseif ($tam == 'camon') {
    include('modules/contain/camon.php');
} elseif ($tam == 'lienhe') {
    include('modules/contain/lienhe.php');
} elseif ($tam == 'phanhoi') {
    include('modules/contain/phanhoi.php');
} elseif ($tam == 'thongtingiaohang') {
    include('modules/contain/thongtingiaohang.php');
} elseif ($tam == 'adidas') {
    include('modules/contain/adidas.php');
} elseif ($tam == 'nike') {
    include('modules/contain/nike.php');
} elseif ($tam == 'timkiem') {
    include('modules/contain/timkiem.php');
} else {
    include('modules/contain/sp.php');
}
?>