<div class="button_them">
  <a href="index.php?quanly=tintuc&ac=lietke">Liệt kê tin tức</a>
</div>
<form action="modules/quanlytintuc/xuly.php" method="post" enctype="multipart/form-data">
  <table width="600" border="1">
    <tr>
      <td colspan="2"  style="text-align:center;font-size:25px;">Thêm tin tức</td>
    </tr>
    <tr>
      <td>Tên tin tức</td>
      <td><input type="text" name="tentintuc" required="required"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"/></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><input type="text" name="noidung" required="required"></td>
    </tr>
    <tr>
      <td colspan="2">
        <input class="submit" type="submit" name="them" value="Thêm">
      </td>
    </tr>
  </table>
</form>


