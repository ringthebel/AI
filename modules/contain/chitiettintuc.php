<?php
$sql = "select * from tintuc where idtintuc='$_GET[id]'";
$num = mysqli_query($conn, $sql);
$dong = mysqli_fetch_array($num);
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Tin tức chi tiết</h2>
    <img style="float: left; width: 30%; height: 30%; margin: 30px;" src="admincp/modules/quanlytintuc/uploads/<?php echo $dong['hinhanh'] ?>">
    <p style="margin: 30px;"><?php echo $dong['noidung'] ?></p>
</div>
