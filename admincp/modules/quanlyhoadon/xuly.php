<?php
	include('../config.php');
	$idghichu=$_POST['idghichu'];
	if(isset($_POST['sua'])){
		//sua
		$sql_sua = "update hoadon set idghichu='$idghichu' where idhoadon='$_GET[id]'";
		echo $sql_sua;
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=hoadon&ac=lietke');
	}else{
		//xoa
		$sql_xoa = "delete from lienhe where idlienhe = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=phanhoi&ac=lietke');	
	}
?>
