<div class="container">
    <h1>Danh Sách Khách Hàng</h1>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Vai Trò</th>
                <th colspan="2">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($danhsachtk as $taikhoan) {
                extract($taikhoan);
                ?>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>
                        <?= $id_user ?>
                    </td>
                    <td>
                        <?= $email ?>
                    </td>
                    <td>
                        <?= $ho_ten ?>
                    </td>
                    <td>
                        <?= $address ?>
                    </td>
                    <td>
                        <?= $sdt ?>
                    </td>
                    <td>
                        <?= $role ?>
                    </td>
                    <td>
                        <a href="index.php?act=sua_tk&id_user=<?= $id_user ?>" class="btn btn-success">Sửa</a>
                        <a href="index.php?act=delete_tk&id_user=<?= $id_user ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')"
                            class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    
</div>