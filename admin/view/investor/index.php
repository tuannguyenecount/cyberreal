
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
                  <a class="btn btn-success btn-xs" href="<?=base_url_admin?>/investor/create">Thêm Chủ Đầu Tư</a>
               </p>
               <table id="tblData" class="table table-bordered table-middle" method="post">
                  <thead>
                     <tr>
                        <th class="text-center">Số thứ tự</th>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Thao tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($view_data['model'] as $item) { ?>
                     <tr>
                        <td class="text-center">
                           <?= $item['SortOrder'] ?>
                        </td>
                        <td class="text-center">
                           <img src="<?=base_url?>/images/investors/<?= $item['Logo'] ?>" width="128" height="128" /> 
                        </td>
                        <td class="text-center">
                          
                           <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/investor/edit/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Sửa </a>
                          
                           <form class="hidden" id="frmDelete_<?= $item['Id'] ?>" action="<?= base_url_admin ?>/investor/delete" method="post">
                              <input type="hidden" name="Id" value="<?= $item['Id'] ?>" />
                           </form>

                           <button class="btn bg-red btn-xs" onclick="if(confirm('Xác nhận xóa chủ đầu tư này ?')) { document.getElementById('frmDelete_<?= $item['Id'] ?>').submit();  }"><i class="fa fa-remove"></i> Xóa</button>
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