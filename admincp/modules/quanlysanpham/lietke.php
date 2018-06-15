<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang =='' || $trang =='1'){
		$trang1=0;
	}else{
		$trang1=($trang*10)-10;
	}
	$sql_lietkesp="select * from sanpham,thuonghieu,loaisp where thuonghieu.idthuonghieu=sanpham.idthuonghieu and sanpham.idloaisp=loaisp.idloaisp order by sanpham.idsp desc limit $trang1,10";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);
?>
<div class="button_them">
  <a href="index.php?quanly=sanpham&ac=them">Thêm mới</a> 
</div>
<table border="1">
  <tr>
    <td>Id</td>
    <td>Tên sản phẩm</td>
    <td>Mã sản phẩm</td>
    <td width="200px">Hình ảnh</td>
    <td>Thương hiệu</td>
    <td>Đơn giá</td>
    <td>Loại sản phẩm</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  //$i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>  	
    <td><?php  echo $dong['idsp'];?></td>
    <td><?php echo $dong['tensp'] ?></td>
    <td><?php echo $dong['masp'] ?></td>
    <td>
      <img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="100" />
      <a href="index.php?quanly=gallery&ac=lietke&id=<?php echo $dong['idsp'] ?>" style="text-align:center;text-decoration:none; font-size:18px;color:#06F;">Gallery</a>
    </td>
    <td><?php echo $dong['tenthuonghieu'] ?></td>
    <td><?php echo number_format($dong['dongia'])?></td> 
    <td><?php echo $dong['tenloaisp'] ?></td>  
    <td>
      <a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['idsp'] ?>">
        <center><img src="../Images/edit.png" width="30" height="30" /></center>
      </a>
    </td>
    <td>
      <a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['idsp'] ?>">
        <center><img src="../Images/delete.png" width="30" height="30"   /></center>
      </a>
    </td>
  </tr>
  <?php
  //$i++;
  }
  ?>
</table>
<div class="trang">
	Trang :
  <?php
	$sql_trang=mysqli_query($conn,"select * from sanpham");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/10);
	for($b=1;$b<=$a;$b++){
		if($trang==$b){
      echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';       
    }else{
		  echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
	   }
	}
	?>
</div>
