<?php
	$sql_lietkesp="select * from tintuc order by tintuc.idtintuc asc";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);
?>
<div class="button_them">
  <a href="index.php?quanly=tintuc&ac=them">Thêm mới</a> 
</div>
<table border="1">
  <tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Hình ảnh</td>
    <td>Nội dung</td>   
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  // $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>
    <td><?php  echo $dong['idtintuc'] ?></td>
    <td><?php echo $dong['tentintuc'] ?></td>
    <td><img src="modules/quanlytintuc/uploads/<?php echo $dong['hinhanh'] ?>" width="100" height="140" /></td>
    <td><?php  echo $dong['noidung'] ?></td>
    <td>
      <a href="index.php?quanly=tintuc&ac=sua&id=<?php echo $dong['idtintuc'] ?>">
        <center><img src="../Images/edit.png" width="30" height="30" /></center>
      </a>
    </td>
    <td>
      <a class="delete_link" href="modules/quanlytintuc/xuly.php?id=<?php echo $dong['idtintuc']?>">
        <center><img src="../Images/delete.png" width="30" height="30" /></center>
      </a>
    </td>
  </tr>
  <?php
  // $i++;
  }
  ?>
</table>
