<div class="row2">
            <div class="row2 font_title">
                <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row2 form_content ">
                <form action="?act=listdm" method="POST">
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
                                foreach ($listdanhmuc as $key=>$danhmuc) {
                                    $suadm="?act=suadm&sua=".$danhmuc['id_danhmuc'];
                                    $xoadm="?act=listdm&delete=".$danhmuc['id_danhmuc'];
                                    echo '<tr>
                                    <td><input type="checkbox" name="id_danhmuc[]" value="'.$danhmuc['id_danhmuc'].'" class="checkbox"></td>
                                    <td>'.($key+1).'</td>
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
                        <input class="mr20" type="button" value="CHỌN TẤT CẢ" id="checkall">
                        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" id="clearall">
                        <input class="mr20" id="delete_all" type="submit" value="XOÁ CỨNG" name="xoacung">
                        <input class="mr20" id="update_all" type="submit" value="XOÁ MỀM" name="xoamem">
                        <a href="?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
                    </div>
                </form>
            </div>
        </div>