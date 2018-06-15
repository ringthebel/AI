<?php
	include('../config.php');
	$tentintuc=$_POST['tentintuc'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);	
	$noidung=$_POST['noidung'];	
	
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into tintuc (tentintuc,hinhanh,noidung) value('$tentintuc','$hinhanh','$noidung')");
		mysqli_query($conn,$sql_them);
		header('location:../../index.php?quanly=tintuc&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		if($hinhanh!=''){
	  	$sql_sua = "update tintuc set tentintuc='$tentintuc',hinhanh='$hinhanh',noidung='$noidung' where idtintuc='$_GET[id]'";
		}else{
			  $sql_sua = "update tintuc set tentintuc='$tentintuc',noidung='$noidung' where idtintuc='$_GET[id]'";
		}
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=tintuc&ac=lietke');
	}else{
		//xoa
		$sql_xoa = "delete from tintuc where idtintuc = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=tintuc&ac=lietke');
	}
?>
