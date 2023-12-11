<?php

function thongke () {
    $sql = "SELECT 
                COUNT(*) AS sodonhang,
                chitiethoadon.id_hd,
                chitiethoadon.price,
                chitiethoadon.color,
                chitiethoadon.size,
                chitiethoadon.so_luong,
                sum(chitiethoadon.tong_tien) AS tongtien,
                chitiethoadon.name,
                hoadon.id_hd,
                hoadon.ngay_tao AS ngaytao
                
                
            FROM `chitiethoadon`
            INNER JOIN hoadon ON chitiethoadon.id_hd = hoadon.id_hd
            WHERE hoadon.ngay_tao >= 1";
    return pdo_query($sql);
}

?>