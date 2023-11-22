
<div class="row2">
      <div class="row2 font_title">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
      </div>
      <div class="row2 form_content ">
      <form action="?act=suadm" method="POST" enctype="multipart/form-data" >
          <!-- <div class="row2 mb10 form_content_container">
            <label> Mã loại </label> <br>
            <input type="text" name="maloai" placeholder="nhập vào mã loại">
          </div> -->
          <div class="row2 mb10">
            <label>Tên loại </label> 
            <span class="jsten_er"></span>
            <br>
            <input type="text" class="jstenloai" name="tenloai" value="<?=$dm['name']?>">
          </div>
          <div class="row2 mb10">
            <label>Trạng thái </label> <br>
            <input style="float: left;" type="checkbox" value="1" <?=($dm['trang_thai'])?"checked":""?> name="trang_thai" >
          </div>
          <div class="row2 mb10">
            <label>Ảnh Chính</label>  
            <span class="js_img_er" ></span>
            
            <br>
            <input style="float: left;" type="file" class="img" name="img" accept="image/*">
            <input type="hidden" value="<?=$dm['img']?>" name="img_ol">
            <img style="float: left;" width="200px" height="150px" src="../uploads/upload_dm/<?=$dm['img']?>" alt="">
          </div>
          <input type="hidden" value="<?=$dm['id_danhmuc']?>" name="id_danhmuc">
          <!-- <div class="row2 mb10">
            <label>Ảnh Phụ</label> <br>
            <input style="float: left;" type="file" name="imgs[]" multiple >
          </div> -->
        
          <div class="row mb10 ">
            <input class="mr20" type="submit" name="capnhat_dm" value="CẬP NHẬT">
            <input class="mr20" type="reset" value="NHẬP LẠI">

            <a href="?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
            <!-- <span class="js_er an">Thêm danh mục thành công</span> -->
            
            
        </form>
      </div>
    </div>