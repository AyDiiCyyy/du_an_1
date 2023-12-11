<?php
function select_all_taikhoan()
{
    $sql = "SELECT * FROM user WHERE 1 ORDER BY id_user ASC";
    $result = pdo_query($sql);
    return $result;
}
function update_taikhoankhachhang($id_user, $ho_ten, $email, $pass, $address, $sdt, $role)
{
    $sql = "UPDATE du_an_1.user SET ho_ten= '$ho_ten', sdt = '$sdt', email = '$email', pass = '$pass', address = '$address', role = $role  WHERE id_user = $id_user";
    pdo_execute($sql);
}

function sua_taikhoan($id_user)
{
    $sql = "SELECT * FROM user WHERE id_user =" . $id_user;
    $result = pdo_query_one($sql);
    return $result;
}

function delete_tk($id_user)
{
    $sql = "DELETE FROM user WHERE id_user = " . $id_user;
    pdo_execute($sql);
}
?>