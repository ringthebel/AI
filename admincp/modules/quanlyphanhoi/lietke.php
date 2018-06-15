<?php
	$sql="select * from lienhe order by lienhe.ngaygui asc";
	$row=mysqli_query($conn,$sql);
?>
<table border="1">
  <tr>
    <td>Tên khách hàng</td>
    <td>Email</td>
    <td>Lời nhắn</td>
    <td>Ngày gửi</td>   
    <td>Quản lý</td>
  </tr>
  <?php
  // $i=1;
  while($dong=mysqli_fetch_array($row)){
  ?>
  <tr>
    <td><?php echo $dong['ten'] ?></td>
    <td><?php echo $dong['email'] ?></td>
    <td><?php  echo $dong['loinhan'] ?></td>
    <td><?php  echo $dong['ngaygui'] ?></td>
    <td>
      <a class="delete_link" href="modules/quanlyphanhoi/xuly.php?id=<?php echo $dong['idlienhe']?>">
        <center><img src="../Images/delete.png" width="30" height="30" /></center>
      </a>
    </td>
  </tr>
  <?php
  // $i++;
  }
  ?>
</table>
