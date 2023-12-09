<?php

session_start();
    // session_destroy();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // lấy dữ liệu từ ajax đẩy lên
        $id_bienthe=$_POST['id'];

        // Kiểm tra trong giỏ hàng có tồn tại hay k
        if(!empty($_SESSION['cart'])){
            // Kiểm tra sản phẩm đx có trong giỏ hàng chưa
            $index = array_search($id_bienthe, array_column($_SESSION['cart'], 'id_bt'));

            // Nếu sản phẩm tồn tại thì xoá
            if($index !== false){
                unset($_SESSION['cart'][$index]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo count($_SESSION['cart']);
            }else{
                echo "Sản phẩm không tồn tại trong giỏ hàng";
            }
        }

    }else {
        echo "Yêu cầu không hợp lệ";
    }



?>