<section class="content-header">
   <h1>
      <?= $view_data['title'] ?>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url_admin?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
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
                           <th class="hidden">Mã số</th>
                           <th>Họ tên</th>
                           <th>Email</th>
                           <th>Số điện thoại</th>
                           <th>Dự án quan tâm</th>
                           <th>Nội dung</th>
                           <th>Ngày gửi</th>
                           <th class="text-center">Xác nhận</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr>
                           <td class="hidden">
                              <?= $item['Id'] ?>
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
                              <a target="_blank" href="<?= $item['Link'] ?>"><?= $item['DuAnQuanTam'] ?></a>
                           </td>
                           <td>
                              <?= $item['Content'] ?>
                           </td>
                           <td>
                              <?= $item['DateSend'] ?>  
                           </td>
                           <td class="text-center">
                              <?php if ($item['IsConfirm'] != 0) { ?>
                                 <a title="Bỏ Xác nhận" href="<?= base_url_admin ?>/mailbox/unconfirm/<?= $item['Id'] ?>"><img src="<?= base_url ?>/images/check.png" width="20" height="20" /></a>
                              <?php } else { ?>
                                 <a title="Xác nhận ngay" href="<?= base_url_admin ?>/mailbox/confirm/<?= $item['Id'] ?>">
                                    <img src="<?= base_url ?>/images/stop.png" width="20" height="20" /></a>
                              <?php } ?>
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