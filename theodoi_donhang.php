<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .row-top_content_item_full {
        margin-bottom: 8px;
        background-color: #fff;
        /* Set background color to white */
        padding: 16px;
        /* Add padding for spacing and to separate content from the border */
        border: 2px solid rgb(221, 221, 221);
        /* Add border for better separation */
        border-radius: 8px;
        /* Add border radius for rounded corners */
    }

    .row-top_content_item_full:last-child {
        margin-bottom: 0;
    }

    .row-top_content_item_row {
        display: flex;
        justify-content: space-between;
    }

    .row-top_content_item_full:last-child {
        margin-bottom: 0;
    }

    .row-top_title {
        background-color: #f5f5f5;
    }

    .row-top_title ul.row-top_title-infor {
        display: flex;
        justify-content: center;
        gap: 40px;
        align-items: center;
        font-size: 18px;
        list-style: none;
        padding: 10px;
    }

    .row-top_title {
        position: relative;
    }

    .row-top_title-infor {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .row-top_title-infor li {
        margin-right: 20px;
        padding-bottom: 10px;
        cursor: pointer;
        position: relative;
    }

    .row-top_title-infor li:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        border-radius: 3px;
        background-color: transparent;
        /* Set the initial color to transparent */
        transition: background-color 0.3s ease;

        /* Add transition for a smoother effect */
    }

    .row-top_title-infor li.active:after {
        background-color: #7fad39;
        /* Replace with the desired color */
    }

    .row-top_content_item.active {
        display: block;
    }

    .row-top_content {
        margin: 20px 0;
        background-color: #f5f5f5;
    }

    .row-top_content_item_row {
        display: flex;
        justify-content: space-between;
        padding: 16px;
        border-bottom: 1px solid rgb(221, 221, 221);
    }



    .infor_item-right .price {
        display: flex;
        gap: 8px;
    }

    .infor_item-right .price .price__old {
        font-size: 14px;
        text-decoration: line-through;
    }

    .infor_item-right .price .price__new {
        font-size: 16px;
        font-weight: 550;
        color: #7fad39;
    }

    .infor_item-left {
        display: flex;
        gap: 8px;
    }

    .row-top_content_item_full .thanhtien {
        display: flex;
        justify-content: space-between;
        padding: 8px;
        margin-bottom: 8px;

    }

    .row-top_content_item_full .thanhtien .thanhtien_item {
        padding-right: 16px;

    }

    p.status {
        color: green;
        font-weight: 600;
        font-size: 19px;
    }

    .row-top_content_item_full .thanhtien .thanhtien_item p {
        font-size: 19px;

        color: red;
    }

    .row-top_title-infor li {
        margin-right: 20px;
        padding-bottom: 10px;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
        /* Center the content vertically */
    }

    .infor_item p {
        width: 90%;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    a:hover {
        color: initial;
        text-decoration: none;
    }

    .row-top_title-infor li .count {
        border-radius: 50%;
        /* Make it a circle */
        background-color: #7fad39;
        /* Background color of the circle */
        color: #fff;
        /* Text color */
        width: 19px;
        /* Set width */
        height: 19px;
        /* Set height */
        display: flex;
        align-items: center;
        /* Center the content horizontally */
        justify-content: center;
        /* Center the content vertically */
        position: absolute;
        top: 0;
        right: -19px;
        font-size: 12px;
        /* Adjust font size as needed */
    }


    /* a.chitiet_donhang:hover .row-top_content_item_row_plus {
        background-color: #eaeaea;
        border-radius: 3px;
    } */
</style>
<!-- Breadcrumb Section Begin -->
<!-- Breadcrumb Section End -->

<section style="margin: 16px;" class="status_order">
    <div style="width: 900px;" class="container">
        <form style="text-align: right; margin:8px 0;" action="index.php?act=theodoi_donhang" method="POST">
            <input style="padding: 5px; border-radius:3px;border:1px solid #7fad39;" type="text" name="keyword" placeholder="Tìm kiếm đơn hàng ...">
            <button style="background:#7fad39; padding: 5px; border-radius:3px;border:1px solid #7fad39;color:white" name="search_order">Tìm kiếm</button>
        </form>
        <div class="row">
            <div class="col-lg-12">
                <div class="row-top_title">
                    <ul class="row-top_title-infor">
                        <li class="<?= $_GET['order'] == 'choxacnhan' ? 'active' : "" ?>"><a href="index.php?act=theodoi_donhang&order=choxacnhan">Chờ xác nhận</a>

                            <div class="count">
                                <?php
                                if (isset($load_all_donhang_1)) {
                                    echo  count($load_all_donhang_1);
                                }
                                ?>
                            </div>

                        </li>
                        <li class="<?= $_GET['order'] == 'daxacnhan' ? 'active' : "" ?>"><a href="index.php?act=theodoi_donhang&order=daxacnhan">Đã xác nhận</a>
                            <?php
                            if (count($load_all_donhang_2) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_2);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li class="<?= $_GET['order'] == 'danggiao' ? 'active' : "" ?>"><a href="index.php?act=theodoi_donhang&order=danggiao">Đang giao hàng</a>
                            <?php
                            if (count($load_all_donhang_3) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_3);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li class="<?= $_GET['order'] == 'hoanthanh' ? 'active' : "" ?>"><a href="index.php?act=theodoi_donhang&order=hoanthanh">Hoàn thành</a>
                            <?php
                            if (count($load_all_donhang_4) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_4);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li class="<?= $_GET['order'] == 'dahuy' ? 'active' : "" ?>"><a href="index.php?act=theodoi_donhang&order=dahuy">Đã hủy</a>
                            <?php
                            if (count($load_all_donhang_5) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_5);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>

                    </ul>
                    <div class="line"></div>
                </div>

                <div class="row-top_content">
                    <?php
                    $order = $_GET['order'] ?? "";


                    if ($_GET['act'] == 'theodoi_donhang' && ($order == 'choxacnhan')) {
                        include "view/order/cho_xac_nhan.php";
                    } elseif ($_GET['act'] == 'theodoi_donhang' && ($order == 'daxacnhan')) {
                        include "view/order/da_xac_nhan.php";
                    } elseif ($_GET['act'] == 'theodoi_donhang' && ($order == 'danggiao')) {
                        include "view/order/dang_giao.php";
                    } elseif ($_GET['act'] == 'theodoi_donhang' && ($order == 'hoanthanh')) {
                        include "view/order/hoan_thanh.php";
                    } elseif ($_GET['act'] == 'theodoi_donhang' && ($order == 'dahuy')) {
                        include "view/order/huy_don_hang.php";
                    } else {
                        include "view/order/cho_xac_nhan.php";
                    }



                    ?>

                </div>
            </div>

        </div>
    </div>
</section>