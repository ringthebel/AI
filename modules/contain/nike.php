<?php
$sql_loaiN = "select * from loaisp where idthuonghieu='1' order by tenloaisp asc";
$row_loaiN = mysqli_query($conn, $sql_loaiN);
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Nike</h2>
    <ul class="show">
        <?php while ($dong_loaiN = mysqli_fetch_array($row_loaiN)) { ?>
            <li>
                <a href="index.php?quanly=loaisp&id=<?php echo $dong_loaiN['idloaisp'] ?>"><?php echo $dong_loaiN['tenloaisp'] ?></a>
            </li>
        <?php } ?>
    </ul>
</div>
