<?php

    function load_hd(){
        $sql = "SELECT hoadon.name AS name_kh,chitiethoadon.name,hoadon.ngay_tao,hoadon.trang_thai,hoadon.id_hd FROM `hoadon`
        INNER JOIN chitiethoadon ON chitiethoadon.id_hd= hoadon.id_hd
        WHERE 1
        ";
        return pdo_query($sql);
    }
    function update_hd($id,$value){
        $sql = "UPDATE `hoadon` SET `trang_thai`= '$value' WHERE id_hd = $id";
        
        pdo_execute($sql);
    }

?>