
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
                  <a class="btn btn-success btn-xs" href="<?=base_url_admin?>/slide/create">Thêm slide mới</a>
               </p>
               <table id="tblData" class="table table-bordered table-middle" method="post">
                  <thead>
                     <tr>
                        <th>Số thứ tự</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Trạng thái hiện tại</th>
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
                           <img src="<?=base_url?>/images/slides/<?= $item['Image'] ?>" width="300" height="auto" /> 
                        </td>
                        <td class="text-center">
                           <?php if ($item['Status']) { ?>
                              <a style="display: block;" title="Cập nhật trạng thái thành Ẩn" href="<?= base_url_admin ?>/slide/unconfirm/<?= $item['Id'] ?>"> 
                                 <img src="<?= base_url ?>/images/check.png" width="20" height="20" /><br/>
                                 <span class="text-success">Hiển thị</span>
                              </a>
                           <?php } else { ?>
                              <a style="display: block;" title="Cập nhật trạng thái thành Hiển thị" href="<?= base_url_admin ?>/slide/confirm/<?= $item['Id'] ?>">
                                 <img src="<?= base_url ?>/images/stop.png" width="20" height="20" /><br/>
                                 <span class="text-danger">Đang bị ẩn</span>
                              </a>
                           <?php } ?>
                        </td>
                       
                        <td class="text-center">
                          
                           <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/slide/edit/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Sửa </a>
                          
                           <form class="hidden" id="frmDelete_<?= $item['Id'] ?>" action="<?= base_url_admin ?>/slide/delete" method="post">
                              <input type="hidden" name="id" value="<?= $item['Id'] ?>" />
                           </form>

                           <button class="btn bg-red btn-xs" onclick="if(confirm('Xác nhận xóa  hình này ?')) { document.getElementById('frmDelete_<?= $item['Id'] ?>').submit();  }"><i class="fa fa-remove"></i> Xóa</button>
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