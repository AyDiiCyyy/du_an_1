<div class="container mt-3">
  <h2>Quản lý biến thể</h2>        
  <form action="?act=qlbt" method="post">
      <table class="table table-hover table-bordered ">
          <thead>
            <tr>
              <th>STT</th>
              <th>Size</th>
              <th>Color</th>
              <th>Số lượng</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bienthes as $key => $bienthe) : ?>
            <tr>
              <td><?=$key+1?></td>
              <td><?=$bienthe['size']?></td>
              <td><?=$bienthe['color']?></td>
              <td><input style="text-align: center;line-height: 30px;"  type="text" name="slbt[]" value="<?=$bienthe['so_luong']?>"></td>
              <input type="hidden" name="id_ctsp[]" value="<?=$bienthe['id_ctsp']?>">

            </tr>
            <?php endforeach ?>
          </tbody>
          <input type="hidden" name="id_sp" value="<?=$bienthe['id_sp']?>">
        </table>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
  </form>
</div>

