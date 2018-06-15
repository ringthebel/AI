<?php
	$sql = "select * from tintuc where idtintuc='$_GET[id]' ";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
 ?>
<div class="button_them">
  <a href="index.php?quanly=tintuc&ac=lietke">Liệt kê tin tức</a> 
</div>
<form action="modules/quanlytintuc/xuly.php?id=<?php echo $dong['idtintuc'] ?>" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2"  style="text-align:center;font-size:25px;">Sửa tin tức</td>
    </tr>
    <tr>
      <td>Tên tin tức</td>
      <td><input type="text" name="tentintuc" value="<?php echo $dong['tentintuc'] ?>" required="required"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh" /><img src="modules/quanlytintuc/uploads/<?php echo $dong['hinhanh'] ?>" width="80" height="80"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><input type="text" name="noidung" value="<?php echo $dong['noidung'] ?>" required="required"></td>
    </tr>      
    <tr>
      <td colspan="2">
        <input class="submit" type="submit" name="sua" value="Sửa">
      </td>
    </tr>
  </table>
</form>


