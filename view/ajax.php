<?php
session_start();
include "../model/taikhoan.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $act = $_POST['act'] ?? '';

    switch ($act) {
        case "":
            echo "lỗi";
            break;
        case "dang_ky":
            $check = check_email(trim($_POST['email_dk']));
            if ($check['ketqua'] == 1) {
                echo $check['ketqua'];
            } else {
                insert_tk($_POST['email_dk'], $_POST['password_dk']);
                echo $check['ketqua'];
            }
            break;
        case "dang_nhap":
            $email_dn = trim($_POST['email_dn']);
            $pass_dn = trim($_POST['password_dn']);
            $check_dn = check_dn($email_dn, $pass_dn);
            if ($check_dn['ketqua'] == 1) {
                // Th tk MK chính xác
                $id_tk = id_tk($email_dn, $pass_dn);
                setcookie('user', $id_tk['id_user'], time() + 3600, '/');
                echo $check_dn['ketqua'];
            } else {
                echo $check_dn['ketqua'];
            }
            break;
        case "dang_xuat":
            setcookie('user', '', time() - 3600, '/');
            break;
        case "update_ttgh":
            update_ttgh($_POST['ho_ten'], $_POST['sdt'], $_POST['address'], $_POST['id_tk']);
            break;
        case "mua_hang":
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");
            $id_hd=add_hoa_don($_POST['user'],$_POST['ten_hd'],$_POST['sdt_hd'],$_POST['dia_chi_hd'],$_POST['pttt'],$date);
            add_sp_hd($id_hd,$_SESSION['cart']);
            unset($_SESSION['cart']);

            break;
        case "huy_don":
            delete_hd($_POST['id_cthd']);
            break;

        default:
            echo "default";
    }



    // code cũ
    // // dăng ký
    // if (isset($_POST['email_dk'])) {
    //     // $check = check_email(trim($_POST['email_dk']));
    //     // if($check['ketqua']==1){
    //     //     echo $check['ketqua'];
    //     // }else{
    //     //     insert_tk($_POST['email_dk'], $_POST['password_dk']);
    //     //     echo $check['ketqua'];
    //     // }
    // }
    // // đăng nhập
    // if (isset($_POST['email_dn']) && isset($_POST['password_dn'])) {
    //     // $email_dn = trim($_POST['email_dn']);
    //     // $pass_dn = trim($_POST['password_dn']);
    //     // $check_dn = check_dn($email_dn, $pass_dn);
    //     // if ($check_dn['ketqua'] == 1) {
    //     //     // Th tk MK chính xác
    //     //     $id_tk = id_tk($email_dn, $pass_dn);
    //     //     setcookie('user', $id_tk['id_user'], time() + 3600, '/');
    //     //     echo $check_dn['ketqua'];
    //     // } else {
    //     //     echo $check_dn['ketqua'];
    //     // }
    // }

    // // đăng xuất
    // if (isset($_POST['dang_xuat']) && $_POST['dang_xuat'] == true) {
    //     // setcookie('user', '', time() - 3600, '/');
    // }

    // // cập nhật thông tin giao hàng
    // if (isset($_POST['ho_ten']) && isset($_POST['sdt']) && isset($_POST['address']) && isset($_POST['id_tk'])) {
    //     // update_ttgh($_POST['ho_ten'], $_POST['sdt'], $_POST['address'], $_POST['id_tk']);
    // }
    // // thực hiện mua hàng

}
