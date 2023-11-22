<?php

require_once "pdo.php";


function load_all_dm () {
    $sql = "SELECT * FROM danhmuc WHERE 1 ORDER BY id_danhmuc DESC";
    return pdo_query($sql);
}

function insert_danhmuc($name,$trang_thai,$img){
    $sql = "INSERT INTO danhmuc(name,trang_thai,img) VALUES(?,?,?)";
    pdo_execute($sql, $name, $trang_thai, $img);
} 

function delete_danhmuc($id_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE id_danhmuc=?";
    pdo_execute($sql,$id_danhmuc);

}

function delete_danhmuc_muti($id_danhmuc){
    $id = "";
    foreach ($id_danhmuc as $item) {
        $id .= $item.", ";
    }
    $id = rtrim($id, ", ");
    $sql = "DELETE FROM danhmuc WHERE id_danhmuc IN ($id)";
    pdo_execute($sql);
    
}
function delete_mem_danhmuc_muti($id_danhmuc){
    $id = "";
    foreach ($id_danhmuc as $item) {
        $id .= $item.", ";
    }
    $id = rtrim($id, ", ");
    $sql = "UPDATE danhmuc SET trang_thai=0 WHERE id_danhmuc IN ($id)";
    pdo_execute($sql);
    
}


?>