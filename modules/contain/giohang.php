<?php
@session_start();
if (isset($_SESSION['product'])) {
    ?>
    <div class="main_page">
        <h2 class="centerBoxHeading">Giỏ hàng của bạn</h2>
        <div id="continue_shopping">
            <a href="?quanly=sp">Tiếp tục tìm sản phẩm</a>
        </div>
        <div class="clear"></div>
        <table width="100%" border="1" style="border-collapse:collapse; margin:20px 0; text-align:center;">		
            <tr>
                <td>Mã sp</td>
                <td>Tên sp</td>
                <td width="170px;">Hình ảnh</td>
                <td>Size</td>
                <td>Giá sp</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td>Quản lý</td>
            </tr>
            <?php
            $thanhtien = 0;
            foreach ($_SESSION['product'] as $cart_item) {
                $id = $cart_item['id'];
                $size = $cart_item['size'];
                $sql = "select * from sanpham INNER JOIN size_soluong on sanpham.idsp=size_soluong.idsp WHERE sanpham.idsp='$id' and size_soluong.size='$size'";
                $row = mysqli_query($conn, $sql);
                $dong = mysqli_fetch_array($row);
                ?>
                <tr>
                    <td><?php echo $dong['masp'] ?></td>
                    <td><?php echo $dong['tensp'] ?></td>
                    <td>
                        <img style="width: 150px; height: 100px; margin: 10px;" src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>"/>
                    </td>
                    <td><?php echo $dong['size'] ?></td>
                    <td><?php echo number_format($dong['dongia']) ?></td>		
                    <td>
                        <a href="update_cart.php?cong&id=<?php echo $cart_item['id'] ?>&size=<?php echo $dong['size'] ?>" style="margin-right:7px; text-decoration: none;">
                            <img src="Images/plus.png" width="15" height="15">
                        </a>
                        <?php echo $cart_item['soluong'] ?>
                        <a href="update_cart.php?tru&id=<?php echo $cart_item['id'] ?>&size=<?php echo $dong['size'] ?>" style="margin-left:7px;  text-decoration: none;">
                            <img src="Images/subtract.png" width="15" height="15">
                        </a>									
                    </td>
                    <?php
                    $tongtien = 0;
                    $tongtien = $cart_item['soluong'] * $cart_item['dongia'];
                    $thanhtien = ($thanhtien + $tongtien);
                    ?>			
                    <td><?php echo number_format($tongtien) ?></td>
                    <td>
                        <a href="update_cart.php?xoa&id=<?php echo $cart_item['id'] ?>&size=<?php echo $dong['size'] ?>">
                            <img src="Images/delete.png" width="30" height="30">
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>				
                <td colspan="6" height="30px">Tổng tiền</td>
                <td><?php echo number_format($thanhtien) . ' VNĐ' ?></td>			
            </tr>
        </table>
        <div class="thanh_toan">
            <a href="?quanly=thongtingiaohang">THANH TOÁN</a>
        </div>
        <div class="clear"></div>			
    </div>
    <?php
} else {
    ?>
    <div class="main_page">
        <div style="margin: 50px;float: left;">
            <strong><span style="font-size: 30px">GIỎ HÀNG CỦA BẠN TRỐNG</span></strong>
        </div>
        <div class="clear"></div>
        <div style="margin: 50px;float: left;background: #000;width: 300px;height: 40px;text-align: center;">
            <strong>
                <a href="?quanly=sp" style="text-decoration: none;color: #fff;font-size: 20px;line-height: 40px">
                    TIẾP TỤC TÌM SẢN PHẨM >></a>
            </strong>
        </div>
    </div>
    <?php
}
?>
