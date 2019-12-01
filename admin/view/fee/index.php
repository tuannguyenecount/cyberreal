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
               <p>
                  <a class="btn btn-success btn-xs" href="<?=base_url_admin?>/fee/create">Thêm Mới</a>
               </p>
               <table id="tblData" class="table table-bordered" method="post">
                  <thead>
                     <tr>
                        <th>Tên loại phí</th>
                        <th>Ngày tạo</th>
                        <th class="text-center">Thao tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($view_data['model'] as $item) { ?>
                     <tr>
                        <td><?= $item['Name'] ?></td>
                        <td>
                           <?= $item['CreatedDate'] ?>
                        </td>
                        <td class="text-center">                    
                           <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/fee/edit/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                           <form class="hidden" id="frmDelete_<?= $item['Id'] ?>" action="<?= base_url_admin ?>/fee/delete" method="post">
                              <input type="hidden" name="Id" value="<?= $item['Id'] ?>" />
                           </form>
                           <button class="btn bg-red btn-xs" onclick="if(confirm('Xác nhận xóa loại phí <?= $item['Name'] ?> ?')) { document.getElementById('frmDelete_<?= $item['Id'] ?>').submit();  }"><i class="fa fa-remove"></i> Xóa</button>
                        </td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>