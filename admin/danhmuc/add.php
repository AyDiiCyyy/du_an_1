<div class="row2">
      <div class="row2 font_title">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
      </div>
      <div class="row2 form_content ">
        <form action="?act=adddm" method="POST" enctype="multipart/form-data" >
          <!-- <div class="row2 mb10 form_content_container">
            <label> Mã loại </label> <br>
            <input type="text" name="maloai" placeholder="nhập vào mã loại">
          </div> -->
          <div class="row2 mb10">
            <label>Tên loại </label> 
            <span class="jsten_er"></span>
            <br>
            <input type="text" class="jstenloai" name="tenloai" placeholder="nhập vào tên danh mục">
          </div>
          <div class="row2 mb10">
            <label>Trạng thái </label> <br>
            <input style="float: left;" type="checkbox" value="1" checked name="trang_thai" >
          </div>
          <div class="row2 mb10">
            <label>Ảnh Chính</label>  
            <span class="js_img_er" ></span>
            
            <br>
            <input style="float: left;" type="file" class="img" name="img" accept="image/*">
          </div>
          <!-- <div class="row2 mb10">
            <label>Ảnh Phụ</label> <br>
            <input style="float: left;" type="file" name="imgs[]" multiple >
          </div> -->
        
          <div class="row mb10 ">
            <input class="mr20 jsthem_dm" type="submit" name="them_dm" value="THÊM MỚI">
            <input class="mr20" type="reset" value="NHẬP LẠI">

            <a href="?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
            <!-- <span class="js_er an">Thêm danh mục thành công</span> -->
            
            
        </form>
      </div>
    </div>