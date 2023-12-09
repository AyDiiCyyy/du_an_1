
<body>
    <div class="container my-5 border p-5">
        <h1>Đăng nhập</h1>
        <form action="#">
        <span class="text-danger" id="tk_er"></span>
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
          <button type="button" class="btn btn-primary" onclick="check_dn(email.value,password.value)">Đăng nhập</button>
          <span class="text-secondary">Bạn chưa có tài khoản?</span> <a href="?act=signup" class="text-danger">Đăng ký</a>
        </form>
    </div>
</body>

<script>
    let email = document.getElementById('email');
    let password = document.getElementById('pwd');
    let mail_er = document.getElementById('mail_er');
    let pass_er = document.getElementById('pass_er');
    let tk = document.getElementById('tk_er');
    function check_dn(email,pw){
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
                    email_dn: email,
                    password_dn: pw,
                    act: 'dang_nhap'
                },
                success: function(response){
                    if(response==1){
                        // tk mk chính xác
                        alert("Đăng nhập thành công");
                        window.location.href="?act=home";
                    }else{
                        tk.innerText ="Tài khoản hoặc mật khẩu sai";
                    }
                },
                error: function(error) {
                console.log(error);
            }

            })
            
        }
    }

</script>