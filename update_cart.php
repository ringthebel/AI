<?php

session_start();
include('admincp/modules/config.php');

if (isset($_POST['add_to_cart'])) {
    $id = $_POST['id'];
    $size = $_POST['size'];
    $soluong = $_POST['soluong'];
    $sql = "select * from sanpham INNER JOIN size_soluong on sanpham.idsp=size_soluong.idsp WHERE size_soluong.idsp='$id' and size_soluong.size='$size'";
    $row = mysqli_query($conn, $sql);
    $dong = mysqli_fetch_array($row);
    if (isset($_SESSION['username'])) {
        $sql1 = "select * from dangky WHERE tendangnhap='" . $_SESSION['username'] . "'";
        $row1 = mysqli_query($conn, $sql1);
        $dong1 = mysqli_fetch_array($row1);
    }
    if ($dong) {
        $new_product = array(array('tensp' => $dong['tensp'], 'id' => $id, 'size' => $size, 'soluong' => $soluong, 'dongia' => $dong['dongia']));
        if (isset($_SESSION['product'])) {
            $found = false;
            foreach ($_SESSION['product'] as $cart_item) {
                if (($cart_item['id'] == $id) && ($cart_item['size'] == $size)) {
                    $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => ($soluong + $cart_item['soluong']), 'dongia' => $cart_item['dongia']);
                    $found = true;
                } else {
                    $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $cart_item['soluong'], 'dongia' => $cart_item['dongia']);
                }
            }
            if ($found == false) {
                $_SESSION['product'] = array_merge($product, $new_product);
                $sql2 = "INSERT INTO giohang(idsp,iduser,size,soluong) VALUES('" . $id . "','" . $dong1['iduser'] . "','" . $size . "','" . $soluong . "')";
                $row2 = mysqli_query($conn, $sql2);
                echo $sql2;
            } else {
                $_SESSION['product'] = $product;
                echo(($soluong + $cart_item['soluong']));
                $sql2 = "UPDATE giohang SET soluong = '" . ($soluong + $cart_item['soluong']) . "' WHERE iduser='" . $dong1['iduser'] . "' AND idsp='" . $cart_item['id'] . "' AND size = '" . $size . "'";
                echo $sql2;
                $row2 = mysqli_query($conn, $sql2);
            }
        } else {
            $_SESSION['product'] = $new_product;
            $sql2 = "INSERT INTO giohang(idsp,iduser,size,soluong) VALUES('" . $id . "','" . $dong1['iduser'] . "','" . $size . "','" . $soluong . "')";
            $row2 = mysqli_query($conn, $sql2);
        }
    }
    header('location:index.php?quanly=giohang');
}

//tru sp
if (isset($_GET['tru'])) {
    $id = $_GET['id'];
    $size = $_GET['size'];
    if (isset($_SESSION['username'])) {
        $sql1 = "select * from dangky WHERE tendangnhap='" . $_SESSION['username'] . "'";
        $row1 = mysqli_query($conn, $sql1);
        $dong1 = mysqli_fetch_array($row1);
    }
    foreach ($_SESSION['product'] as $cart_item) {
        if (($id != $cart_item['id']) || ($size != $cart_item['size'])) {
            $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $cart_item['soluong'], 'dongia' => $cart_item['dongia']);
            $_SESSION['product'] = $product;
        } else {
            $giam = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $giam, 'dongia' => $cart_item['dongia']);
            } else {
                $giam = 1;
                $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $giam, 'dongia' => $cart_item['dongia']);
            }
            if (isset($_SESSION['username'])) {
                $sql = "UPDATE giohang SET soluong = '" . $giam . "' WHERE iduser='" . $dong1['iduser'] . "' AND idsp='" . $cart_item['id'] . "' AND size = '" . $size . "'";
                $row = mysqli_query($conn, $sql);
            }
            $_SESSION['product'] = $product;
        }
    }
    header('location:index.php?quanly=giohang');
}

//cong them sp
if (isset($_GET['cong'])) {
    $id = $_GET['id'];
    $size = $_GET['size'];
    if (isset($_SESSION['username'])) {
        $sql1 = "select * from dangky WHERE tendangnhap='" . $_SESSION['username'] . "'";
        $row1 = mysqli_query($conn, $sql1);
        $dong1 = mysqli_fetch_array($row1);
    }
    foreach ($_SESSION['product'] as $cart_item) {
        if (($id != $cart_item['id']) || ($size != $cart_item['size'])) {
            $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $cart_item['soluong'], 'dongia' => $cart_item['dongia']);
            $_SESSION['product'] = $product;
        } else {
            $tang = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < 25) {
                $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $tang, 'dongia' => $cart_item['dongia']);
            } else {
                $tang = 25;
                $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $tang, 'dongia' => $cart_item['dongia']);
            }
            if (isset($_SESSION['username'])) {
                $sql = "UPDATE giohang SET soluong = '" . $tang . "' WHERE iduser='" . $dong1['iduser'] . "' AND idsp='" . $cart_item['id'] . "' AND size = '" . $size . "'";
                $row = mysqli_query($conn, $sql);
            }
            $_SESSION['product'] = $product;
        }
    }
    header('location:index.php?quanly=giohang');
}

//xoa san pham
if (isset($_SESSION['product']) && isset($_GET['xoa'])) {
    $id = $_GET['id'];
    $size = $_GET['size'];
    if (isset($_SESSION['username'])) {
        $sql1 = "select * from dangky WHERE tendangnhap='" . $_SESSION['username'] . "'";
        $row1 = mysqli_query($conn, $sql1);
        $dong1 = mysqli_fetch_array($row1);
    }
    foreach ($_SESSION['product'] as $cart_item) {
        if (($cart_item['id'] != $id) || ($cart_item['size'] != $size)) {
            $product[] = array('tensp' => $cart_item['tensp'], 'id' => $cart_item['id'], 'size' => $cart_item['size'], 'soluong' => $cart_item['soluong'], 'dongia' => $cart_item['dongia']);
        } else {
            $sql = "DELETE FROM giohang WHERE iduser='" . $dong1['iduser'] . "' AND idsp='" . $cart_item['id'] . "' AND size = '" . $size . "'";
            $row = mysqli_query($conn, $sql);
        }
        $_SESSION['product'] = $product;
    }
    header('location:index.php?quanly=giohang');
}
?>



