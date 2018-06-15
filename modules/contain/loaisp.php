<?php
$sql_loaisp = "select * from sanpham where sanpham.idloaisp='$_GET[id]'";
$row_loaisp = mysqli_query($conn, $sql_loaisp);
$count = mysqli_num_rows($row_loaisp);

$sql_tenloaisp = "select tenloaisp from loaisp where idloaisp='$_GET[id]'";
$row = mysqli_query($conn, $sql_tenloaisp);
$dong = mysqli_fetch_array($row);
?>
<div class="main_page">
    <h2 class="centerBoxHeading"><?php echo $dong['tenloaisp'] ?></h2>
    <ul style="list-style-type: none;">
        <?php
        while ($dong_loaisp = mysqli_fetch_array($row_loaisp)) {
            ?>
            <li>
                <div id="sanpham">
                    <div id="anhsp">
                        <a href="?quanly=chitietsp&id=<?php echo $dong_loaisp['idsp'] ?>">
                            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_loaisp['hinhanh'] ?>" width="100%" height="100%" />
                    </div>
                    <div id="tensp">
                        <a href="?quanly=chitietsp&id=<?php echo $dong_loaisp['idsp'] ?>"><?php echo $dong_loaisp['tensp'] ?></a>
                    </div>
                    <div id="price">
                        <span style="color: red;"><?php echo number_format($dong_loaisp['dongia']) . ' ' . 'VNĐ' ?></span>
                    </div>		    	
                    <?php
                }
                ?>			    					    
            </div>
        </li>
    </ul>                          
</div>