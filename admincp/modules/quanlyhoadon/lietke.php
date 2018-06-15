<?php
	$sql_lietkesp="select * from hoadon,hoadonchitiet,sanpham where hoadon.idhoadon=hoadonchitiet.idhoadon and hoadonchitiet.idsp=sanpham.idsp order by hoadon.idhoadon";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);
?>
<table border="1">
  <tr>
    <td>Tên</td>
    <td>Sdt</td>
    <td>Email</td>
    <td>Địa chỉ</td>
    <td>Tên sp</td>
    <td>Size</td>
    <td>Số lượng</td>
    <td>Đơn giá</td>
    <td>Ngày mua</td>
    <td>Ghi chú</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  while($dong=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>  	
    <td><?php echo $dong['tenkhachhang'];?></td>
    <td><?php echo $dong['dienthoai'] ?></td>
    <td><?php echo $dong['email'] ?></td>
    <td><?php echo $dong['diachi_nho'].'-'.$dong['diachi_tb'].'-'.$dong['diachi_rong'] ?></td>
    <td><?php echo $dong['tensp'] ?></td>
    <td><?php echo $dong['size'] ?></td>
    <td><?php echo $dong['soluong'] ?></td>
    <td><?php echo $dong['dongia'] ?></td>
    <td><?php echo $dong['ngaymua'] ?></td>    
    <td>
      <span style="color: #33cc33">
      <?php
        if ($dong['idghichu'] == "0") {
          echo "Chưa giao hàng";
        }else{
          echo "Đã giao hàng";
        }        
      ?>
      </span>       
    </td>  
    <td>
      <a href="index.php?quanly=hoadon&ac=sua&id=<?php echo $dong['idhoadon'] ?>">
        <center><img src="../Images/edit.png" width="30" height="30" /></center>
      </a>
    </td>
    <td>
      <a href="modules/quanlyhoadon/xuly.php?id=<?php echo $dong['idsp'] ?>">
        <center><img src="../Images/delete.png" width="30" height="30"   /></center>
      </a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
