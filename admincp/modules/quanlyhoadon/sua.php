<?php
	$sql = "select * from hoadon where idhoadon='$_GET[id]' ";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
 ?>
<div class="button_them">
  <a href="index.php?quanly=hoadon&ac=lietke">Liệt kê hóa đơn</a> 
</div>
<form action="modules/quanlyhoadon/xuly.php?id=<?php echo $dong['idhoadon'] ?>" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2"  style="text-align:center;font-size:25px;">Sửa hóa đơn</td>
    </tr>
    <tr>
      <td>Ghi chú</td>
      <td><select name="idghichu">
      <?php
      $sql_ghichu ="select * from ghichu";
      $row_ghichu =mysqli_query($conn,$sql_ghichu);
      while($dong_ghichu=mysqli_fetch_array($row_ghichu)){
        if($dong['idghichu']==$dong_ghichu['idghichu']){
      ?>
          <option selected="selected" value="<?php echo $dong_ghichu['idghichu'] ?>"><?php echo $dong_ghichu['ghichu'] ?></option>
        <?php
        }else{
        ?>
          <option value="<?php echo $dong_ghichu['idghichu'] ?>"><?php echo $dong_ghichu['ghichu'] ?></option>
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


