<?php
session_start();
include "../model/taikhoan.php";
include "../model/config_vnpay.php";
include "../model/admin_hd.php";



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
            $id_hd = add_hoa_don($_POST['user'], $_POST['ten_hd'], $_POST['sdt_hd'], $_POST['dia_chi_hd'], $_POST['pttt'], $date);
            add_sp_hd($id_hd, $_SESSION['cart']);
            //



            // if (isset($_POST['pttt']) && ($_POST['pttt'] == 2)) {

            //     $id_hd = add_hoa_don($_POST['user'], $_POST['ten_hd'], $_POST['sdt_hd'], $_POST['dia_chi_hd'], $_POST['pttt'], $date);
            //     add_sp_hd($id_hd, $_SESSION['cart']);

            //     // $vnp_TxnRef = $_SESSION['ma_don_hang']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY


            //     $tongdon = 0;
            //     foreach ($data as $key => $oder_detail) {
            //         $tongdon += $oder_detail['amount'] * $oder_detail['sale'];
            //     }

            //     $tongdon = $tongdon - ($tongdon * $voucher['del_percent'] / 100) - $voucher['del_price'];


            //     $vnp_OrderInfo = "Thanh toán đơn hàng tại VanhStore";
            //     $vnp_OrderType = "VNPAY";
            //     $vnp_Amount = $tongdon * 100; //Giá tiền
            //     $vnp_Locale = "VN";
            //     $vnp_BankCode = "NCB";
            //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //     $vnp_ExpireDate = $expire;
            //     $vnp_Bill_Address = $_POST['address'];

            //     $inputData = array(
            //         "vnp_Version" => "2.1.0",
            //         "vnp_TmnCode" => $vnp_TmnCode,
            //         "vnp_Amount" => $vnp_Amount,
            //         "vnp_Command" => "pay",
            //         "vnp_CreateDate" => date('YmdHis'),
            //         "vnp_CurrCode" => "VND",
            //         "vnp_IpAddr" => $vnp_IpAddr,
            //         "vnp_Locale" => $vnp_Locale,
            //         "vnp_OrderInfo" => $vnp_OrderInfo,
            //         "vnp_OrderType" => $vnp_OrderType,
            //         "vnp_ReturnUrl" => $vnp_Returnurl,
            //         "vnp_TxnRef" => $vnp_TxnRef,
            //         "vnp_ExpireDate" => $vnp_ExpireDate,
            //         "vnp_Bill_FirstName" => $_POST['fullname'],
            //         "vnp_Inv_Phone" => $_POST['phone'],
            //         "vnp_Bill_Address" => $_POST['address']
            //     );

            //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            //         $inputData['vnp_BankCode'] = $vnp_BankCode;
            //     }


            //     ksort($inputData);

            //     $query = "";
            //     $i = 0;
            //     $hashdata = "";
            //     foreach ($inputData as $key => $value) {
            //         if ($i == 1) {
            //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            //         } else {
            //             $hashdata .= urlencode($key) . "=" . urlencode($value);
            //             $i = 1;
            //         }
            //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
            //     }

            //     $vnp_Url = $vnp_Url . "?" . $query;
            //     if (isset($vnp_HashSecret)) {
            //         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            //     }
            //     $returnData = array(
            //         'code' => '00',
            //         'message' => 'success',
            //         'data' => $vnp_Url
            //     );

            //     if (isset($_POST['pttt']) && ($_POST['pttt'] == 2)) {
            //         header('Location: ' . $vnp_Url);
            //         die();
            //     } else {
            //         echo json_encode($returnData);
            //     }
            // } else {
            //     $id_hd = add_hoa_don($_POST['user'], $_POST['ten_hd'], $_POST['sdt_hd'], $_POST['dia_chi_hd'], $_POST['pttt'], $date);
            //     add_sp_hd($id_hd, $_SESSION['cart']);

            //     // $vnp_TxnRef = $_SESSION['ma_don_hang'];

            //     // echo "<pre>";
            //     // print_r($_POST);
            //     // echo "</pre>";
            //     // die;

            //     header('Location: index.php?action=cam-on');
            // }





            //
            unset($_SESSION['cart']);

            break;
        case "huy_don":
            delete_hd($_POST['id_cthd']);
            break;
        case "binh_luan":
            $id = binh_luan($_POST['id_sp'], $_POST['id_user'], $_POST['nd']);
            $bl = load_one_bl($id);
            echo '
    <div class="datcoi" style="width: 100%;">
        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
            <img src="https://down-vn.img.susercontent.com/file/e5ea18765d0a4bab7a5bc628e844e588_tn" alt="AVATAR">
        </div>
        <div class="size-207">
            <div class="flex-w flex-sb-m p-b-17">
                <span class="mtext-107 cl2 p-r-20">
                    ' . $bl['ho_ten'] . '
                </span>
            </div>
            <p class="stext-102 coi cl6">
                ' . $bl['noi_dung'] . '
            </p> <br>
        </div>
    </div>
';
            break;
        case "update_trang_thai":
            
            update_hd($_POST['id'],$_POST['gia_tri']);
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
