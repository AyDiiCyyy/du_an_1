<?php

require_once "pdo.php";



function load_2_dm(){
    $sql = "SELECT * FROM danhmuc WHERE trang_thai = 0 ORDER BY id_danhmuc ASC LIMIT 0,2";
    return pdo_query($sql);
}

function load_all_dm(){
    $sql = "SELECT danhmuc.* , COUNT(sanpham.id_sp) AS SLSP FROM sanpham 
    INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc
    WHERE danhmuc.trang_thai = 1
    GROUP BY sanpham.id_danhmuc
    HAVING SLSP > 0
    ORDER BY SLSP DESC LIMIT 0,8";
    return pdo_query($sql);
}




?>