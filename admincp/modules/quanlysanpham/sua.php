<?php
	$sql = "select * from sanpham where idsp='$_GET[id]'";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
?>
<div class="button_them">
  <a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sản phẩm</a> 
</div>
<form action="modules/quanlysanpham/xuly.php?id=<?php echo $dong['idsp'] ?>" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Sửa sản phẩm</td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="tensp" value="<?php echo $dong['tensp'] ?>" required="required"></td>
    </tr>
    <tr>
      <td>Mã sản phẩm</td>
      <td><input type="text" name="masp" value="<?php echo $dong['masp'] ?>" required="required"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh" /><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="100"></td>
    </tr>
    <tr>
    <?php
    $sql_thuonghieu ="select * from thuonghieu";
    $row_thuonghieu =mysqli_query($conn,$sql_thuonghieu);
    ?>
      <td>Thương hiệu</td>
      <td><select name="idthuonghieu">
      <?php
      while($dong_thuonghieu=mysqli_fetch_array($row_thuonghieu)){
        if($dong['idthuonghieu']==$dong_thuonghieu['idthuonghieu']){
      ?>
          <option selected="selected" value="<?php echo $dong_thuonghieu['idthuonghieu'] ?>"><?php echo $dong_thuonghieu['tenthuonghieu'] ?></option>
        <?php
        }else{
        ?>
          <option value="<?php echo $dong_thuonghieu['idthuonghieu'] ?>"><?php echo $dong_thuonghieu['tenthuonghieu'] ?></option>
        <?php
        }
      }
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Giá đề xuất</td>
      <td><input type="text" name="dongia" value="<?php echo $dong['dongia'] ?>" required="required"></td>
    </tr>    
    <tr>
    <?php
    $sql_loaisp ="select * from loaisp";
    $row_loaisp =mysqli_query($conn,$sql_loaisp);
    ?>
      <td>Loại sản phẩm</td>
      <td><select name="idloaisp">
      <?php
      while($dong_loaisp=mysqli_fetch_array($row_loaisp)){
        if($dong['idloaisp']==$dong_loaisp['idloaisp']){
      ?>
          <option selected="selected" value="<?php echo $dong_loaisp['idloaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
        <?php
        }else{
        ?>
          <option value="<?php echo $dong_loaisp['idloaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
        <?php
        }
      }
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><input type="text" name="noidung" value="<?php echo $dong['noidung'] ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input class="submit" type="submit" name="sua" value="Sửa">
      </div></td>
    </tr>
  </table>
</form>


