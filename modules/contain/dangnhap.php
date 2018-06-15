<?php
@session_start();
unset($_SESSION['product']);
if (isset($_POST['dangnhap'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = mysqli_query($conn, "select * from dangky where tendangnhap='$user' and matkhau='$pass'");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        $_SESSION['username'] = $user;
        header('location:?quanly=giohang');
    } else {
        echo '<p class="loi">Tên đăng nhập hoặc Mật khẩu bị sai</p>';
        ?>	
        <?php
    }
    if (isset($_SESSION['username'])) {
        $sql1 = "select * from dangky WHERE tendangnhap='" . $_SESSION['username'] . "'";
        $row1 = mysqli_query($conn, $sql1);
        $dong1 = mysqli_fetch_array($row1);
        $sql = "select * from giohang INNER JOIN sanpham on giohang.idsp=sanpham.idsp WHERE iduser='" . $dong1['iduser'] . "'";
        $row = mysqli_query($conn, $sql);
        // $dong=mysqli_fetch_array($row);
        foreach ($row as $giohang) {
            $product[] = array('tensp' => $giohang['tensp'], 'id' => $giohang['idsp'], 'size' => $giohang['size'], 'soluong' => $giohang['soluong'], 'dongia' => $giohang['dongia']);
        }
        if (isset($product)) {
            $_SESSION['product'] = $product;
        }
    }
}
?>
<div class="main_page"> 
    <h2 class="centerBoxHeading">Đăng nhập</h2>
    <div class="log">
        <p>Các mục dấu (*) là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác thông tin</p>
        <div class="box account">
            <form action="" method="post" enctype="multipart/form-data">				
                <label for="username">Tên đăng nhập :<strong style="color:red;"> (*)</strong></label>
                <input type="text" id="username" name="username" placeholder="Vui lòng nhập tên đăng nhập" required="required" value="<?php if (isset($user) && ($user != NULL)) {
    echo $user;
} ?>">
                <label for="password">Mật khẩu :<strong style="color:red;"> (*)</strong></label>
                <input type="password" id="password" name="password" placeholder="Vui lòng nhập mật khẩu" required="required">
                <div class="submit">
                    <input type="submit" name="dangnhap" value="ĐĂNG NHẬP"/>
                </div>
            </form>
        </div>  		
    </div>
    <h3>
        <a href="?quanly=dangkymoi" style="text-decoration:none; color:#FFF; margin:10px; border-radius:10px; padding:5px; background:#F00; float:right;">
            Đăng ký tài khoản
        </a>
    </h3>
</div>


