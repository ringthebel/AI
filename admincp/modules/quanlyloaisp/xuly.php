<?php
	include('../config.php');
	$tenloaisp=$_POST['tenloaisp'];
	$idthuonghieu=$_POST['idthuonghieu'];
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into loaisp (tenloaisp,idthuonghieu) value ('$tenloaisp','$idthuonghieu')");
		mysqli_query($conn,$sql_them);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua = "update loaisp set tenloaisp='$tenloaisp',idthuonghieu='$idthuonghieu' where idloaisp='$_GET[id]'";
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}else{
		//xoa
		$sql_xoa = "delete from loaisp where idloaisp='$_GET[id]'";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}
?>
