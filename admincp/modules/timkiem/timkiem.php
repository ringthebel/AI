<?php
	if(isset($_POST['timkiem'])){
	$search=$_POST['masp'];
	echo 'Mã tìm kiếm :<strong>'.' '.$search.'</strong><br/>';
	$sql_timkiem="select * from sanpham,thuonghieu,loaisp,size_soluong where thuonghieu.idthuonghieu=sanpham.idthuonghieu and sanpham.idloaisp=loaisp.idloaisp and sanpham.idsp=size_soluong.idsp and masp='".$search."'";
	$row_timkiem=mysqli_query($conn,$sql_timkiem);
	$count=mysqli_num_rows($row_timkiem);
	  if($count>0){
?>
      <h3>Kết quả tìm kiếm</h3>
      <table border="1">
        <tr>
          <td>ID</td>
          <td>Tên sản phẩm</td>
          <td>Mã sp</td>
          <td>Hình ảnh</td>
          <td>Thương hiệu</td>
          <td>Size</td>
          <td>Số lượng</td>
          <td>Đơn giá</td>      
          <td colspan="2">Quản lý</td>
        </tr>
        <?php
        $i=1;
        while($dong=mysqli_fetch_array($row_timkiem)){
        ?>
          <tr>
            <td><?php  echo $i;?></td>
            <td><?php echo $dong['tensp'] ?></td>
            <td><?php echo $dong['masp'] ?></td>
            <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="100" /></td>
            <td><?php echo $dong['tenthuonghieu'] ?></td>
            <td><?php echo $dong['size'] ?></td>
            <td><?php echo $dong['soluong'] ?></td>
            <td><?php echo $dong['dongia'] ?></td>  
            <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['idsp'] ?>"><center><img src="../Images/edit.png" width="30" height="30" /></center></a></td>
            <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['idsp']?>"><center><img src="../Images/delete.png" width="30" height="30" /></center></a></td>
          </tr>
      <?php
      $i++;
      }
  	}else{
  	  echo 'Không tìm thấy kết quả';
    }
  }
      ?>
</table>
