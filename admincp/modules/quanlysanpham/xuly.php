<?php
	include('../config.php');
	$tensp=$_POST['tensp'];
	$masp=$_POST['masp'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	$idthuonghieu=$_POST['idthuonghieu'];
	$dongia=$_POST['dongia'];
	$idloaisp=$_POST['idloaisp'];	
	$noidung=$_POST['noidung'];	
	$trang=$_GET['trang'];	
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into sanpham (tensp,masp,hinhanh,idthuonghieu,dongia,idloaisp,noidung) value('$tensp','$masp','$hinhanh','$idthuonghieu','$dongia','$idloaisp','$noidung')");
		mysqli_query($conn,$sql_them);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		if($hinhanh!=''){
	  	$sql_sua = "update sanpham set tensp='$tensp',masp='$masp',hinhanh='$hinhanh',idthuonghieu='$idthuonghieu',dongia='$dongia',idloaisp='$idloaisp',noidung='$noidung' where idsp='$_GET[id]'";
		}else{
			$sql_sua = "update sanpham set tensp='$tensp',masp='$masp',idthuonghieu='$idthuonghieu',dongia='$dongia',idloaisp='$idloaisp',noidung='$noidung' where idsp='$_GET[id]'";
		}
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}else{
		//xoa
		$sql_xoa = "delete from sanpham where idsp = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}
?>
