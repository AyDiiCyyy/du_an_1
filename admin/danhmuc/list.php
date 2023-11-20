<div class="row2">
            <div class="row2 font_title">
                <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row2 form_content ">
                <form action="#" method="POST">
                    <div class="row2 mb10 formds_loai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ LOẠI</th>
                                <th>TÊN LOẠI</th>
                                <th>TRẠNG THÁI</th>
                                <th>HÌNH ẢNH</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    $suadm="?act=suadm&id=".$danhmuc['id_danhmuc'];
                                    $xoadm="?act=xoadm&id=".$danhmuc['id_danhmuc'];
                                    echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$danhmuc['id_danhmuc'].'</td>
                                    <td>'.$danhmuc['name'].'</td>
                                    <td>'.($danhmuc['trang_thai']?"Hiển Thị":"Ẩn").'</td>
                                    <td><img height = 100px; src="../uploads/upload_dm/'.$danhmuc['img'].'" alt=""></td>
                                    <td> <a href="'.$suadm.'"><input type="button" value="Sửa"></a> 
                                        <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                                }
                            
                            ?>
                            


                        </table>
                    </div>
                    <div class="row mb10 ">
                        <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                        <a href="?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
                    </div>
                </form>
            </div>
        </div>