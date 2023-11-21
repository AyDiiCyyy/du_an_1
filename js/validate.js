function check_add_dm(event){
    var tenloai = document.querySelector('.jstenloai');
    var i=0;
    if(tenloai.value.trim() ===""){
        document.querySelector(".jsten_er").innerHTML ="Bạn chưa nhập tên";
        event.preventDefault();
        i++;
        // return false;
    }else{
        document.querySelector(".jsten_er").innerHTML ="";
    }
    
    if((document.querySelector(".img").files.length) === 0){
        document.querySelector(".js_img_er").innerHTML="Bạn chưa chọn ảnh";
        event.preventDefault();
        i++;
    }else{
        document.querySelector(".js_img_er").innerHTML="";
    }
    
    if(i==0){
        document.querySelector(".js_er").classList.remove("an");
    }else{
        document.querySelector(".js_er").classList.add("an");
    }
}
document.querySelector(".jsthem_dm").addEventListener("click",check_add_dm);

// alert(document.getElementsByName('tenloai').value)


