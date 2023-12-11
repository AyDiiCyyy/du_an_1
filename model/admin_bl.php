<?php
function all_bl()
{
    $sql = "SELECT * FROM binhluan WHERE 1 order by id_sp desc";
    return pdo_query($sql);
}
function load_all_pro()
{
    $sql = "SELECT * FROM du_an_1.binhluan inner join du_an_1.user on binhluan.id_user = user.id_user
    
    inner join du_an_1.sanpham on sanpham.id_sp = binhluan.id_sp
     group by sanpham.id_sp ";
    $load_all_pro = pdo_query($sql);
    return $load_all_pro;
}
function delete_bl($id_bl)
{
    $sql = "DELETE FROM du_an_1.binhluan WHERE id_bl = " . $id_bl;
    pdo_execute($sql);
}

function load_all_bl($id_sp)
{
    $sql = "SELECT * FROM du_an_1.binhluan inner join du_an_1.sanpham on 
    binhluan.id_sp = sanpham.id_sp
    inner join du_an_1.user on binhluan.id_user = user.id_user


    where binhluan.id_sp = $id_sp";

    $load_all_bl = pdo_query($sql);
    return $load_all_bl;
}

?>