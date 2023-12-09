<div class="row2">
    <div class="row2 font_title mb">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <form action="?act=listsp" method="post">
        
        <input type="text" name="kyw" value="<?= $_SESSION["kyw"]??"" ?>">
        <select name="iddm">
            <option value="" >Tất cả</option>
            <?php

            foreach ($listdanhmuc as $danhmuc) {
                $selected=($_SESSION["listdanhmuc"]!=""&&$_SESSION["listdanhmuc"]==$danhmuc['id_danhmuc'])?"selected":"";
                echo '<option '.$selected.' value="' . $danhmuc['id_danhmuc'] . '">' . $danhmuc['name'] . ' </option>';
            }

            ?>
        </select>
        <input type="submit" name="listok" value="GO">
    </form>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>NGÀY</th>
                        <th>DANH MỤC</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $key => $sanpham) : ?>
                        <tr>
                            <td><input type="checkbox" name="id_sp[]" value="<?= $sanpham['id_sp'] ?>" class="checkbox"></td>
                            <td><?= ($key + 1) ?></td>
                            <td><?= $sanpham['name'] ?></td>
                            <td><?= $sanpham['price'] ?> VND</td>
                            <td><img height="100px" src="../uploads/upload_sp/<?= $sanpham['img'] ?>" alt=""></td>
                            <td><?= $sanpham['date'] ?></td>
                            <td><?= $sanpham['namedm'] ?></td>
                            <td>
                                <a href="?act=suasp&sua=<?= $sanpham['id_sp'] ?>"><input type="button" value="Sửa"></a>
                                <a href="?act=listsp&xoa=<?= $sanpham['id_sp'] ?>"><input type="button" value="Xoá"></a>
                                <a href="?act=qlbt&ud=<?= $sanpham['id_sp'] ?>"><input type="button" value="Quản lý biến thể"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>






                </table>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $phan_trang; $i++) { ?>
                        <li class="page-item <?= ((isset($_GET['page']) && $_GET['page']+1 == $i) ? "active" : "") ?>"><a class="page-link" href="?act=listsp&page=<?= $i-1 ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                </ul>
            </div>
            <div class="row mb10  ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ" id="checkall">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" id="clearall">
                <input class="mr20" id="delete_all" type="submit" value="XOÁ" name="xoacung">
                <a class="mr20" href="?act=addsp"> <input  type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>