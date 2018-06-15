<div class="button_them">
  <a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sản phẩm</a> 
</div>
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Thêm sản phẩm</td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="tensp" required="required"></td>
    </tr>
    <tr>
      <td>Mã sản phẩm</td>
      <td><input type="text" name="masp" required="required"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"/></td>
    </tr>
    <tr>
    <?php
    $sql_thuonghieu = "select * from thuonghieu";
    $row_thuonghieu =mysqli_query($conn,$sql_thuonghieu);
    ?>
      <td>Thương hiệu</td>
      <td><select name="idthuonghieu">
      <?php
      while($dong_thuonghieu=mysqli_fetch_array($row_thuonghieu)){        
      ?>
        <option value="<?php echo $dong_thuonghieu['idthuonghieu'] ?>"><?php echo $dong_thuonghieu['tenthuonghieu'] ?></option>
      <?php
      }
      ?>
      </select></td>
    </tr>
    <tr>
      <td>Đơn giá</td>
      <td><input type="text" name="dongia" required="required"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><input type="text" name="noidung"></td>
    </tr>
    <tr>
    <?php
    $sql_loaisp = "select * from loaisp";
    $row_loaisp=mysqli_query($conn,$sql_loaisp);
    ?>
      <td>Loại sản phẩm</td>
      <td><select name="idloaisp">
      <?php
      while($dong_loaisp=mysqli_fetch_array($row_loaisp)){
      ?>
          <option value="<?php echo $dong_loaisp['idloaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
      <?php
      }
      ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2">        
        <input class="submit" type="submit" name="them" value="Thêm">        
      </td>
    </tr>
  </table>
</form>


