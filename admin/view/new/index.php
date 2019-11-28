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
                  <table id="tblData" class="table table-bordered" method="post">
                  <thead>
                     <tr>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th class="text-center">Trạng thái</th>
                        <th>Thành viên tạo</th>
                        <th class="text-center col-sm-2">Thao tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($view_data['model'] as $item) { ?>
                     <tr>
                        <td>
                           <a target="_blank" href="<?=base_url?>/tin-tuc/<?= $item['Alias'] ?>.html"><?= $item['Title'] ?></a>
                        </td>
                        <td>
                           <?= $item['Description'] ?>
                        </td>
                        <td class="text-center">
                           <?php if ($item['Status'] == 1) { ?>
                           <label class="label label-success">Hiển thị</label>
                           <?php } else { ?>
                           <label class="label label-danger">Ẩn</label>
                           <?php } ?>
                        </td>
                        <td>
                           <?= $item['UserCreated'] ?>
                        </td>
                        <td class="text-center">
                           <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/new/edit/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                          
                           <form class="hidden" id="frmDelete_<?= $item['Id'] ?>" action="<?= base_url_admin ?>/new/delete" method="post">
                              <input type="hidden" name="id" value="<?= $item['Id'] ?>" />
                           </form>

                           <button class="btn bg-red btn-xs" onclick="if(confirm('Xác nhận xóa bài viết này?')) { document.getElementById('frmDelete_<?= $item['Id'] ?>').submit();  }"><i class="fa fa-remove"></i> Xóa</button>
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