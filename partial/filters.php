<aside id="filters">
   <div class="bordered stacked mb-3 p-0">
      <h3 class="title m-0"  style="color:#333">Văn phòng theo Quận</h3>
      <div class="list-group">
      <?php foreach($view_data['districtsOnProduct'] as $item) { ?>
            <a class="list-group-item list-group-item-action" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['_name'])) ?>"><?= $item['_prefix'] ?> <?= $item['_name'] ?></a>
      <?php } ?>
      </div>
   </div>
   <div class="bordered stacked mb-3 p-0">
      <h3 class="title m-0"  style="color:#333">Văn phòng theo Đường</h3>
      <div class="list-group">
      <?php foreach($view_data['streetsOnProduct'] as $item) { ?>
         <a class="list-group-item list-group-item-action" href="<?= base_url ?>/can-ho/duong-<?= strtolower(vn_to_str($item['Street'])) ?>">Đường <?= $item['Street'] ?></a>  
      <?php } ?>                           
      </div>
   </div>
   <div class="bordered stacked mb-3 p-0">
      <h3 class="title m-0" style="color:#333">Văn phòng theo Hướng</h3>
      <div class="list-group">
      <?php foreach($view_data['directions'] as $item) { ?>
         <a class="list-group-item list-group-item-action" href="<?= base_url ?>/can-ho/<?= $item['Alias'] ?>"><?= $item['Name'] ?></a>                    
      <?php } ?>
      </div>
   </div>
</aside>