<?php

require_once "pdo.php";


function load_all_dm () {
    $sql = "SELECT * FROM danhmuc WHERE 1 ORDER BY id_danhmuc ASC";
    return pdo_query($sql);
}

function insert_danhmuc($name,$trang_thai,$img){
    $sql = "INSERT INTO danhmuc(name,trang_thai,img) VALUES(?,?,?)";
    pdo_execute($sql, $name, $trang_thai, $img);
} 


?>