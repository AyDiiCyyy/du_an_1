<?php 

require_once "pdo.php";

// function load_sp_home(){
//     $sql = "SELECT * FROM sanpham 
//     INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc 
//     WHERE danhmuc.trang_thai=0
//     ORDER BY id_sp DESC LIMIT 0,16";
//     return pdo_query($sql);
// }


// function load_sp_theodm($id_danhhmuc){
//     $sql = "SELECT * FROM sanpham 
//     INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc 
//     WHERE danhmuc.trang_thai=0 AND sanpham.id_danhmuc = ?
//     ORDER BY id_sp DESC LIMIT 0,16";
//     return pdo_query($sql, $id_danhhmuc);
// }

function load_sp_home($id_danhhmuc = null,$maxsp){
    if($maxsp == ""){
        $maxsp = 0;
    }
    $maxsp+=8;
    $sql = "SELECT sanpham.* FROM sanpham 
    INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc 
    WHERE danhmuc.trang_thai=0 ";
    if ($id_danhhmuc === "") {
        $id_danhhmuc = null;
    }
    if($id_danhhmuc!==null){
        $sql .= "AND sanpham.id_danhmuc = ? ";
    }
    $sql .= "ORDER BY id_sp DESC LIMIT 0,$maxsp";
    if($id_danhhmuc!==null){
        return pdo_query($sql, $id_danhhmuc);
    }else{
        return pdo_query($sql);
    }
}

?>