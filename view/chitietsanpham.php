<!-- breadcrumb -->

<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Trang Chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="?act=dmsp&id_danhmuc=<?= $ctsp['id_danhmuc'] ?>" class="stext-109 cl8 hov-cl1 trans-04">
            <?= $ctsp['name_dm'] ?>
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            <?= $ctsp['name'] ?>
        </span>
    </div>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="./uploads/upload_sp/<?= $ctsp['img'] ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./uploads/upload_sp/<?= $ctsp['img'] ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="./uploads/upload_sp/<?= $ctsp['img'] ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
        
                            <?php foreach ($img as $value) : ?>
                    
                                <div class="item-slick3" data-thumb="./uploads/upload_sp/<?= $value['name'] ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="./uploads/upload_sp/<?= $value['name'] ?>" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="./uploads/upload_sp/<?= $value['name'] ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?= $ctsp['name'] ?>
                    </h4>

                    <span class="mtext-106 cl2">
                        <?= $ctsp['price'] ?> Đ
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <?= $ctsp['mota'] ?>

                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Phân Loại
                            </div>

                            <div class="size-204 respon6-next">
                            <span id="bien_the_er" style="color: red;"></span>
                                <div class="rs1-select2 bor8 bg0">
                                    <select id="bienthe" class="js-select2" name="time">
                                        <option value="">Chọn Size Và Màu</option>
                                        <?php foreach($bienthe as $bt) : ?>
                                        <option value="<?=$bt['id_ctsp']?>"><?=$bt['size']?> (<?=$bt['color']?>)</option>
                                        <?php endforeach ?>
                                        <!-- <option>Size M</option>
                                        <option>Size L</option>
                                        <option>Size XL</option> -->
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Màu Sắc
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="time">
                                        <option>Choose an option</option>
                                        <option>Red</option>
                                        <option>Blue</option>
                                        <option>White</option>
                                        <option>Grey</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div> -->

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" readonly value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                                        
                                <button data-id="<?=$ctsp['id_sp']?>" type="button" onclick="addToCart(<?=$ctsp['id_sp']?>,'<?=$ctsp['name']?>',<?=$ctsp['price']?>, id_bienthe.value)" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Thêm Vào Giỏ Hàng
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <!-- <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Nội Dung</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Thông Tin Sản Phẩm</a>
                    </li> -->

                    <li class="nav-item p-b-10">
                        <a class="nav-link active" aria-expanded="true" data-toggle="tab" href="#reviews" role="tab">Bình Luận</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    
                    <!-- Bình Luận -->
                    <div class="tab-pane fade"  id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Viết Đánh Giá
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Những đánh giá của bạn sẽ giúp shop chúng tôi hoàn thiện hơn.
                                        </p>
                                        <div class="row p-b-25" style="margin-bottom: 40px;">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Đánh Giá</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>
                                        </div>
                                        <?php
                                            if(isset($_COOKIE['user'])){
                                                $user = $_COOKIE['user'];
                                            }else{
                                                $user = 0;
                                            }
                                        ?>
                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" type="button" onclick="binh_luan(<?=$ctsp['id_sp']?>,<?=$user?>,noidung.value)" style="margin-bottom: 40px;">
                                            Gửi
                                        </button>
                                        <!-- Review -->
                                        <div class="bl flex-w flex-t" id="bo_binh_luan" style="min-height: 185px;">
                                            <?php foreach($bl as $value) : ?>
                                            <div class="datcoi" style="width: 100%;">
                                                <div class=" wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                    <img src="https://down-vn.img.susercontent.com/file/e5ea18765d0a4bab7a5bc628e844e588_tn" alt="AVATAR">
                                                </div>

                                                <div class="size-207">
                                                    <div class="flex-w flex-sb-m p-b-17">
                                                        <span class="mtext-107 cl2 p-r-20">
                                                            <?=$value['ho_ten']?>
                                                        </span>

                                                    </div>

                                                    <p class="stext-102 coi cl6">
                                                    <?=$value['noi_dung']?>
                                                    </p>
                                                    <br>
                                                </div>
                                            </div>
                                            <?php endforeach ?>

                                            


                                        </div>
                                        <!-- Review -->
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Bình Luận -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            SKU: JAK-01
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Danh Mục: Bomber, Nam
        </span>
    </div>
</section>


<!-- Related Products -->

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="images/icons/icon-close.png" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            Lightweight Jacket
                        </h4>

                        <span class="mtext-106 cl2">
                            $58.79
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                            feugiat.
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Size S</option>
                                            <option>Size M</option>
                                            <option>Size L</option>
                                            <option>Size XL</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>White</option>
                                            <option>Grey</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"  value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalProduct = document.getElementById('totalProduct');
    var id_bienthe = document.getElementById('bienthe');
    function addToCart(productId, productName, productPrice, id_bienthe){
        if(id_bienthe==""){
            document.getElementById("bien_the_er").innerText = "Bạn chưa chọn loại hàng";
        }else{
            document.getElementById("bien_the_er").innerText = "";
            // Sử dụng JQuery
            $.ajax ({
                type: "POST",
                // Đường dẫn đến file php xử lý dữ liệu
                url: "./view/addToCart.php",
                data: {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    id_bt: id_bienthe,
                },
                success: function (response){
                    totalProduct.dataset.notify = response;
                    alert ("Bạn đã thêm sản phẩm vào giỏ hàng thành công!");
                },
                error: function(error){
                    console.log(error);
                },
            });
        }
    }

    let noidung = document.getElementById('review');

    function binh_luan(id_sp,id_user,nd){
        let bo_binh_luan = document.getElementById('bo_binh_luan');
        
        $.ajax ({
                type: "POST",
                // Đường dẫn đến file php xử lý dữ liệu
                url: "./view/ajax.php",
                data: {
                    id_sp: id_sp,
                    id_user: id_user,
                    nd: nd,
                    act: "binh_luan"
                },
                success: function (response){
                    bo_binh_luan.insertAdjacentHTML('afterbegin', response);
                    // alert ("Thêm bình luận thành công");
                },
                error: function(error){
                    console.log(error);
                },
            });
    }
</script>