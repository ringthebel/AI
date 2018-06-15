<?php
@session_start();
if (isset($_POST['gui'])) {
    unset($_SESSION['product']);
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $passconfirm = $_POST['passwordconfirm'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $sql = "select * from dangky";
    $row = mysqli_query($conn, $sql);
    $reg_email = "/^[A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    $reg_phone = "/^[0][0-9]{8,10}$/";
    $flag = 0;

    $check = "select tendangnhap from dangky where tendangnhap='" . $user . "'";
    $row1 = mysqli_query($conn, $check);
    $dong1 = mysqli_fetch_array($row1);
    // var_dump($dong1);
    if ($dong1 == null) {
        $check2 = "select email from dangky where email='" . $email . "'";
        $row2 = mysqli_query($conn, $check2);
        $dong2 = mysqli_fetch_array($row2);
        if ($dong2 == null) {
            while ($dong = mysqli_fetch_array($row)) {
                if ($pass != $passconfirm) {
                    echo '<p class="loi">Mật khẩu xác nhận lại không chính xác</p>';
                    break;
                } elseif (!preg_match($reg_email, $email)) {
                    echo '<p class="loi">Email không hợp lệ</p>';
                    break;
                } elseif (!preg_match($reg_phone, $dienthoai)) {
                    echo '<p class="loi">Số điện thoại không hợp lệ</p>';
                    break;
                } else {
                    $flag = 1;
                    break;
                }
            }
        } else {
            echo '<p class="loi">Email đã tồn tại</p>';
        }
    } else {
        echo '<p class="loi">Tên đăng nhập đã tồn tại</p>';
    }

    if ($flag == 1) {
        $sql_dangky = mysqli_query($conn, "insert into dangky(tendangnhap,matkhau,email,dienthoai) value ('$user','$pass','$email','$dienthoai')");
        if ($sql_dangky) {
            $_SESSION['username'] = $user;
            header('location:?quanly=giohang');
        }
    }
}
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Đăng ký tài khoản</h2>
    <div class="log">
        <p>Các mục dấu (*) là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác thông tin</p>
        <div class="box account">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="username">Tên đăng nhập :<strong style="color:red;"> (*)</strong></label>
                <input type="text" id="username" name="username" placeholder="Vui lòng nhập tên đăng nhập" required="required" value="<?php if (isset($user) && ($user != NULL)) {
    echo $user;
} ?>">
                <label for="password">Mật khẩu :<strong style="color:red;"> (*)</strong></label>
                <input type="password" id="password" name="password" placeholder="Vui lòng nhập mật khẩu" required="required" value="<?php if (isset($pass) && ($pass != NULL)) {
    echo $pass;
} ?>">
                <label for="passwordconfirm">Xác nhận mật khẩu :<strong style="color:red;"> (*)</strong></label>
                <input type="password" id="passwordconfirm" name="passwordconfirm" placeholder="Vui lòng nhập lại mật khẩu" required="required" value="<?php if (isset($passconfirm) && ($passconfirm != NULL)) {
    echo $passconfirm;
} ?>">
                <label for="email">Địa chỉ Email :<strong style="color:red;"> (*)</strong></label>
                <input type="text" id="email" name="email" placeholder="Vui lòng nhập địa chỉ email" required="required" value="<?php if (isset($email) && ($email != NULL)) {
    echo $email;
} ?>">
                <label for="dienthoai">Số điện thoại :<strong style="color:red;"> (*)</strong></label>
                <input type="text" id="dienthoai" name="dienthoai" placeholder="Vui lòng nhập số điện thoại" required="required" value="<?php if (isset($dienthoai) && ($dienthoai != NULL)) {
    echo $dienthoai;
} ?>">      
                <div class="submit">
                    <input type="submit" name="gui" value="ĐĂNG KÝ"/>
                </div>
            </form>
        </div>
    </div>
</div>
