<?php

require_once "pdo.php";


function load_sp($id_danhmuc, $kw, $step){
    if($step==""){
        $step=0;
    }
    $step*=8;
    $sql = "SELECT sanpham.*, danhmuc.name AS namedm FROM sanpham 
    INNER JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc
    WHERE 1 ";
    if($id_danhmuc!=""){
        $sql .= "AND sanpham.id_danhmuc = $id_danhmuc ";
    }
    if($kw!=""){
        $sql .= "AND sanpham.name LIKE '%$kw%' ";
    }
    $sql .= "ORDER BY id_sp DESC LIMIT $step,8 ";
    return pdo_query($sql);
}

function delete_sp($id_sp){
    $sql = "DELETE FROM sanpham WHERE id_sp =?";
    pdo_execute($sql, $id_sp);
}
function delete_sp_muti($id_sp){
    $sql = "DELETE FROM sanpham WHERE id_sp IN ($id_sp)";
    pdo_execute($sql);
}

function cout_sp($id_danhmuc, $kw){
    $sql = "SELECT COUNT(sanpham.id_sp) FROM sanpham WHERE 1 ";
    if($id_danhmuc!=""){
        $sql .= "AND sanpham.id_danhmuc = $id_danhmuc ";
    }
    if($kw!=""){
        $sql .= "AND sanpham.name LIKE '%$kw%' ";
    }
    return pdo_query_one($sql);
}
?>