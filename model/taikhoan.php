<?php
require_once "pdo.php";

function check_email($email){
    $sql = "SELECT EXISTS(SELECT 1 FROM user WHERE email = '$email') AS ketqua";
    return pdo_query_one($sql);
}

function insert_tk($email, $password){
    $sql = "INSERT INTO user (email, pass) VALUES ('$email', '$password')";
    pdo_execute($sql);
}


function check_dn($email,$password){
    $sql = "SELECT EXISTS(SELECT 1 FROM user WHERE email = '$email' AND pass = '$password') AS ketqua";
    return pdo_query_one($sql);
}

function id_tk($email,$password){
    $sql = "SELECT id_user FROM user WHERE email = '$email' AND pass = '$password'";
    return pdo_query_one($sql);
}

function update_ttgh($name,$sdt,$dia_chi,$tk){
    $sql = "UPDATE user SET ho_ten = '$name', sdt = '$sdt', address = '$dia_chi' WHERE id_user = $tk";
    pdo_execute($sql);
}
function load_tt($id_tk){
    $sql = "SELECT * FROM user WHERE id_user = $id_tk";
    return pdo_query_one($sql);
}

function add_hoa_don($user,$name,$sdt,$dia_chi,$pttt,$date){
    $sql = "INSERT INTO hoadon (id_user,name,sdt,address,phuong_thuc_tt,ngay_tao) VALUES ('$user','$name','$sdt','$dia_chi','$pttt','$date')";
    return pdo_execute($sql);
}
function add_sp_hd($id_hd,$gio_hang){

    $sql= "INSERT INTO chitiethoadon (id_hd, id_sp, name, price, color, size, so_luong, tong_tien) VALUES ";
    foreach ($gio_hang as $value) {
        $color = "SELECT color FROM chitietsanpham WHERE id_ctsp = ".$value['id_bt']."";
        $color=pdo_query_one($color);
        $size = "SELECT size FROM chitietsanpham WHERE id_ctsp = ".$value['id_bt']."";
        $size=pdo_query_one($size);
        $sql .= "('$id_hd', '".$value['id']."', '".$value['name']."', '".$value['price']."', '".$color['color']."', '".$size['size']."', '".$value['quantity']."', '".((int)$value['price']*(int)$value['quantity'])."'), ";
    }
    $sql=rtrim($sql,", ");
    pdo_execute($sql);
}
function load_hoadon($id,$trang_thai){
    if($trang_thai==''){
        $trang_thai=1;
    }
    $sql = "SELECT chitiethoadon.*,sanpham.img,hoadon.trang_thai FROM hoadon 
    INNER JOIN chitiethoadon ON chitiethoadon.id_hd = hoadon.id_hd 
    INNER JOIN sanpham ON chitiethoadon.id_sp = sanpham.id_sp
    WHERE hoadon.id_user = $id AND hoadon.trang_thai=$trang_thai";
    return pdo_query($sql);
}

function delete_hd($id){
    $sql = "DELETE FROM `chitiethoadon` WHERE id_cthd = $id";
    pdo_execute($sql);
}

?>