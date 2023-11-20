<?php

require_once "pdo.php";


function load_all_dm () {
    $sql = "SELECT * FROM danhmuc WHERE 1 ORDER BY id_danhmuc ASC";
    return $listdanhmuc=pdo_query($sql);
}



?>