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

function insert_sanpham($name, $price, $img, $date, $id_danhmuc, $mota){
    $sql = "INSERT INTO sanpham (name, price, img, date, id_danhmuc, mota) VALUES (?,?,?,?,?,?)";
    return pdo_execute($sql, $name, $price, $img, $date, $id_danhmuc, $mota);
    // $sql = "SET @last_customer_id = LAST_INSERT_ID()";
    // return pdo_execute($sql);

}
function insert_img($name, $id_sp){
    $sql="INSERT INTO img_phu (name,id_sp) VALUES ";
    foreach ($name as $value) {
        $sql.= "('$value', $id_sp),";
    }
    $sql=rtrim($sql,",");
    pdo_execute($sql);
}

function insert_bienthe($size,$color,$id_sp){
    $sql="INSERT INTO chitietsanpham (size,color,id_sp) VALUES ";
    foreach ($size as $sz) {
        foreach ($color as $mau){
            $sql .= "('$sz','$mau', $id_sp), ";
        }
    }
    $sql=rtrim($sql,", ");
    pdo_execute($sql);
}


// function insert_img($name, $id_sp){
//     $sql= "INSERT INTO img_phu (name,id_sp) VALUES (?,?)";
//     pdo_execute($sql,$name,$id_sp);
// }
?>