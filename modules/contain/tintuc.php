<?php
$sql_tin = "select * from tintuc";
$row_tin = mysqli_query($conn, $sql_tin);
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Tin tức</h2>
    <ul id="tintuc">
        <?php
        while ($dong_tin = mysqli_fetch_array($row_tin)) {
            ?>
            <li>
                <a href="?quanly=chitiettintuc&id=<?php echo $dong_tin['idtintuc'] ?>">
                    <?php echo $dong_tin['tentintuc'] ?>
                </a>	        
            </li>
            <?php
        }
        ?>
    </ul>
</div>