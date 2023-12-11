<?php
include "../model/pdo.php";
include "../model/danhmuc_admin.php";
include "../model/sanpham_admin.php";
include "../model/admin_bl.php";
include "../model/admin_taikhoan.php";
include "../model/thongke.php";
include "../model/admin_hd.php";
session_start();
if(isset($_COOKIE['user'])){

    $role = role($_COOKIE['user']);
    if($role['role'] == 1){
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
                    move_uploaded_file($_FILES['img']['tmp_name'],"../uploads/upload_dm/$img");
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
            if(isset($_POST['iddm'])){
                $_SESSION["listdanhmuc"]=$_POST['iddm'];
            }
            if(isset($_POST['kyw'])){
                $_SESSION["kyw"]=trim($_POST['kyw']);
            }
            // xoá 1 sp 
            $slsp=cout_sp($_SESSION["listdanhmuc"]??"", $_SESSION['kyw']??"");
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
            // $iddm=isset($_POST['iddm'])?$_POST['iddm']:"";
            // $kyw=isset($_POST['kyw'])?$_POST['kyw']:"";
            
            // $_SESSION["listdanhmuc"]=isset($_POST['iddm'])?$_POST['iddm']:"";
            // $_SESSION['kyw']=isset($_POST['kyw'])?$_POST['kyw']:"";
            $listdanhmuc=load_all_dm();
            $listsanpham = load_sp($_SESSION["listdanhmuc"]??"", $_SESSION['kyw']??"", isset($_GET['page'])?$_GET['page']:"");
            $view = "sanpham/list.php";
            break;
        case "addsp":
            $listdanhmuc=load_all_dm();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d H:i:s");
                $name_img=$_FILES['hinh_chinh']['name'];
                move_uploaded_file($_FILES['hinh_chinh']['tmp_name'], "../uploads/upload_sp/$name_img");
                // xử lý biến thể size
                $size=$_POST['size'];
                $size=str_replace(" " , "" ,"$size"); // giá trị muốn tìm " " thay bằng "" trong chuỗi
                $size=explode(',', $size); // chuyển chuỗi thành mảng
                // xử lý biến thể color
                $color=$_POST['color'];
                $color=str_replace(" " , "" ,"$color");
                $color=explode(',', $color);
    
                $id=insert_sanpham($_POST['tensp'], $_POST['giasp'], $name_img, $date, $_POST['iddm'], $_POST['mota']);
                insert_bienthe($size, $color,$id);
                if(isset($_FILES['hinh_phu']['name'])&&$_FILES['hinh_phu']['name'][0]!=""){
                    $name_phu=$_FILES['hinh_phu']['name'];
                    insert_img($name_phu, $id);
                    foreach ($name_phu as $key=>$value) {
                        move_uploaded_file($_FILES['hinh_phu']['tmp_name'][$key], "../uploads/upload_sp/$value");       
                    }
                }
                echo '<script>alert("Thêm sản phẩm thành công")</script>';
            }
            $view = "sanpham/add.php";
            break;
        case "suasp":
            if (isset($_GET['sua'])&&$_GET['sua']!=""){
                $sanpham = load_one_sp($_GET['sua']);
                $listdanhmuc=load_all_dm();
                $load_img_phu=load_img_phu($_GET['sua']);
                $load_bien_the=load_bienthe($_GET['sua']);
                $size_oll=array_column($load_bien_the,'size');
                $size_oll=array_unique($size_oll);
                $size_oll=implode(',', $size_oll);
                $color_oll=array_column($load_bien_the,'color');
                $color_oll=array_unique($color_oll);
                $color_oll=implode(',', $color_oll);
            }
            if ($_SERVER['REQUEST_METHOD']=="POST"){
                extract($_POST);
                // update ảnh chính
                if(isset($_FILES['hinh_chinh'])&&$_FILES['hinh_chinh']['name']!=""){
                    $img=$_FILES['hinh_chinh']['name'];
                    move_uploaded_file($_FILES['hinh_chinh']['tmp_name'],"../uploads/upload_sp/$img");
                }else{
                    $img=$hinh_chinh_ol;
                }
                update_sp($iddm,$tensp,$giasp,$img,$mota,$id_sp);
                // update ảnh phụ
                if(isset($_FILES['hinh_phu'])){
                    $fileNames = $_FILES["hinh_phu"]["name"];
                    $flag = false;
                    foreach ($fileNames as $fileName) {
                        if (!empty($fileName)) {
                            $flag = true;
                            break;
                        }
                    }
                    if($flag){
                        delete_img_ol($id_sp);
                        foreach ($fileNames as $key=>$fileName) {
                            move_uploaded_file($_FILES["hinh_phu"]['tmp_name'][$key],"../uploads/upload_sp/$fileName");
                        }
                        insert_img($fileNames,$id_sp);
                        
                    }
                }
    
                // update biến thể
                $bien_the=bienthe($id_sp);
                // xử lý biến thể size
                $size_new=$_POST['size'];
                $size_new=str_replace(" " , "" ,"$size"); // giá trị muốn tìm " " thay bằng "" trong chuỗi
                $size_new=explode(',', $size); // chuyển chuỗi thành mảng
                // so sánh sự thay đổi 
                $size_ol=array_column($bien_the,'size');
                $color_ol=array_column($bien_the,'color');
    
                $size_new_khac = array_diff($size_new, $size_ol);
                $size_ol_khac = array_diff($size_ol, $size_new);
                $size_chung = array_intersect($size_new, $size_ol);
                // $size_new_ht = array_merge($size_new_khac, $size_chung);
    
    
                // xử lý biến thể color
                $color_new=$_POST['color'];
                $color_new=str_replace(" " , "" ,"$color");
                $color_new=explode(',', $color);
    
                $color_new_khac = array_diff($color_new, $color_ol);
                $color_ol_khac = array_diff($color_ol, $color_new);
                $color_chung = array_intersect($color_new, $color_ol);
                $color_new_ht = array_merge($color_new_khac, $color_chung);
    
    
                // update vào database
                // lược bỏ các giá trị giống nhau trong mảng
                $size_ol_khac = array_unique($size_ol_khac);
                $color_ol_khac = array_unique($color_ol_khac);
                delete_bienthe($size_ol_khac,$color_ol_khac,$id_sp);
                
                insert_bienthe($size_new_khac,$color_new_ht,$id_sp);   // thêm size mới vs all màu 
                insert_bienthe($size_chung,$color_new_khac,$id_sp);     // thêm size cũ vs all màu mới
    
    
                echo '<script>alert("Sửa sản phẩm thành công")</script>';
                echo '<script>window.location.href="?act=listsp"</script>';
            }
            $view = "sanpham/update.php";
            break;
        case "qlbt":
            if(isset($_GET['ud'])&& $_GET['ud']!=""){
                $bienthes=load_bienthe($_GET['ud']);
            }
            if($_SERVER['REQUEST_METHOD']==='POST'){
                update_bt($_POST['slbt'],$_POST['id_ctsp']);
                echo '<script>alert("Sửa biến thể thành công")</script>';
                echo '<script>window.location.href="?act=qlbt&ud='.$_POST['id_sp'].'"</script>';
            }
            $view = "sanpham/qlbt.php";
            break;

            case "dsbl":
                if (isset($_GET['page']) && ($_GET['page'] > 0)) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
        
                if ($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page - 1) * 5;
                }
                $countPage = all_bl();
                $load_all_pro = load_all_pro();
                // $list_bl = load_bl($begin);
        
                $count = count($countPage);
                $countTrang = ceil($count / 5);
        
                $view = "./binhluan/binhluan.php";
                break;
            case "chitietbl":
                if (isset($_GET['id_sp'])) {
                    $id_sp = $_GET['id_sp'];
                    $load_all_bl = load_all_bl($id_sp);
                }
                $view = "./binhluan/chitietbl.php";
                break;
            case "delete_bl":
                if (isset($_GET['id_bl'])) {
                    $id_bl = $_GET['id_bl'];
                    delete_bl($id_bl);
                    header('location:' . $_SERVER['HTTP_REFERER']);
                }
        
                $view = "binhluan/binhluan.php";
                // $view = "./binhluan/binhluan.php";
                break;

                case "dskh":
                    $danhsachtk = select_all_taikhoan();
                    $view = "./taikhoan/list_tk.php";
                    break;
                case "sua_tk":
                    if (isset($_GET['id_user']) && ($_GET['id_user'] >= 0)) {
                        $id_user = $_GET['id_user'];
                        $listsuataikhoan = sua_taikhoan($id_user);
                    } else {
                        $id_user = "";
                    }
            
                    $view = "taikhoan/update_tk.php";
                    break;
                case "update_tk":
                    if (isset($_POST['capnhattaikhoan']) && ($_POST['capnhattaikhoan'])) {
                        $id_user = $_POST['id_user'];
                        $email = $_POST['email'];
                        $ho_ten = $_POST['ho_ten'];
                        $pass = $_POST['pass'];
                        $address = $_POST['address'];
                        $sdt = $_POST['sdt'];
                        $role = $_POST['role'];
                        update_taikhoankhachhang($id_user, $ho_ten, $email, $pass, $address, $sdt, $role);
                        header('location: index.php?act=dskh');
                    }
                    break;
                case "delete_tk":
                    if (isset($_GET['id_user'])) {
                        $id_user = $_GET['id_user'];
                        delete_tk($id_user);
                        header('location:' . $_SERVER['HTTP_REFERER']);
                    }
                    $view = "./taikhoan/list_tk.php";
                    break;
                case "hoadon":
                    $list_hd=load_hd();
                    $view = "hoadon/list_hd.php";
                    break;
                case "thongke":
                    $list_thong_ke=thongke();
                    $view = "thongke/thongke.php";
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
    }else{
    echo "<script>window.location.href = '../?act=home';</script>";
    }
    
    
    
    
}else{
    echo "<script>window.location.href = '../?act=home';</script>";
}
