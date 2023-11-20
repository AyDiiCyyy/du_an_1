<div class="row2">
      <div class="row2 font_title">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
      </div>
      <div class="row2 form_content ">
        <form action="?act=adddm" method="POST" enctype="multipart/form-data">
          <!-- <div class="row2 mb10 form_content_container">
            <label> Mã loại </label> <br>
            <input type="text" name="maloai" placeholder="nhập vào mã loại">
          </div> -->
          <div class="row2 mb10">
            <label>Tên loại </label> <br>
            <input type="text" name="tenloai" placeholder="nhập vào tên danh mục">
          </div>
          <div class="row2 mb10">
            <label>Trạng thái </label> <br>
            <input style="float: left;" type="checkbox" value="1" checked name="trang_thai" >
          </div>
          <div class="row2 mb10">
            <label>Ảnh Chính</label> <br>
            <input style="float: left;" type="file" name="img">
          </div>
          <!-- <div class="row2 mb10">
            <label>Ảnh Phụ</label> <br>
            <input style="float: left;" type="file" name="imgs[]" multiple >
          </div> -->
        
          <div class="row mb10 ">
            <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
            <input class="mr20" type="reset" value="NHẬP LẠI">

            <a href="?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
        <?php
            // $_COOKIE['thong_bao']??''
            if(isset($thong_bao)&&$thong_bao!=''){
              echo "<h2>$thong_bao</h2>";
            }else{
              echo "";
            }
          ?>
        </form>
      </div>
    </div>