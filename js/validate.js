
function check_add_dm(event){
    var tenloai = document.querySelector('.jstenloai');
  
    var i=0;
    if(tenloai.value.trim() ==""){
        document.querySelector(".jsten_er").innerHTML ="Bạn chưa nhập tên";
        event.preventDefault();
        // return false;
    }else{
        document.querySelector(".jsten_er").innerHTML ="";
    }
    
    if((document.querySelector(".img").files.length) === 0){
        document.querySelector(".js_img_er").innerHTML="Bạn chưa chọn ảnh";
        event.preventDefault();
    }else{
        document.querySelector(".js_img_er").innerHTML="";
    }
    
    // if(i==0){
    //     document.querySelector(".js_er").classList.remove("an");
    // }else{
    //     document.querySelector(".js_er").classList.add("an");
    // }
}

function check_add_sp(event){
    var tenloai = document.querySelector('.jstenloai');
    
    if((document.querySelector(".danhmuc").value.length) === 0){
        document.querySelector(".js_dm_er").innerHTML="Bạn chưa chọn danh mục";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_dm_er").innerHTML="";
    }

    if(tenloai.value.trim() ==""){
        document.querySelector(".jsten_er").innerHTML ="Bạn chưa nhập tên";
        event.preventDefault();
        
        // return false;
    }else{
        document.querySelector(".jsten_er").innerHTML ="";
    }

    if((document.querySelector(".price").value.length) === 0){
        document.querySelector(".js_price_er").innerHTML="Bạn chưa nhập giá";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_price_er").innerHTML="";
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

    if((document.querySelector(".mota").value.length) === 0){
        document.querySelector(".js_mota_er").innerHTML="Bạn chưa nhập mô tả";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_mota_er").innerHTML="";
    }
    if((document.querySelector(".size").value.length) === 0){
        console.log(document.querySelector(".size").value.length);
        document.querySelector(".js_size_er").innerHTML="Bạn chưa nhập kích thước";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_size_er").innerHTML="";
    }

    if((document.querySelector(".color").value.length) === 0){
        console.log(document.querySelector(".size").value.length);
        document.querySelector(".js_color_er").innerHTML="Bạn chưa nhập màu";
        event.preventDefault();
        
    }else{
        document.querySelector(".js_color_er").innerHTML="";
    }
    
}

var jsthem_dm =document.querySelector(".jsthem_dm");

if(jsthem_dm){
    jsthem_dm.addEventListener("click",check_add_dm);
}
var jsthem_sp=document.querySelector(".jsthem_sp");
if(jsthem_sp){
  jsthem_sp.addEventListener("click",check_add_sp);
}

console.log()



// alert(document.getElementsByName('tenloai').value)


