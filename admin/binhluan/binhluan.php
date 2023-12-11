<div class="container">
    <h1>Danh Sách Bình Luận</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($load_all_pro)) {
                foreach ($load_all_pro as $value) {
                    extract($value);
                    ?>
            <tr>
                <td>
                    <?= $id_sp ?>
                </td>
                <td>
                    <?= $name ?>
                </td>
                <td><a class="btn btn-primary" href="index.php?act=chitietbl&id_sp=<?= $id_sp ?>">Xem</a></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <div class="container" style="    align-items: center;
    /* display: inline-block; */
    display: flex;
    justify-content: center;">
        <?php
        for ($i = 1; $i <= $countTrang; $i++) {
            ?>
        <a style="text-decoration: none; border: 1px solid black;display: inline-block; width: 25px;height: 25px;text-align: center;" href="index.php?act=dsbl&page=<?= $i; ?>" class="curent__page <?= $page == $i ? "activePage" : "" ?>">
            <?= $i ?>
        </a>
        <?php
        }
        ?>
    </div>
</div>