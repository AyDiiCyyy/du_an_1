<?php



?>
<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
    <form action="?act=suasp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 ">
        <label> Danh mục </label> <br>
        <select name="iddm" class="danhmuc" style="display: flex;
                                  align-items: left;">
          <option value="">Chọn danh mục</option>
          <?php

          foreach ($listdanhmuc as $danhmuc) {
            $selected = ($danhmuc['id_danhmuc'] == $sanpham['id_danhmuc']) ? "selected" : "";
            echo '<option ' . $selected . ' value="' . $danhmuc['id_danhmuc'] . '">' . $danhmuc['name'] . '</option>';
          }

          ?>

        </select>
        <span class="js_dm_er"></span>
      </div>

      <div class="row2 mb10">
        <label>Tên sản phẩm </label> <br>
        <input type="text" value="<?= $sanpham['name'] ?>" class="jstenloai" name="tensp" placeholder="nhập vào tên">
        <span class="jsten_er"></span>
      </div>
      <div class="row2 mb10">
        <label>Giá </label> <br>
        <input type="text" value="<?= $sanpham['price'] ?>" class="price" name="giasp" placeholder="nhập vào giá">
        <span class="js_price_er"></span>
      </div>
      <div class="row2 mb10">
        <label>Hình Chính</label> <br>
        <input type="file" class="img_chinh" name="hinh_chinh" accept="image/*" style="display: flex;
                                              align-items: left;">
        <img style="display: flex;" src="../uploads/upload_sp/<?= $sanpham['img'] ?>" height="100px" alt="">
        <input type="hidden" name="hinh_chinh_ol" value="<?= $sanpham['img'] ?>">
        <span class="js_img_er"></span>
      </div>
      <div class="row2 mb10">
        <label>Hình Phụ</label> <br>
        <input type="file" class="img_phu" name="hinh_phu[]" multiple accept="image/*" style="display: flex;
                                              align-items: left;">
        <?php
            foreach ($load_img_phu as $img_phu) : ?>
                  <img style="display: flex;" height="100px" src="../uploads/upload_sp/<?=$img_phu['name']?>" alt="">
            <?php endforeach ?>
        <input type="hidden" >
        <span class="js_img_er_phu"></span>
      </div>
      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        
        <textarea id="myTextarea" class="mota" name="mota" cols="150" rows="10"></textarea> <br>
        <span class="js_mota_er"></span>
        <script>
          // Lấy thẻ textarea bằng ID
          var textareaElement = document.getElementById("myTextarea");

          // Thiết lập giá trị mặc định
          textareaElement.value = "<?=$sanpham['mota']?>";
        </script>
      </div>
      <div class="row2 mb10">
        <label for="size">Kích Thước</label>
        <input type="text" class="size" name="size" placeholder="Nhập kích thước.VD: S,M,L" value="<?=$size_oll?>">
        <span class="js_size_er"></span>
      </div>
      <div class="row2 mb10">
        <label for="size">Màu Sắc</label>
        <input type="text" class="color" name="color" placeholder="Nhập màu sắc.VD:Đen,Trắng" value="<?=$color_oll?>" >
        <span class="js_color_er"></span>
      </div>
      <input type="hidden" name="id_sp" value="<?=$sanpham['id_sp']?>">


      <div class="row mb10 ">
        <input class="mr20 jsthem_sp" id="jsthem_sp" type="submit" name="themmoi" value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">
        
        <a href="javascript:void(0)" onclick="history.back()"><input class="mr20" type="button" value="Quay lại"></a>
      </div>
    </form>
  </div>
</div>