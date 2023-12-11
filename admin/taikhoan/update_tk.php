<?php
if (is_array($listsuataikhoan)) {
    extract($listsuataikhoan);
}
?>
<div class="container">
    <h1>Sửa Thông Tin Khách Hàng</h1>
    <form action="index.php?act=update_tk" method="post" enctype="multipart/form-data">
        <div class="title">
            <label for="">Cập Nhật Tài Khoản</label> <br>
        </div>
        <div class="content ">
            <input type="hidden" class="form-control" value="<?= $id_user ?>" style="height: 40px;" name="id_user">
        </div>
        <div class="content-form ">
            <label for="">Email</label>
            <input type="email" class="form-control" value="<?= $email ?>" style="height: 40px;" name="email"
                placeholder="Nhập email">
        </div>
        <div class="content-form ">
            <label for="">Tên Tài Khoản</label>
            <input type="text" class="form-control" value="<?= $ho_ten ?>" style="height: 40px;" name="ho_ten"
                placeholder="Nhập tài khoản">
        </div>
        <div class="content-form ">
            <label for="">Địa Chỉ</label>
            <input type="text" class="form-control" value="<?= $address ?>" style="height: 40px;" name="address"
                placeholder="Nhập địa chỉ">
        </div>
        <div class="content-form ">
            <label for="">Số Điện Thoại</label>
            <input type="text" class="form-control" value="<?= $sdt ?>" style="height: 40px;" name="sdt"
                placeholder="Nhập số điện thoại">
        </div>
        <div class="content-form ">
            <label for="">Mật Khẩu</label>
            <input type="text" class="form-control" value="<?= $pass ?>" style="height: 40px;" name="pass"
                placeholder="Nhập mật khẩu">
            <br>
        </div>
        <div class="content-form ">
            <label for="">Vai Trò</label>
            <input type="text" class="form-control" value="<?= $role ?>" style="height: 40px;" name="role"
                placeholder="Nhập vai trò">
            <br>
        </div>
        <div>
            <input class="mr20" type="submit" name="capnhattaikhoan" va lue="CẬP NHẬT TÀI KHOẢN">
            <input class="mr20" type="reset" value="NHẬP LẠI">
        </div>
    </form>
</div>