<?php
    // product là danh mục sản phẩm
    // product-detail là sản phẩm chi tiết
    include_once "model/danhmuc.php";
    include_once "model/sanpham.php";

    if(!isset($_GET['xemthem'])){
        $maxsp=4;
    }else if (isset($_GET['xemthem'])&&$_GET['xemthem']==""){
        $maxsp=4;
    }else{
        $maxsp=$_GET['xemthem']+4;
        
    }
    $top2_dm = load_2_dm();
    $load_all_dm = load_all_dm(); 
    $load_16sp = load_sp_home((isset($_GET['id_danhmuc']) ? $_GET['id_danhmuc'] : ''),(isset($_GET['xemthem']) ? $_GET['xemthem'] : ''));

        $act = $_GET["act"] ?? "";
        switch ($act) {
            case "":
                $view = "view/main.php";
                break;
            case 'sanphamct':
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