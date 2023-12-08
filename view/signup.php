
<body>
    <div class="container my-5 border p-5">
        <h1>Đăng ký</h1>
        <form action="#">
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <span class="text-danger" id="mail_er"></span>
          </div>
          <div class="form-check mb-3">
          <label for="pwd" class="form-label">Mật Khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="password" name="pswd">
            <span class="text-danger " id="pass_er"></span>
          </div>
          <button type="button" class="btn btn-primary" onclick="check_dk(email.value,password.value)">Đăng ký</button>
          <span class="text-secondary">Bạn đã có tài khoản?</span> <a href="?act=login" class="text-danger">Đăng nhập</a>
        </form>
    </div>
</body>


<script>
    let email = document.getElementById('email');
    let password = document.getElementById('pwd');
    let mail_er = document.getElementById('mail_er');
    let pass_er = document.getElementById('pass_er');
    function check_dk(email,pw){
        let count = 0;
        if(email==""){
            
            mail_er.innerText = "Bạn chưa nhập email";
        }else if (!validatemail(email)){
            
            mail_er.innerText = "Bạn nhập sai định dạng mail";
        }else {
            mail_er.innerText = "";
            count++;
        }

        // chekc pass
        if(pw==""){
            
            pass_er.innerText = "Bạn chưa nhập password";
        }else if (pw.length<6){
            
            pass_er.innerText = "Password ngắn hơn 6 ký tự";
        }else {
            pass_er.innerText = "";
            count++;
        }
        if(count>=2){
            $.ajax ({
                type: 'POST',
                url: './view/ajax.php',
                data: {
                    email_dk: email,
                    password_dk: pw,
                    act: 'dang_ky'
                },
                success: function(response){
                    
                    if(response==1){
                        // trường hợp response tồn tại trả về 1
                        
                        mail_er.innerText = "Đã có tài khoản sử dụng email này";
                    }else{
                        
                        alert("Tạo tài khoản thành công");
                        window.location.href="?act=login";
                    }
                },
                error: function(error) {
                console.log(error);
            }

            })
            
        }
    }

</script>
