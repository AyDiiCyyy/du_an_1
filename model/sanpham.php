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

function load_sp_home($id_danhhmuc = null,$end, $start){
    if($end == ""){
        $end = 0;
    }
    $end+=8;
    if($start == ""){
        $start = 0;
    }
    if($start != 0){
        $start = $start*$end;
    }

    $sql = "SELECT sanpham.* FROM sanpham 
    INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc 
    WHERE danhmuc.trang_thai=1 ";
    if ($id_danhhmuc === "") {
        $id_danhhmuc = null;
    }
    if($id_danhhmuc!==null){
        $sql .= "AND sanpham.id_danhmuc = ? ";
    }
    $sql .= "ORDER BY id_sp DESC LIMIT $start,$end";
    if($id_danhhmuc!==null){
        return pdo_query($sql, $id_danhhmuc);
    }else{
        return pdo_query($sql);
    }
}
function load_one_sp($id){
    $sql = "SELECT sanpham.*, danhmuc.name AS name_dm, danhmuc.id_danhmuc FROM sanpham 
    INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc
    WHERE id_sp = ?";
    return pdo_query_one($sql,$id);
}
function load_all_img($id){
    $sql = "SELECT name FROM img_phu WHERE id_sp = ?";
    return pdo_query($sql,$id);
}

function load_bienthe($id){
    $sql = "SELECT * FROM chitietsanpham WHERE id_sp = ? AND so_luong>0 ORDER BY size";
    return pdo_query($sql,$id);
}

function load_sp_cart ($id){
    $sql = "SELECT chitietsanpham.size, chitietsanpham.id_ctsp, chitietsanpham.color, sanpham.* FROM chitietsanpham 
    INNER JOIN sanpham ON sanpham.id_sp = chitietsanpham.id_sp
    WHERE id_ctsp IN ($id)";
    // die($sql);
    return pdo_query($sql);
}

?>