<?php
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
} else {
    $trang = '';
}
if ($trang == '' || $trang == '1') {
    $trang1 = 0;
} else {
    $trang1 = ($trang * 16) - 16;
}
$sql_sp = "select * from sanpham order by idsp desc limit $trang1,16";
$row_sp = mysqli_query($conn, $sql_sp);
?>
<div class="main_page">
    <img src="Images/banner.jpg">
    <h2 class="centerBoxHeading">Sản phẩm</h2>
    <ul style="list-style-type: none;">
        <?php
        while ($dong_sp = mysqli_fetch_array($row_sp)) {
            ?>
            <li>
                <div id="sanpham">			
                    <div id="anhsp">
                        <a href="?quanly=chitietsp&id=<?php echo $dong_sp['idsp'] ?>">
                            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_sp['hinhanh'] ?>" width="100%" height="100%" />
                    </div>
                    <div id="tensp">
                        <a href="?quanly=chitietsp&id=<?php echo $dong_sp['idsp'] ?>"><?php echo $dong_sp['tensp'] ?></a>
                    </div>
                    <div id="price">
                        <span style="color: red;"><?php echo number_format($dong_sp['dongia']) . ' ' . 'VNĐ' ?></span>
                    </div>		        
                </div>		    	
                <?php
            }
            ?>			    					    		
        </li>
    </ul>
    <div class="clear"></div>
    <?php
    $sql_trang = mysqli_query($conn, "select * from sanpham");
    $count_trang = mysqli_num_rows($sql_trang);
    $so_trang = ceil($count_trang / 16);
    ?>
    <div id="trang">
        <?php
        if (isset($_GET['trang'])) {
            if ($_GET['trang'] > 1) {
                ?>		
                <a href="index.php?quanly=sanpham&ac=lietke&trang=<?php echo ($_GET['trang'] - 1) ?>" style="border: 1px solid #AAA;background: #EEE;padding: 0px 6px;display: inline-block;color: #666;">
                    [<< Prev]			  			
                </a>
                <?php
            }
        }
        for ($b = 1; $b <= $so_trang; $b++) {
            if ($trang == $b) {
                ?>
                <a href="index.php?quanly=sanpham&ac=lietke&trang=<?php echo $b ?>" style="font-weight: bold;">
                    <?php echo $b ?>		
                </a>
                <?php
            } else {
                ?>
                <a href="index.php?quanly=sanpham&ac=lietke&trang=<?php echo $b ?>" style="border: 1px solid #AAA;background: #EEE;padding: 0px 6px;display: inline-block;color: #666;">
                    <?php echo $b ?>			  			
                </a>	
                <?php
            }
        }
        if (isset($_GET['trang'])) {
            if (($_GET['trang'] + 1) > $so_trang) {
                
            } else {
                ?>
                <a href="index.php?quanly=sanpham&ac=lietke&trang=<?php echo ($_GET['trang'] + 1) ?>" style="border: 1px solid #AAA;background: #EEE;padding: 0px 6px;display: inline-block;color: #666;">
                    [Next >>]			  			
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>
