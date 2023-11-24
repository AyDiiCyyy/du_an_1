<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
    <form action="?act=addsp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 ">
        <label> Danh mục </label> <br>
        <select name="iddm" style="display: flex;
                                  align-items: left;">
          <option value="">Chọn danh mục</option>
          <?php

          foreach ($listdanhmuc as $danhmuc) {

            echo '<option value="' . $danhmuc['id_danhmuc'] . '">' . $danhmuc['name'] . '</option>';
          }

          ?>

        </select>
      </div>
      <div class="row2 mb10">
        <label>Tên sản phẩm </label> <br>
        <input type="text" class="jstenloai" name="tensp" placeholder="nhập vào tên">
        <span class="jsten_er"></span>
      </div>
      <div class="row2 mb10">
        <label>Giá </label> <br>
        <input type="text" name="giasp" placeholder="nhập vào giá">
      </div>
      <div class="row2 mb10">
        <label>Hình Chính</label> <br>
        <input type="file" class="img_chinh" name="hinh_chinh" accept="image/*" style="display: flex;
                                              align-items: left;">
        <span class="js_img_er" ></span>
      </div>
      <div class="row2 mb10">
        <label>Hình Phụ</label> <br>
        <input type="file" class="img_phu" name="hinh_phu[]" multiple accept="image/*" style="display: flex;
                                              align-items: left;">
        <span class="js_img_er_phu" ></span>
      </div>
      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        <textarea class="mota" name="mota" cols="150" rows="10"></textarea>
        <span class="js_mota_er" ></span>
      </div>
      <div class="row2 mb10">
        <label for="size">Kích Thước</label>
        <input type="text" name="size" placeholder="Nhập kích thước.VD: S,M,L">
      </div>
      <div class="row2 mb10">
        <label for="size">Màu Sắc</label>
        <input type="text" name="color" placeholder="Nhập màu sắc.VD:Đen,Trắng"> 
      </div>
      

      <div class="row mb10 ">
        <input class="mr20 jsthem_sp" id="jsthem_sp" type="submit" name="themmoi" value="THÊM MỚI">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="javascript:void(0)" onclick="history.back()"><input class="mr20" type="button" value="Quay lại"></a>
      </div>
    </form>
  </div>
</div>
<script>

    // document.getElementById("add_variation").addEventListener("click", function() {
    //     var variationValuesContainer = document.getElementById("variation_values");
    //     var variationValuesContainerPrice = document.getElementById("variation_values_price");
        
    //     // Tạo trường input cho giá trị biến thể
    //     var newInputValue = document.createElement("input");
    //     newInputValue.type = "text";
    //     newInputValue.name = "variation_value[]";
    //     newInputValue.required = true;
    //     newInputValue.placeholder = "Ví dụ: Trắng, S, 43,..";
        
    //     // Tạo nút "Xóa"
    //     var removeButtonValue = document.createElement("button");
    //     removeButtonValue.type = "button";
    //     removeButtonValue.textContent = "Xóa";
    //     removeButtonValue.addEventListener("click", function() {
    //         variationValuesContainer.removeChild(newInputValue);
    //         variationValuesContainer.removeChild(removeButtonValue);
    //     });

    //     variationValuesContainer.appendChild(newInputValue);
    //     variationValuesContainer.appendChild(removeButtonValue);
        
    //     // Tạo trường input cho số lượng sản phẩm theo size
    //     var newInputAmount = document.createElement("input");
    //     newInputAmount.type = "text";
    //     newInputAmount.name = "variation_amount[]";
    //     newInputAmount.required = true;
    //     newInputAmount.placeholder = "Ví dụ: 10,55,99,..";
        
    //     // Tạo nút "Xóa"
    //     var removeButtonAmount = document.createElement("button");
    //     removeButtonAmount.type = "button";
    //     removeButtonAmount.textContent = "Xóa";
    //     removeButtonAmount.addEventListener("click", function() {
    //         variationValuesContainerPrice.removeChild(newInputAmount);
    //         variationValuesContainerPrice.removeChild(removeButtonAmount);
    //     });

    //     variationValuesContainerPrice.appendChild(newInputAmount);
    //     variationValuesContainerPrice.appendChild(removeButtonAmount);
    // });

    // let variation_value=document.querySelector('#variation_name');
    // let variation_values=document.querySelector('#variation_values');

    // document.getElementById("add_variation").addEventListener("click", function() {
    //     let input=document.createElement("input");
    //     input.setAttribute("name", variation_value.value);
    //     variation_values.appendChild(input);
    //     variation_value.value='';
    // });
    function check_add_sp(event){
    var tenloai = document.querySelector('.jstenloai');
    
    if(tenloai.value.trim() ==""){
        document.querySelector(".jsten_er").innerHTML ="Bạn chưa nhập tên";
        event.preventDefault();
        
        // return false;
    }else{
        document.querySelector(".jsten_er").innerHTML ="";
    }
    
    if((document.querySelector(".img_chinh").files.length) === 0){
        document.querySelector(".js_img_er").innerHTML="Bạn chưa chọn ảnh chính";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_img_er").innerHTML="";
    }

    if((document.querySelector(".img_phu").files.length) === 0){
        document.querySelector(".js_img_er_phu").innerHTML="Bạn chưa chọn ảnh phụ";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_img_er_phu").innerHTML="";
    }

    if((document.querySelector(".mota").value.trim()) == 0){
        document.querySelector(".js_mota_er").innerHTML="Bạn chưa nhập mô tả";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_mota_er").innerHTML="";
    }
    
    
}
var jsthem_sp=document.querySelector(".jsthem_sp");
if(jsthem_sp){
  // jsthem_sp.addEventListener("click",check_add_sp);
}
</script>