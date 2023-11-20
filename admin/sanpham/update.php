<?php

if (is_array($sanpham)) {
  extract($sanpham);
  $namesp =$name; 
}

$hinhpath = "../upload/$img";
if (is_file($hinhpath)) {
  $hinh = '<img src="' . $hinhpath . '" alt="ảnh" height= "150" ';
} else {
  $hinh = "Không có hình";
}

?>
<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 form_content_container">
      <select name="iddm">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            // extract($danhmuc);
                            if($iddm = $danhmuc['id']) {
                              $s="selected";
                            }else{
                              $S = "";
                            }
                            echo '<option value="'.$danhmuc['id'].'" '.$s.'>' . $danhmuc['name'] . '</option>';
                            
                        }

                        ?>
                    </select>
      </div>
      <div class="row2 mb10">
        <label>Tên sản phẩm </label> <br>
        <input type="text" name="tensp" placeholder="nhập vào tên" value="<?= $namesp ?>">
      </div>
      <div class="row2 mb10">
        <label>Giá </label> <br>
        <input type="text" name="giasp" placeholder="nhập vào giá" value="<?= $price ?>">
      </div>
      <div class="row2 mb10">
        <label>Hình </label> <br>
        <div style="display: flex;
                    align-items: left;">
          <input type="file" name="hinh">
          <?= $hinh ?>
        </div>
      </div>
      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        <textarea name="mota" cols="50" rows="10"><?= $mota ?></textarea>
      </div>
      <div class="row mb10 ">
        <input type="hidden" value="<?=$id?>" name="id">
        <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
      <?php
      if (isset($thongbao) && ($thongbao != '')) echo $thongbao;
      ?>
    </form>
  </div>
</div>