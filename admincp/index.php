<!DOCTYPE html>
<html>
    <head lang="vi">
        <meta charset="utf-8"/>  
        <link rel="stylesheet" type="text/css" href="style/admincp.css" />	
        <title>Trang quản lý website</title>
    </head>
    <?php
    session_start();
    if (!isset($_SESSION['dangnhap'])) {
        header('location:login.php');
    }
    ?>
    <body>	
        <?php
        include('modules/config.php');
        include('modules/header.php');
        ?>
        <div class="wrapper">
            <?php
            include('modules/menu.php');
            include('modules/content.php');
            include('modules/footer.php');
            ?>  
        </div>
    </body>
</html>