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
        // xoá 1 danh mục
        if(isset($_GET['delete'])&& $_GET['delete']!="") {
            delete_danhmuc($_GET['delete']);
        }

        // xoá nhiều danh mục
        if($_SERVER["REQUEST_METHOD"] ==="POST"){
            $id_danhmuc= $_POST['id_danhmuc'];
            if(isset($_POST['xoacung'])&&$_POST['xoacung']!=""){
                delete_danhmuc_muti($id_danhmuc);
            }
            if(isset($_POST['xoamem'])&&$_POST['xoamem']!=""){
                delete_mem_danhmuc_muti($id_danhmuc);
            }
        }
        
        $listdanhmuc=load_all_dm();
        $view = "danhmuc/list.php";
        break;
    case "adddm":
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $trang_thai=$_POST['trang_thai'] ?? 0;
            move_uploaded_file($_FILES['img']['tmp_name'],'../uploads/upload_dm/'.$_FILES['img']['name']);
            insert_danhmuc($_POST['tenloai'],$trang_thai,$_FILES['img']['name']);
            // header("location: ".$_SERVER["HTTP_REFERER"]);
            echo '<script>alert("Thêm danh mục thành công")</script>';
            // echo '<script>window.location.href="index.php?act=adddm"</script>';
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
