<?php
	$sql = "select * from loaisp where idloaisp = '$_GET[id]'";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
?>
<div class="button_them">
  <a href="index.php?quanly=loaisp&ac=lietke">Liệt kê loại sản phẩm</a>
</div>
<form action="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['idloaisp']?>" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:25px">Sửa loại sản phẩm</td>
    </tr>
    <tr>
      <td>Id loại sản phẩm</td>
      <td><?php echo $dong['idloaisp'] ?></td>
    </tr>
    <tr>
      <td>Tên loại sản phẩm</td>
      <td><input type="text" name="tenloaisp" value="<?php echo $dong['tenloaisp'] ?>" required="required"></td>
    </tr>
    <tr>
      <td>Thương hiệu</td>
      <td><select name="idthuonghieu">
      <?php
      $sql_thuonghieu ="select * from thuonghieu";
      $row_thuonghieu =mysqli_query($conn,$sql_thuonghieu);
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
      <td colspan="2">
        <input class="submit" type="submit" name="sua" value="Sửa">
      </td>
    </tr>
  </table>
</form>


