<div class="button_them">
  <a href="index.php?quanly=loaisp&ac=lietke">Liệt kê loại sản phẩm</a> 
</div>
<form action="modules/quanlyloaisp/xuly.php" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:25px">Thêm loại sản phẩm</td>
    </tr>  
    <tr>
      <td>Tên loại sản phẩm</td>
      <td><input type="text" name="tenloaisp" required="required"></td>
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
      <td colspan="2">     
        <input class="submit" type="submit" name="them" value="Thêm">
      </td>
    </tr>
  </table>
</form>


