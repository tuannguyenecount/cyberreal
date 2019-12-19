<section class="content-header">
   <h1>
      <?= $view_data['title'] ?>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url_editor?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
      <li class="active"><?= $view_data['title'] ?></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-body">
               <?php include_once 'view/shared/_errors.php'; ?>
               <div class="table-responsive">
                  <table id="tblData" class="table table-bordered table-striped" method="post">
                     <thead>
                        <tr>
                           <th class="text-center">Mã số</th>
                           <th>Họ tên</th>
                           <th>Email</th>
                           <th>Số điện thoại</th>
                           <th>Ghi chú</th>
                           <th>Ngày gửi</th>
                           <th class="text-center">Trạng thái</th>
                           <th class="text-center">Thao tác</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr class="<?= $item['IsConfirm'] == 0 ? "danger" : "" ?>">
                           <td class="text-center">
                              #<?= $item['Id'] ?>
                           </td>
                           <td>
                              <?= $item['Name'] ?>
                           </td>
                           <td>
                              <?= $item['Email'] ?> 
                           </td>
                           <td>
                              <?= $item['Phone'] ?>
                           </td>
                           <td>
                              <?= $item['Note'] ?>
                           </td>
                           <td>
                              <?= $item['CreatedDate'] ?>
                           </td>
                           <td class="text-center">
                              <?php if ($item['IsConfirm'] != 0) { ?>
                                 <img src="<?= base_url ?>/images/check.png" width="20" height="20" />
                              <?php } else { ?>
                                    <img src="<?= base_url ?>/images/stop.png" width="20" height="20" />
                              <?php } ?>
                           </td>
                           <td class="text-center">
                              <a href="<?= base_url_editor ?>/booking/viewdetail/<?= $item['Id'] ?>" data-toggle="modal" data-target="#modalViewDetail" class="btn btn-xs bg-green"><i class="fa fa-info"></i> Xem dự án</a>
                           </td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>

<div class="modal fade modal-ajax" id="modalViewDetail">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         
      </div>
        <!-- /.modal-content -->
   </div>
    <!-- /.modal-dialog -->
</div>