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
               <?php 
                  $token = NoCSRF::generate( 'csrf_token' );
               ?>
               
               <div class="table-responsive">
                  <table id="tblData" class="table table-bordered table-middle" method="post">
                     <thead>
                        <tr>
                           <th class="hidden">Mã số</th>
                           <th class="text-center">Hình ảnh</th>
                           <th>Tên dự án</th>
                           <th>Loại dự án</th>
                           <th>Quận/Huyện</th>
                           <th>Phường/Xã</th>
                           <th>Đường</th>
                           <th class="text-center">HOT</th>
                           <th class="text-center">Trạng thái</th>
                           <th class="text-center col-md-2">Thao tác</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr>
                           <td class="hidden"><?= $item['Id'] ?></td>
                           <td class="text-center">
                             <!--  <a href="<?= base_url ?>/images/products/<?= $item['Image'] ?>" target="_blank">Xem hình</a> -->
                              <img src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" width="80" height="auto" />
                           </td>
                           <td>
                              <b><a target="_blank" href="<?=base_url?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></b>
                           </td>
                          
                           <td>
                              <?= $item['CategoryName'] ?>
                           </td> 
                           <td><?= $item['DistrictName'] ?></td>
                           <td><?= $item['WardName'] ?></td>
                           <td><?= $item['Street'] ?></td>
                           <td class="text-center">
                              <?php if ($item['HOT']) { ?>
                              
                              <label class="label label-danger">HOT</label>
                              <?php } else { ?>
                              <label class="label label-default">Không</label>
                              <?php } ?>
                           </td>
                           <td class="text-center">
                              <?php if ($item['Status']) { ?>
                              
                              <label class="label label-success">Hiển thị</label>
                              <?php } else { ?>
                              <label class="label label-danger">Ẩn</label>
                              <?php } ?>
                           </td>
                           <td class="text-center">
                              <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/product/details/<?= $item['Id'] ?>"><i class="fa fa-eyes"></i> Xem</a>

                              <a class="btn bg-blue btn-xs" href="<?= base_url_admin ?>/product/edit/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                             
                              <form class="hidden" id="frmDelete_<?= $item['Id'] ?>" action="<?= base_url_admin ?>/product/delete" method="post">
                                 <input type="hidden" name="Id" value="<?= $item['Id'] ?>" />
                              </form>
                              <button class="btn bg-red btn-xs" onclick="if(confirm('Xác nhận xóa dự án <?= $item['Name'] ?> ?')) { document.getElementById('frmDelete_<?= $item['Id'] ?>').submit();  }"><i class="fa fa-remove"></i> Xóa</button>
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