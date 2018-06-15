<?php
	include('../config.php');	
	//xoa
	$sql_xoa1 = "delete from hoadon where idhoadon = $_GET[id]";
	$sql_xoa2 = "delete from hoadonchitiet where idhoadon = $_GET[id]";
	mysqli_query($conn,$sql_xoa1);
	mysqli_query($conn,$sql_xoa2);
	header('location:../../index.php?quanly=phanhoi&ac=lietke');
?>
