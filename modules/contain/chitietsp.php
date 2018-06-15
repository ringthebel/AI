 <?php
$sql = "select * from sanpham where idsp='$_GET[id]'";
$sp = mysqli_query($conn, $sql);
$dong = mysqli_fetch_array($sp);
echo $_GET[id];
$sql_size = mysqli_query($conn, "select size from size_soluong where idsp='$_GET[id]'");
$num_count = mysqli_num_rows($sql_size);
?>
<div class="main_page">
    <h2 class="centerBoxHeading">Chi tiết sản phẩm</h2> 
    <div id="box_hinhanh">
        <div style="margin-top: 20px">
            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="420" height="280"/>
        </div>
        <?php
        $sql_gallery = mysqli_query($conn, "select * from gallery where id_sp='$_GET[id]' limit 3");
        $row_gallery = mysqli_num_rows($sql_gallery);
        ?>
        <ul id="hinhanhdikem">
            <?php
            if ($row_gallery > 0) {
                while ($dong_gallery = mysqli_fetch_array($sql_gallery)) {
                    ?>
                    <li><img src="admincp/modules/gallery/uploads/<?php echo $dong_gallery['hinhanhsp'] ?>" width="150" height="100" /></li>
                    <?php
                }
            } else {
                echo '<li><img src="admincp/modules/quanlysanpham/uploads/' . $dong['hinhanh'] . '" width="150" height="100" /></li>';
            }
            ?>
        </ul>
    </div>
    <div id="box_info">
        <form action="update_cart.php" method="post" enctype="multipart/form-data">
            <table width="100%">
                <tr><input type="hidden" name="id" value="<?php echo $dong['idsp'] ?>"></tr>
                <tr>
                    <td>Tên sản phẩm:</td>
                    <td width="340px;"><strong><span style="color: #4169E1"><?php echo $dong['tensp'] ?></span></strong></td>
                </tr>
                <tr>
                    <td>Mã sản phẩm:</td>
                    <td><strong><span style="color: #4169E1"><?php echo $dong['masp'] ?></span></strong></td>
                </tr>
                <tr>
                    <td>Giá bán:</td>
                    <td>
                        <strong><span style="color: #4169E1"><?php echo number_format($dong['dongia']) . ' ' . 'VNĐ' ?></span></strong>
                    </td>
                </tr>
                <tr>
                    <td>Chọn size:</td>
                    <td>
                        <?php
                        while ($dong_size = mysqli_fetch_array($sql_size)) {
                            ?>
                            <ul style="list-style-type: none;">
                                <li class="radio" style="display: inline-table; float: left;">
                                    <input type="radio" id="<?php echo $dong_size['size'] ?>" checked name="size" value="<?php echo $dong_size['size'] ?>">
                                    <label for="<?php echo $dong_size['size'] ?>"><?php echo $dong_size['size'] ?></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tình trạng:</td>
                    <td>
                        <?php
                        if ($num_count == 0) {
                            ?>    
                            <strong><span style="color: #ff0000">Hết hàng</span></strong>
                            <?php
                        } else {
                            ?>
                            <strong><span style="color: #ff0000">Còn hàng</span></strong>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td><input type="text" name="soluong" size="3" value="1" required="required"/></p></td>
            </table>
            <?php
            if ($num_count != 0) {
                ?>
                <div class="submit" style="float: left;">
                    <input type="submit" name="add_to_cart" id="btn1" value="THÊM VÀO GIỎ HÀNG" style="background-color: #0286cd"/>
                </div>
                <?php
            } else {
                ?>
                <h2 style="color: #000;margin-top: 40px;">ĐANG VỀ HÀNG...</h2>       
                <?php
            }
            ?>
        </form>
    </div>
    <div class="clear"></div>
    <hr>
    <h3 style="color: #F0190C; text-align: center;">Mô tả</h3>                
    <?php
    $sql_thongtinsp = mysqli_query($conn, "select noidung from sanpham where idsp='$_GET[id]'");
    $dong_thongtinsp = mysqli_fetch_array($sql_thongtinsp);
    if ($dong_thongtinsp['noidung'] != null) {
        ?>
        <div class="mota">
            <?php echo $dong_thongtinsp['noidung'] ?>
        </div>
        <?php
    } else {
        ?>
        <div class="mota">
            Hiện chưa có thông tin chính thức
        </div>
        <?php
    }
    ?>
    <?php
    $sql1 = "SELECT dongia,idloaisp FROM sanpham ORDER BY idsp ASC";
    $sql2 = "SELECT dongia FROM sanpham ORDER BY dongia DESC limit 1";
    $maxgia = mysqli_query($conn, $sql2);
    $dongmaxgia = mysqli_fetch_array($maxgia);
    $sp = mysqli_query($conn, $sql1);
    $dauvao = array($dong['dongia'] / ($dongmaxgia['dongia']+100000) * 0.3, $dong['idloaisp'] * 0.7 / 7);
//    echo "<pre>";
//    print_r($dauvao);
//    echo "</pre>";

    $input = array(
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array()
    );
    $i = 0;
    while ($dong = mysqli_fetch_array($sp)) {
        $dongia = ($dong['dongia'] / ($dongmaxgia['dongia'] + 100000)) * 0.3;
        $loaisp = $dong['idloaisp'] * 0.7 / 7;
        $ptu = array($dongia, $loaisp);
        $input[$i] = array_merge($input[$i], $ptu);
        $i++;
    }
//    echo "<pre>";
//    print_r($input);
//    echo "</pre>";
    $tam_cum_bd = array($input[0][0], $input[0][1], 0, $input[1][0], $input[1][1], 0);

//        echo "<pre>";
//        print_r($tam_cum_bd);
//        echo "</pre>";
    function khoangcach($a, $b, $c, $d) {
        $kc = pow(($a - $b), 2) + pow(($c - $d), 2);
        return $kc;
    }

    function phancum($a, $b) {//$b se gan $input, $a se gan $tam_cum_bd
        $xcum1 = $a[0]; //0.108	
        $ycum1 = $a[1]; //1.4
        $xcum2 = $a[3]; //0.066
        $ycum2 = $a[4]; //11.9

        $tong1 = 1; //vì mỗi cụm luôn có tâm cụm
        $tong2 = 1;

        $cum1 = array(0.3, 0.7);
        $cum2 = array(0.2, 0.5);

        for ($i = 0; $i < 38; $i++) {
            $x = $b[$i][0];
            $y = $b[$i][1];
            $k = khoangcach($x, $xcum1, $y, $ycum1);
            $l = khoangcach($x, $xcum2, $y, $ycum2);
            if ($k > $l) {
                $ptu1 = array($x, $y);
                $cum1 = array_merge($cum1, $ptu1);
                $tong1 += 1;
            } else {
                $ptu2 = array($x, $y);
                $cum2 = array_merge($cum2, $ptu2);
                $tong2 += 1;
            }
        }
        for ($i = 2; $i < ($tong1 * 2); $i++) {//tu 217 den 226 la tinh lai tam cum 1
            if ($i % 2 == 1) {
                $xcum1 += $cum1[$i];
            } else {
                $ycum1 += $cum1[$i];
            }
        }

        $xTB1 = $xcum1 / $tong1;
        $yTB1 = $ycum1 / $tong1;

        for ($i = 2; $i < ($tong2 * 2); $i++) {//tu 228 den 237 la tinh lai tam cum 2
            if ($i % 2 == 1) {
                $xcum2 += $cum2[$i];
            } else {
                $ycum2 += $cum2[$i];
            }
        }

        $xTB2 = $xcum2 / $tong2;
        $yTB2 = $ycum2 / $tong2;

        return array($xTB1, $yTB1, $cum1, $xTB2, $yTB2, $cum2);
    }

    for ($i = 0; $i <40; $i++) {
        $tam_cum_bd = phancum($tam_cum_bd, $input);
        phancum($tam_cum_bd, $input);
    }

    for ($i = 0; $i < count($tam_cum_bd[2]); $i += 2) {
        if (($dauvao[0] == $tam_cum_bd[2][$i]) && ($dauvao[1] == $tam_cum_bd[2][$i + 1])) {
            for ($i = 0; $i < count($tam_cum_bd[2]); $i += 2) {
                $kc_sort1[$i / 2] = khoangcach($dauvao[0], $tam_cum_bd[2][$i], $dauvao[1], $tam_cum_bd[2][$i + 1]);
                //là biến lưu khoảng cách từ mỗi phần tử đến giá trị đầu vào
            }
        }
    }
//    var_dump($kc_sort1);

    for ($i = 0; $i < count($tam_cum_bd[5]); $i += 2) {
        if (($dauvao[0] == $tam_cum_bd[5][$i]) && ($dauvao[1] == $tam_cum_bd[5][$i + 1])) {
            for ($i = 0; $i < count($tam_cum_bd[5]); $i += 2) {
                $kc_sort1[$i / 2] = khoangcach($dauvao[0], $tam_cum_bd[5][$i], $dauvao[1], $tam_cum_bd[5][$i + 1]);
            }
        }
    }

    $mangthutu = array(); //mảng lưu thứ tự mỗi phần tử trong tâm cụm
    asort($kc_sort1); //sap xep
//    echo "<pre>";
//    print_r($kc_sort1);
//    echo "</pre>";
    $mang_goiy = array();
    for ($i = 1; $i < 5; $i++) {
        next($kc_sort1);
        $mang_goiy[$i] = key($kc_sort1);
    }
//    echo "<pre>";
//    print_r($mang_goiy);
//    echo "</pre>";
//    echo $mang_goiy[1];
    ?>
    <h2 class = "centerBoxHeading">Sản phẩm liên quan</h2>
    <ul style = "list-style-type: none;">
        <?php
        $i = 1;
        while ($i < 5) {
            $spgy = mysqli_query($conn, "select * from sanpham where idsp = '" . $mang_goiy[$i] . "'");
            while ($dong_goiy = mysqli_fetch_array($spgy)) {
                ?>
                <li>
                    <div id="sanpham" onclick="tangview()">                       
                        <div id="anhsp">
                            <a href="?quanly=chitietsp&id=<?php echo $dong_goiy['idsp'] ?>">
                                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_goiy['hinhanh'] ?>" width="100%" height="100%" />
                        </div>
                        <div id="tensp">
                            <a href="?quanly=chitietsp&id=<?php echo $dong_goiy['idsp'] ?>"><?php echo $dong_goiy['tensp'] ?></a>
                        </div>
                        <div id="price">
                            <span style="color: red;"><?php echo number_format($dong_goiy['dongia']) . ' ' . 'VNĐ' ?></span>
                        </div>		        
                    </div>	

                    <?php
                    $i++;
                }
                ?>			    					    		
            </li>
            <?php
        }
        ?>
    </ul>   
</div>