<div class="container mt-3">       
  <table class="table table-bordered table-striped text-center">
    <thead>
      <tr>
        <th>Tên khách hàng</th>
        <th>Tên sản phẩm</th>
        <th>Ngày đặt</th>
        <th>trạng thái</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($list_hd as $value) : ?>
      <tr>
        <td><?=$value['name_kh']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['ngay_tao']?></td>
        <?php $id=$value['id_hd'] ?>
        <td><select  id="trang_thai_<?=$id?>"  oninput="update_trang_thai(<?=$id?>,(document.getElementById('trang_thai_<?=$id?>').value))">
          <option value="1" <?=($value['trang_thai']==1?'selected':'')?> >Chờ xác nhận</option>
          <option value="2" <?=($value['trang_thai']==2?'selected':'')?>>Đã xác nhận</option>
          <option value="3" <?=($value['trang_thai']==3?'selected':'')?>>Đang giao hàng</option>
          <option value="4" <?=($value['trang_thai']==4?'selected':'')?>>Giao hàng thành công</option>
        </select></td>
      </tr>
      <?php endforeach ?>
      
    </tbody>
  </table>
</div>
<script>
  function update_trang_thai(id, a){
      $.ajax ({
        type: "POST",
        url: '../view/ajax.php',
        data: {
          id: id,
          gia_tri: a,
          act: 'update_trang_thai',
        },
        success: function(response){
                    // alert(response);
                    alert('cập nhật trạng thái thành công');
                },
                error: function(error) {
                console.log(error);
            }
      })
  }
</script>