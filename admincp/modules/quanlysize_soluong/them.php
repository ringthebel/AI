<div class="button_them">
  <a href="index.php?quanly=size_soluong&ac=lietke">Liệt kê size và số lượng</a> 
</div>
<form action="modules/quanlysize_soluong/xuly.php" method="post" enctype="multipart/form-data">
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Thêm size và số lượng</td>
    </tr>
    <tr>
    <?php
    $sql = "select * from sanpham";
    $row = mysqli_query($conn,$sql);
    ?>
      <td>Sản phẩm</td>
      <td><select name="idsp">
      <?php
      while($dong=mysqli_fetch_array($row)){        
      ?>
        <option><?php echo $dong['idsp']. ' - ' .$dong['tensp']; ?></option>
      <?php
      }
      ?>
      </select></td>
    </tr>

    <tr>
      <td>Size</td>
      <td>
      <select name="size">
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
      </select>
    </td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text" name="soluong" required="required"></td>
    </tr>
      <td colspan="2">        
        <input class="submit" type="submit" name="them" value="Thêm">        
      </td>
    </tr>
  </table>
</form>


