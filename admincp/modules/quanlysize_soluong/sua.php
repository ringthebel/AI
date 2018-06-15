<?php
	$sql = "select * from sanpham inner join size_soluong on sanpham.idsp=size_soluong.idsp where size_soluong.idsp='$_GET[id]' and size_soluong.size='$_GET[size]'";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
?>
<div class="button_them">
  <a href="index.php?quanly=size_soluong&ac=lietke">Liệt kê size và số lượng</a> 
</div>
<form action="modules/quanlysize_soluong/xuly.php?id=<?php echo $dong['idsp'] ?>&size=<?php echo $dong['size'] ?>" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Sửa size và số lượng</td>
    </tr>
    <tr>
      <td>Sản phẩm</td>
      <td><?php echo $dong['idsp'].' - '. $dong['tensp'] ?></td>
    </tr>
    <tr>
      <td>Size</td>
      <td><select name="size">
        <option selected="selected" value="<?php echo $dong['size'] ?>"><?php echo $dong['size'] ?></option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
      </select></td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text" name="soluong" value="<?php echo $dong['soluong'] ?>" required="required"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input class="submit" type="submit" name="sua" value="Sửa">
      </div></td>
    </tr>
  </table>
</form>


