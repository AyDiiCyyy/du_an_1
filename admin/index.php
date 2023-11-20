<?php
include "../model/pdo.php";
include "../model/danhmuc_admin.php";

// controller

$act = $_GET["act"] ?? "";
switch ($act) {
    case "":
        $view = "home.php";
        break;
    case "listdm":
        $listdanhmuc=load_all_dm();
        $view = "danhmuc/list.php";
        break;
    case "adddm":
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $trang_thai=$_POST['trang_thai'] ?? 0;
            move_uploaded_file($_FILES['img']['tmp_name'],'../uploads/upload_dm/'.$_FILES['img']['name']);
            insert_danhmuc($_POST['tenloai'],$trang_thai,$_FILES['img']['name']);
            // setcookie('thong_bao','Thêm danh mục thành công',time()+1);
            $thong_bao="Thêm danh mục thành công";
            
        }
        $view = "danhmuc/add.php";
         break;
    case "suadm":
        $view = "danhmuc/update.php";
        break;
    case "xoadm":
        
        break;
    case "home":
        $view = "home.php";
    break;
    default:
        $view = "../view/404.php";
}


    include "header.php";
    include $view;
    include "footer.php";
