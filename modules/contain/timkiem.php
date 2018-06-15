<?php
if (isset($_POST['timkiem'])) {
    $search = $_POST['keyword'];
    $sql_timkiem = "select * from sanpham where tensp like '%" . $search . "%' and dongia > 1000000";
    $row_timkiem = mysqli_query($conn, $sql_timkiem);
    $count = mysqli_num_rows($row_timkiem);
    ?>
    <div class="main_page">
        <h2 class="centerBoxHeading">Tìm kiếm</h2>
        <?php
        if ($count > 0) {
            ?>
            <div>
                <h3 style="margin: 13px;">
                    Tìm thấy <?php echo "$count" ?> sản phẩm với từ khóa : "<span style="color: #ff0000"><?php echo $search ?></span>"
                </h3>
            </div>
            <?php
            while ($dong_sp = mysqli_fetch_array($row_timkiem)) {
                ?>
                <ul style="list-style-type: none;">    
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
                    </li>
                </ul>
                <?php
            }
        } else {
            ?>
            <div>
                <h3 style="margin: 13px;">
                    Không tìm thấy sản phẩm với từ khóa : "<span style="color: #ff0000"><?php echo $search ?></span>"
                </h3>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>

