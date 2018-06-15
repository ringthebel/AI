<?php
  $sql_lietke ="select * from loaisp,thuonghieu where loaisp.idthuonghieu=thuonghieu.idthuonghieu order by idloaisp asc ";
  $row_lietke =mysqli_query($conn,$sql_lietke);
?>
<div class ="button_them">
  <a href ="index.php?quanly=loaisp&ac=them">Thêm mới</a>
</div>
<table width="100%" border="1">
  <tr>
    <td>Id loại sản phẩm</td>
    <td>Tên loại sản phẩm</td>
    <td>Thương hiệu</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  // $i=1;
  while($dong=mysqli_fetch_array($row_lietke)){
  ?>
  <tr>
    <td><?php echo $dong['idloaisp'];?></td>
    <td><?php echo $dong['tenloaisp'] ?></td>
    <td><?php echo $dong['tenthuonghieu'] ?></td>
    <td>
      <a href="index.php?quanly=loaisp&ac=sua&id=<?php echo $dong['idloaisp'] ?>">
        <center><img src="../Images/edit.png" width="30" height="30" /></center>
      </a>
    </td>
    <td>
      <a href="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['idloaisp'] ?>">
        <center><img src="../Images/delete.png" width="30" height="30" /></center>
      </a>
    </td>
  </tr>
  <?php
  // $i++;
  }
  ?>
</table>
