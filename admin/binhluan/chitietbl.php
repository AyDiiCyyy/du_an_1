<div class="container">
    <h1>Danh Sách Bình Luận</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã bình luận</th>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày Bình Luận</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($load_all_bl)) {
                    foreach ($load_all_bl as $value) {
                        extract($value);
                        ?>
                        <tr>
                            <td>
                                <?= $id_sp ?>
                            </td>
                            <td>
                                <?= $ho_ten ?>
                            </td>
                            <td>
                                <?= $name ?>
                            </td>
                            <td>
                                <?= $noi_dung ?>
                            </td>
                            <td>
                                <?= $ngay_binh_luan ?>
                            </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận không') "
                                    href="index.php?act=delete_bl&id_bl=<?= $id_bl ?>">Xóa</a></td>

                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>