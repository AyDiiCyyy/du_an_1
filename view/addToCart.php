<?php

    session_start();
    // session_destroy();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // lấy dữ liệu từ ajax đẩy lên
        $productId=$_POST['id'];
        $productName=$_POST['name'];
        $productPrice=$_POST['price'];
        $id_bienthe=$_POST['id_bt'];

        // Kiểm tra sản phẩm đx có trong giỏ hàng chưa
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            $index = array_search($id_bienthe, array_column($_SESSION['cart'], 'id_bt'));
        }else{
            $index = false;
        }
        
        // array_column() trích xuất 1 cột từ mảng giỏ hàng và trả về 1 mảng chứa giá trị của cột id
        if($index !== false){
            $_SESSION['cart'][$index]['quantity'] += 1;
        }else{
            // nếu sản phẩm chưa tồn tại thì thêm mới vào giỏ hàng
            $product = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'id_bt' => $id_bienthe,
                'quantity' => 1
            ];
            $_SESSION['cart'][] = $product;
        }
        // Trả về số lượng sản phẩm của giỏ hàng
        echo count($_SESSION['cart']);
    }else {
        echo "Yêu cầu không hợp lệ";
    }

?>