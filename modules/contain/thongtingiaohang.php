<?php
@session_start();
if (isset($_POST['gui'])) {
    $hoten = $_POST['hoten'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $smallAddress = $_POST['smallAddress'];
    $normalAddress = $_POST['normalAddress'];
    $largeAddress = $_POST['largeAddress'];
    $reg_email = "/^[A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    $reg_phone = "/^[0][0-9]{8,10}$/";
    if (!preg_match($reg_email, $email)) {
        echo '<p class="loi">Email không hợp lệ</p>';
    } elseif (!preg_match($reg_phone, $dienthoai)) {
        echo '<p class="loi">Số điện thoại không hợp lệ</p>';
    } else {
        $insert_hoadon = mysqli_query($conn, "insert into hoadon(tenkhachhang,dienthoai,email,diachi_nho,diachi_tb,diachi_rong,idghichu) value ('$hoten','$dienthoai','$email','$smallAddress','$normalAddress','$largeAddress','0')");
        if ($insert_hoadon) {
            $max = mysqli_query($conn, "select max(idhoadon) from hoadon");
            $dong_max = mysqli_fetch_array($max);
            $idhoadon = $dong_max[0];
            foreach ($_SESSION['product'] as $key => $row) {
                $idsp = $row['id'];
                $tensp = $row['tensp'];
                $size = $row['size'];
                $soluong = $row['soluong'];
                $dongia = $row['dongia'];
                $insert_hoadonchitiet = "insert into hoadonchitiet(idhoadon,idsp,size,soluong,dongia) values ('" . $idhoadon . "','" . $idsp . "','" . $size . "','" . $soluong . "','" . $dongia . "');";
                $query = mysqli_query($conn, $insert_hoadonchitiet);
                if (isset($_SESSION['username'])) {
                    $sql = mysqli_query($conn, "select iduser from dangky where tendangnhap='" . $_SESSION['username'] . "'");
                    $dong = mysqli_fetch_array($sql);
                    $iduser = $dong[0];
                    $sql_xoagiohang = "delete from giohang where iduser='" . $iduser . "'";
                    $xoa = mysqli_query($conn, $sql_xoagiohang);
                }
            }
        }
        unset($_SESSION['product']);
        header('location:?quanly=camon');
    }
}
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Thông tin giao hàng</h2>
    <div class="log">
        <p>Các mục dấu (*) là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác thông tin</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box boxLeft">
                <label for="hoten">Họ và tên :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập họ và tên" name="hoten" id="hoten" >
                <label for="dienthoai">Số điện thoại :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập số điện thoại" name="dienthoai" id="dienthoai">
                <label for="email">Địa chỉ Email :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập Email" name="email" id="email" >
            </div>
            <div class="box boxRight">
                <label for="smallAddress">Xóm/Thôn/Số nhà/Đường phố :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập xóm/thôn/số nhà/đường phố" name="smallAddress" id="smallAddress" >
                <label for="normalAddress">Quận/Huyện :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập quận/huyện" name="normalAddress" id="normalAddress">
                <label for="largeAddress">Tỉnh/Thành phố :<strong style="color:red;"> (*)</strong></label>
                <input type="text" placeholder="Vui lòng nhập tỉnh/thành phố" name="largeAddress" id="largeAddress">
            </div>
            <div id="luu">
                <input type="submit" name="gui" value="Lưu"/>
            </div>                 
        </form>
    </div> 
</div>
