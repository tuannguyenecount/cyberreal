<div class="modal-header bg-green">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
     <h4 class="modal-title">Danh Sách Căn Hộ Thuộc Mã Đặt Hẹn #<?= $view_data['id'] ?></h4>
 </div>
 <div class="modal-body">
    <div class="box-body">
      <table class="table table-tripped table-middle">
        <thead>
          <tr>
            <th class="text-center">Hình ảnh</th>
            <th>Tên căn hộ</th>
            <th>Địa chỉ</th>
            <th>Đơn giá</th>
            <th>Ngày hẹn xem</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($view_data['model'] as $item) { ?>
          <tr>
            <td class="text-center">
              <img width="100" height="auto" src="<?= base_url ?>/images/products/<?= $item['ProductImage'] ?>" />
            </td>
            <td>
              <h5><a target="_blank" href="<?= $item['ProductLink'] ?>"><?= $item['ProductName'] ?></a></h5>
            </td>
            <td><h5><?= $item['ProductAddress'] ?></h5></td>
            <td><h5><?= $item['ProductPrice'] ?></h5></td>
            <td><h5><?= $item['DayToSee'] ?></h5></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

