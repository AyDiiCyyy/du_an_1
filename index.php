<?php
    session_start();
    // product là danh mục sản phẩm
    // product-detail là sản phẩm chi tiết
    include_once "model/danhmuc.php";
    include_once "model/sanpham.php";

    if(!isset($_GET['xemthem'])){
        $end=4;
    }else if (isset($_GET['xemthem'])&&$_GET['xemthem']==""){
        $end=4;
    }else{
        $end=$_GET['xemthem']+4;
        
    }
    $top2_dm = load_2_dm();
    $load_all_dm = load_all_dm(); 
    $load_16sp = load_sp_home((isset($_GET['id_danhmuc']) ? $_GET['id_danhmuc'] : ''),(isset($_GET['xemthem']) ? $_GET['xemthem'] : ''),(isset($_GET['start']) ? $_GET['start'] : ''));

        $act = $_GET["act"] ?? "";
        switch ($act) {
            case "":
                $view = "view/main.php";
                break;
            case "listcart":
                // kiểm tra xem giỏ hàng có dữ liệu hay không
                if(!empty($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    

                    // tạo mảng chưa id các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id_bt');

                    // chuyển mảng id thành 1 chuỗi
                    $idList = implode(',', $productId); 

                    // lấy sản phẩm trong bảng sản phẩm theo id
                    $dataDb = load_sp_cart ($idList);
                }
                $view = "view/giohang.php";
                break;
            case 'sanphamct':
                if(isset($_GET['id_sp'])&& $_GET['id_sp']!=""){
                    $ctsp = load_one_sp($_GET['id_sp']);
                    $img=load_all_img($_GET['id_sp']);
                    $bienthe=load_bienthe($_GET['id_sp']);
                }
                $view = "view/chitietsanpham.php";
                break;
            case "dmsp":
                $view = "view/danhmucsp.php";
                break;

            case "home":
                // $load_16sp = load_sp_home($_GET['id_danhmuc']);
                $view = "view/main.php";
            break;
            default:
                $view = "view/404.php";
        }
    
    
    

    include "./view/header.php";
    include $view;
    include "./view/footer.php";


?>