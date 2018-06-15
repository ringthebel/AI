<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang =='' || $trang =='1'){
		$trang1=0;
	}else{
		$trang1=($trang*20)-20;
	}
	$sql_lietkesp="select * from sanpham,size_soluong where sanpham.idsp=size_soluong.idsp order by sanpham.idsp asc limit $trang1,20";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);
?>
<div class="button_them">
  <a href="index.php?quanly=size_soluong&ac=them">Thêm mới</a> 
</div>
<table border="1">
  <tr>
    <td>Id sản phẩm</td>
    <td>Tên sản phẩm</td>   
    <td>Size</td>
    <td>Số lượng</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  //$i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>  	
    <td><?php  echo $dong['idsp'];?></td>
    <td><?php  echo $dong['tensp'];?></td>
    <td><?php echo $dong['size'] ?></td>
    <td><?php echo $dong['soluong'] ?></td>
    <td>
      <a href="index.php?quanly=size_soluong&ac=sua&id=<?php echo $dong['idsp'] ?>&size=<?php echo $dong['size'] ?>" >
        <center><img src="../Images/edit.png" width="30" height="30" /></center>
      </a>
    </td>
    <td>
      <a href="modules/quanlysize_soluong/xuly.php?id=<?php echo $dong['idsp'] ?>&size=<?php echo $dong['size'] ?>">
        <center><img src="../Images/delete.png" width="30" height="30"/></center>
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
	$sql_trang=mysqli_query($conn,"select * from size_soluong");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/20);
	for($b=1;$b<=$a;$b++){
		if($trang==$b){
      echo '<a href="index.php?quanly=size_soluong&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';       
    }else{
		  echo '<a href="index.php?quanly=size_soluong&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
	   }
	}
	?>
</div>
