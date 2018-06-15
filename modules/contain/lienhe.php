<?php
@session_start();
if (isset($_POST['gui'])) {
    unset($_SESSION['product']);
    $user = $_POST['username'];
    $email = $_POST['email'];
    $loinhan = $_POST['loinhan'];
    $reg_email = "/^[A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    if (!preg_match($reg_email, $email)) {
        echo '<p class="loi">Email không hợp lệ</p>';
    } else {
        $sql_lienhe = mysqli_query($conn, "insert into lienhe(ten,email,loinhan) value ('$user','$email','$loinhan')");
        if ($sql_lienhe) {
            header('location:?quanly=phanhoi');
        }
    }
}
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Liên hệ cho chúng tôi</h2>
    <div class="log">
        <div class="box account">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="username">Tên đầy đủ :<strong style="color:red;"> (*)</strong></label>
                <input type="text" maxlength="20" id="username" name="username" placeholder="Vui lòng nhập đầy đủ Họ và tên" required="required">
                <label for="email">Email :<strong style="color:red;"> (*)</strong></label>
                <input type="text" id="email" name="email" placeholder="Vui lòng nhập địa chỉ Email" required="required">         
                <label for="loinhan">Lời nhắn :<strong style="color:red;"> (*)</strong></label>
                <textarea style="width:100%; height:100px;" id="loinhan" name="loinhan" placeholder="Vui lòng nhập nội dung lời nhắn" required="required"></textarea>
                <div class="submit">
                    <input type="submit" name="gui" value="GỬI"/>
                </div>
            </form>
        </div>   
    </div>
</div>
