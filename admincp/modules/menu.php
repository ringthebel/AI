<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['dangnhap']);
    header('location:login.php');
}
?>
<div class="menu">
    <ul>
        <li><a href="index.php?quanly=hoadon&ac=lietke">Hóa đơn</a></li>
        <li><a href="index.php?quanly=loaisp&ac=lietke">Loại sản phẩm</a></li>
        <li><a href="index.php?quanly=sanpham&ac=lietke">Sản phẩm</a></li>
        <li><a href="index.php?quanly=size_soluong&ac=lietke">Size-số lượng</a></li>        
        <li><a href="index.php?quanly=tintuc&ac=lietke">Tin tức</a></li>       
        <li><a href="index.php?quanly=phanhoi&ac=lietke">Phản hồi</a></li>                      
        <form action="" method="post" enctype="multipart/form-data">
            <input type="submit" name="logout" value="Đăng xuất" style="background:#06F;color:#fff;width:70px;height:30px;"/>
        </form>
    </ul>
</div>
<form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data">
    <p>
        <input type="text" name="masp" placeholder="Nhập mã sản phẩm..." id="timkiem" required="required" />
        <input type="submit" id="button_timkiem" name="timkiem" value="Tìm sản phẩm" />
    </p>
</form>