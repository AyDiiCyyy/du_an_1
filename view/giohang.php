<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Trang Chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ Hàng
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<?php

if (empty($dataDb)) {
    echo "<h1 class='container'>Chưa có sản phẩm nào trong giỏ hàng</h1>";
} else { ?>


    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Ảnh</th>
                                    <th class="column-2">Tên</th>
                                    <th class="column-3">Giá</th>
                                    <th class="column-4" style="text-align: center;">Số Lượng</th>
                                    <th class="column-5">Tổng Tiền</th>
                                    <th class="column-5"></th>
                                </tr>
                                <tbody id="order">
                                    <?php
                                    $sum_total = 0;
                                    foreach ($dataDb as $value) :
                                        $quatityInCart = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            if ($value['id_ctsp'] == $item['id_bt']) {
                                                $quatityInCart = $item['quantity'];
                                                break;
                                            }
                                        }
                                    ?>
                                        <tr class="table_row" id="row_<?= $value['id_ctsp'] ?>">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="./uploads/upload_sp/<?= $value['img'] ?>" alt="<?= $value['name'] ?>">
                                                </div>
                                            </td>
                                            <td class="column-2"><?= $value['name'] ?> <br> <?= $value['size'] ?> (<?= $value['color'] ?>) </td>
                                            <td class="column-3" id="price_sp_<?= $value['id_ctsp'] ?>"><?= number_format((int)$value['price'], 0, ",", ".") ?> Đ</td>
                                            <td class="column-4">

                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">

                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="btn_down(<?= $value['id_ctsp'] ?>)">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" readonly type="number" id="quantity_<?= $value['id_ctsp'] ?>" name="num-product1" value="<?= $quatityInCart ?>" min="1" oninput="updateQuantity(<?= $value['id_ctsp'] ?>)">


                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="btn_up(<?= $value['id_ctsp'] ?>)">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5 tong_tien_one" id="tong_tien_one_<?= $value['id_ctsp'] ?>"><?= number_format((int)$value['price'] * (int)$quatityInCart, 0, ",", ".") ?> Đ</td>
                                            <td class="column-5"><input type="button" class="btn btn-danger" id="delete_<?= $value['id_ctsp'] ?>" value="Xoá" onclick="delete_gh(<?= $value['id_ctsp'] ?>)"></td>
                                        </tr>
                                    <?php
                                        // Tính tổng giá đơn hàng

                                        $sum_total += ((int)$value['price'] * (int)$quatityInCart);

                                        // Lưu tổng giá trị vào session
                                        $_SESSION['resultTotal'] = $sum_total;
                                    endforeach

                                    ?>
                                </tbody>

                            </table>
                        </div>


                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30" style="display: flex;
                                                                                justify-content: center;">
                            TỔNG GIỎ HÀNG
                        </h4>



                        <div class="flex-w flex-t bor12 p-t-15 p-b-30" style="justify-content: center;">


                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">


                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Thông tin nhận hàng
                                    </span>

                                    <!-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="time">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> -->

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Họ và tên">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="sdt" placeholder="Số điện thoại">

                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="dia_chỉ" placeholder="Địa chỉ nhận hàng">

                                    </div>

                                    <div class="flex-w" style="justify-content: center;">
                                        <input type="button" class="btn btn-success" value="Lưu">

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33" style="text-align: center;">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Tổng tiền:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="tong_all">
                                    <?= number_format((int)$sum_total, 0, ",", ".") ?> Đ
                                </span>
                            </div>
                        </div>

                        <!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Đặt hàng
                        </button> -->
                        <input type="button" class="btn btn-success flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </form> <?php } ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    let totalProduct = document.getElementById('totalProduct');
    //     /*==================================================================
    // [ +/- num product ]*/
    // $('.btn-num-product-down').on('click', function(){
    //     var numProduct = Number($(this).next().val());
    //     if(numProduct > 1) $(this).next().val(numProduct - 1);
    // });

    // $('.btn-num-product-up').on('click', function(){
    //     var numProduct = Number($(this).prev().val());
    //     $(this).prev().val(numProduct + 1);
    // });
    function btn_down(id) {
        let newQuantity = document.getElementById('quantity_' + id);
        let tong_tien_one = document.getElementById('tong_tien_one_' + id);
        let price_sp = document.getElementById('price_sp_' + id);
        let tong_tien = document.getElementsByClassName('tong_tien_one');
        let tong_all = document.getElementById('tong_all');
        let tinh=0;
        if (newQuantity.value > 1) {
            newQuantity.value -= 1;
        }
        tong_tien_one.innerText = (newQuantity.value * parseInt(price_sp.innerText.replace(/\./g, ''), 10)) + ' Đ';
        tong_tien_one.innerText = formatNumberWithDot(tong_tien_one.innerText);
        for (let i = 0; i < tong_tien.length; i++) {
            tinh += parseInt(tong_tien[i].innerText.replace(/\./g, ''), 10);
        }
        tong_all.innerText = formatNumberWithDot(tinh)+' Đ';
        updateQuantity(id);
    }

    function btn_up(id) {
        let newQuantity = document.getElementById('quantity_' + id);
        let tong_tien_one = document.getElementById('tong_tien_one_' + id);
        let price_sp = document.getElementById('price_sp_' + id);
        let tong_tien = document.getElementsByClassName('tong_tien_one');
        let tong_all = document.getElementById('tong_all');
        let tinh=0;
        newQuantity.value = parseInt(newQuantity.value, 10) + 1;
        tong_tien_one.innerText = (newQuantity.value * parseInt(price_sp.innerText.replace(/\./g, ''), 10)) + ' Đ';
        tong_tien_one.innerText = formatNumberWithDot(tong_tien_one.innerText);
        for (let i = 0; i < tong_tien.length; i++) {
            tinh += parseInt(tong_tien[i].innerText.replace(/\./g, ''), 10);
        }
        tong_all.innerText = formatNumberWithDot(tinh)+' Đ';
        updateQuantity(id);

    }

    function formatNumberWithDot(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    // hàm cập nhật số lượng
    function updateQuantity(id) {

        let newQuantity = $('#quantity_' + id).val();
        if (newQuantity <= 0) {
            newQuantity = 1;
        }
        // gửi yêu cầu ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
            url: './view/updateQuantity.php',
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {

            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    // gửi yêu cầu ajax xoá giỏ hàng
    function delete_gh(id){
        let delete_gh = document.getElementById('row_'+id);
        
        
        $.ajax ({
            type: 'POST',
            url: "./view/delete_gh.php",
            data: {
                id: id
            },
            success: function(response) {
                delete_gh.remove();
                totalProduct.dataset.notify = response;
                update_price_xoa();
                alert("Xoá sản phẩm thành công");
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
    function update_price_xoa(){
        let tong_tien = document.getElementsByClassName('tong_tien_one');
        let tong_all = document.getElementById('tong_all');
        let tinh=0;
        for (let i = 0; i < tong_tien.length; i++) {
            tinh += parseInt(tong_tien[i].innerText.replace(/\./g, ''), 10);
        }
        tong_all.innerText = formatNumberWithDot(tinh)+' Đ';
    }
</script>