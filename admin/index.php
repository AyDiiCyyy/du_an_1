<?php
include "../model/pdo.php";
include "../model/danhmuc_admin.php";
include "../model/sanpham_admin.php";

// controller

$act = $_GET["act"] ?? "";
switch ($act) {
    case "":
        $view = "home.php";
        break;


        // bắt đầu danh mục
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
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_FILES['img'])&&$_FILES['img']['name']!=""){
                $img=$_FILES['img']['name'];
                move_uploaded_file($_FILES['tmp_name'],"../uploads/upload_dm/$img");
            }else{
                $img=$_POST['img_ol'];
            }
            update_dm($_POST['tenloai'], $_POST['trang_thai'], $img, $_POST['id_danhmuc']);
            // header("location: ?act=listdm");
            echo '<script>alert("Sửa danh mục thành công")</script>';
            echo '<script>window.location.href="?act=listdm"</script>';
            die;
        }

        if(isset($_GET['sua'])&&$_GET['sua']!=""){
            $dm=load_dm($_GET['sua']);
        }
        $view = "danhmuc/update.php";
        break;


        // hết danh mục
    case 'listsp':
        // xoá 1 sp 
        $slsp=cout_sp(isset($_POST['iddm'])?$_POST['iddm']:"", isset($_POST['kyw'])?$_POST['kyw']:"");
        $slsp=intval(reset($slsp))/8; // lấy phần tử đầu tiên của mảng và biến thành số
        $phan_trang= ceil($slsp); // làm tròn lên số gần nhất
        if(isset($_GET['xoa'])&&$_GET['xoa']!=""){
            delete_sp($_GET['xoa']);
        }

        // xoá nhiều sp
        if(isset($_POST['xoacung'])&&$_POST['xoacung']!=""){
            $id_sp= $_POST['id_sp'];
            $id = "";
            foreach($id_sp as $sp){
                $id .= $sp.", ";
            }
            $id=rtrim($id, ", ");
            delete_sp_muti($id);
        }
        $listdanhmuc=load_all_dm();
        $listsanpham = load_sp(isset($_POST['iddm'])?$_POST['iddm']:"", isset($_POST['kyw'])?$_POST['kyw']:"", isset($_GET['page'])?$_GET['page']:"");
        $view = "sanpham/list.php";
        break;

    case "suasp":
        $view = "sanpham/update.php";
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
