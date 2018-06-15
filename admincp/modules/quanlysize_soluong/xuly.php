<?php
	include('../config.php');
	$idsp=$_POST['idsp'];
	$size=$_POST['size'];
	$soluong=$_POST['soluong'];	
	$trang=$_GET['trang'];	
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into size_soluong (idsp,size,soluong) value ('$idsp','$size','$soluong')");
		mysqli_query($conn,$sql_them);
		header('location:../../index.php?quanly=size_soluong&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua ="update size_soluong set size='$size',soluong='$soluong' where idsp='$_GET[id]' and size='$_GET[size]'";	
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=size_soluong&ac=lietke');
	}else{
		//xoa
		$sql_xoa = "delete from size_soluong where idsp='$_GET[id]' and size='$_GET[size]'";		
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=size_soluong&ac=lietke');
	}
?>
