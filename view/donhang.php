<?php

if (isset($_COOKIE['user'])) { ?>
    <style>
        /* .container {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    } */


        .table {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table img {
            max-height: 150px !important;
            max-width: 100%;
            display: block;
            margin: 0 auto;
        }

        .item-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
    </style>

    <body>
        <div class="container my-5 border p-5" style="min-height: 500px;">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link <?= (!isset($_GET['trang_thai']) || (isset($_GET['trang_thai']) && $_GET['trang_thai'] == 1)) ? 'active' : '' ?>" href="?act=don_hang&trang_thai=1">Chờ xác nhận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['trang_thai']) && $_GET['trang_thai'] == 2) ? 'active' : '' ?>" href="?act=don_hang&trang_thai=2">Đã xác nhận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['trang_thai']) && $_GET['trang_thai'] == 3) ? 'active' : '' ?>" href="?act=don_hang&trang_thai=3">Đang giao hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['trang_thai']) && $_GET['trang_thai'] == 4) ? 'active' : '' ?>" href="?act=don_hang&trang_thai=4">Giao hàng thành công</a>
                </li>
                
            </ul>
            <?php foreach ($sp_hd as $value) : ?>
                <div class="item-container mt-5" id="id_cthd_<?= $value['id_cthd'] ?>">
                    <div style="width: 20%;"><img src="./uploads/upload_sp/<?= $value['img'] ?>" alt="" class="img-fluid" style="height: 150px !important;"></div>
                    <div style="width: 20%;"><?= $value['name'] ?> <br>X<?= $value['so_luong'] ?> <br> <?= $value['size'] ?> ( <?= $value['color'] ?>)</div>
                    <div style="width: 20%;"><?= ((int)$value['price'] * (int)$value['so_luong']) ?></div>
                    <?php if ($value['trang_thai'] == 1) { ?>
                        <div id="huy_don" onclick="xoa_hd(<?= $value['id_cthd'] ?>)" style="width: 20%;"><button style="display: inline-block;
                            padding: 10px 20px; /* Thêm padding cho nút */
                            text-align: center;
                            text-decoration: none;
                            background-color: red; /* Màu nền */
                            color: white; /* Màu chữ */
                            border: 1px solid #4CAF50; /* Viền */
                            border-radius: 5px; /* Góc bo tròn */
                            cursor: pointer;
                            transition: background-color 0.3s ease;" type="button">Huỷ đơn</button></div> <?php } ?>
                    <div class="text-success" style="width: 20%;"><?php

                                                                    if ($value['trang_thai'] == 1) {
                                                                        echo "Chờ xác nhận";
                                                                    } else if ($value['trang_thai'] == 2) {
                                                                        echo "Đã xác nhận";
                                                                    } else if ($value['trang_thai'] == 3) {
                                                                        echo "Đang giao hàng";
                                                                    } else if ($value['trang_thai'] == 4) {
                                                                        echo "Đã giao hàng";
                                                                    } else if ($value['trang_thai'] == 0) {
                                                                        echo "Đã huỷ";
                                                                    }

                                                                    ?></div>
                </div>
            <?php endforeach ?>
            <!-- <div class="item-container mt-5">
                <div style="width: 20%;"><img src="./uploads/upload_sp/1.jpg" alt="" class="img-fluid" style="height: 150px !important;"></div>
                <div style="width: 20%;">test1 <br>x1</div>
                <div style="width: 20%;">1000000</div>
                <div style="width: 20%;">Huỷ đơn</div>
                <div class="text-success" style="width: 20%;">chờ xác nhận</div>
            </div>
            <div class="item-container mt-5">
                <div style="width: 20%;"><img src="./uploads/upload_sp/1.jpg" alt="" class="img-fluid" style="height: 150px !important;"></div>
                <div style="width: 20%;">test1 <br>x1</div>
                <div style="width: 20%;">1000000</div>
                <div style="width: 20%;">Huỷ đơn</div>
                <div class="text-success" style="width: 20%;">chờ xác nhận</div>
            </div> -->



        </div>
        <script>
            function xoa_hd(id_cthd) {
                if (confirm('Bạn có muốn huỷ đơn không?')) {
                    let xoa = document.getElementById('id_cthd_'+id_cthd);
                    $.ajax({
                        type: "POST",
                        url: "./view/ajax.php",
                        data: {
                            id_cthd: id_cthd,
                            act: "huy_don"
                        },
                        success: function(response) {
                            alert('huỷ đơn thành công');
                            xoa.remove();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                }
            }
        </script>

    </body>
<?php } else {
    echo "<script>window.location.href = '?act=login'</script>";
}

?>