<?php
$sql_loaiA = "select * from loaisp where idthuonghieu='0' order by tenloaisp asc";
$row_loaiA = mysqli_query($conn, $sql_loaiA);
$sql_loaiN = "select * from loaisp where idthuonghieu='1' order by tenloaisp asc";
$row_loaiN = mysqli_query($conn, $sql_loaiN);
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Adidas</h2>   
    <ul class="show">
        <?php while ($dong_loaiA = mysqli_fetch_array($row_loaiA)) { ?>
            <li>
                <a href="index.php?quanly=loaisp&id=<?php echo $dong_loaiA['idloaisp'] ?>"><?php echo $dong_loaiA['tenloaisp'] ?></a>
            </li>
        <?php } ?>
    </ul>
</div>
