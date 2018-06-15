<?php
@session_start();
if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    unset($_SESSION['product']);
    header('location:index.php');
}
$sql_loaiA = "select * from loaisp where idthuonghieu='0' order by tenloaisp asc";
$row_loaiA = mysqli_query($conn, $sql_loaiA);
$sql_loaiN = "select * from loaisp where idthuonghieu='1' order by tenloaisp asc";
$row_loaiN = mysqli_query($conn, $sql_loaiN);
?>
<header>
    <div class="wrapper"> 
        <div id="logo">
            <a href="index.php">
                <img src="Images/logo.jpg" width="125px" title="sneakers paris">
            </a>
        </div>     
        <div id="mySearch">
            <form action="index.php?quanly=timkiem" method="post" enctype="multipart/form-data">
                <div id="searchBox">                       
                    <input type="text" name="keyword" size="6" maxlength="30" id="hsearchinput" placeholder="Nhập tên sản phẩm cần tìm" required="required">
                    <input type="submit" value="" name="timkiem" style="border-style: none; background: url('Images/if_search_322497.png') no-repeat; width: 24px; height: 24px; cursor: pointer">                     
                </div>
            </form>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
            ?>
            <div style="margin-top: 14px; float: right;">
                <form action="" method="post" enctype="multipart/form-data">                
                    <input type="submit" name="logout" value="Đăng xuất" style="background: #000;color: #fff;border: 0px;cursor: pointer;"/>
                </form>
                </a>
            </div>        
            <div style="margin: 15px;width: 200px; float: right;">
                <strong><span style="color: #fff;">Xin chào, <?php echo $_SESSION['username'] ?></span></strong>
            </div>       
            <?php
        } else {
            ?>
            <div id="account">
                <ul>
                    <li><a href="?quanly=dangnhap">Đăng nhập</a></li>
                    <li><a href="?quanly=dangkymoi">Đăng ký</a></li>                
                </ul>
            </div>
            <?php
        }
        ?>
    </div>
</header>
<nav>
    <div class="wrapper">
        <ul>
            <li>
                <a href="index.php">
                    <img src="Images/Home-01.png" alt="Trang chủ" title="Trang chủ" class="icon">Trang chủ
                </a>
            </li>
            <li class="separation"></li>
            <li class="dropdown">
                <a href="?quanly=nike">
                    <img src="Images/NIKE-Full-01.png" alt="Nike" title="Nike" class="icon">Nike
                </a>
                <ul class="sub_menu">
                    <?php while ($dong_loaiN = mysqli_fetch_array($row_loaiN)) {
                        ?>
                        <li>
                            <a id="loaigiay" href="index.php?quanly=loaisp&id=<?php echo $dong_loaiN['idloaisp'] ?>"><?php echo $dong_loaiN['tenloaisp'] ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>           
            <li class="dropdown">
                <a href="?quanly=adidas">
                    <img src="Images/Adidas-01.png" alt="Adidas" title="Adidas" class="icon">Adidas
                </a>
                <ul class="sub_menu">
                    <?php while ($dong_loaiA = mysqli_fetch_array($row_loaiA)) { ?>
                        <li>
                            <a id="loaigiay" href="index.php?quanly=loaisp&id=<?php echo $dong_loaiA['idloaisp'] ?>"><?php echo $dong_loaiA['tenloaisp'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li>
                <a href="?quanly=tintuc">
                    <img src="Images/Newspaper-outlined-01.png" alt="Tin tức" title="Tin tức" class="icon">Tin Tức
                </a>
            </li>
            <li>
                <a href="?quanly=lienhe">
                    <img src="Images/Contact-mail-01.png" alt="Liên hệ" title="Liên hệ" class="icon">Liên hệ
                </a>
            </li>
            <li>
                <a href="?quanly=giohang">
                    <img src="Images/Shopping-cart-01.png" alt="Giỏ hàng" title="Giỏ hàng" class="icon">Giỏ hàng
                </a>
            </li>
        </ul>
    </div>
</nav>