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
                           <th class="text-center">Mã số</th>
                           <th>Tên</th>
                           <th class="col-sm-2">Thứ tự sắp xếp</th>
                           <th>Trạng thái ghim hiện tại</th>
                           <th>Bài viết giới thiệu</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr>
                           <td class="text-center">
                              <?= $item['id'] ?>
                           </td>
                           <td>
                              <?= $item['_name'] ?>
                           </td>
                           <td>
                              <form action="<?= base_url_admin ?>/location/changeSortOrderDistrict/<?= $item['id'] ?>" method="post">
                                 <input type="number" name="sortorder" min="1" step="1" value="<?= $item['sortorder'] ?>" onchange="$(this).parent().submit()" class="form-control" />
                              </form>
                           </td>
                           <td>
                              <?php if($item['ghim'] == false) { ?>
                                 <a href="<?= base_url_admin ?>/location/ghimDistrict/<?= $item['id'] ?>" title="Click vào để chuyển thành ghim" class="btn btn-warning">Không ghim</a>
                              <?php } else { ?>
                                 <a href="<?= base_url_admin ?>/location/removeGhimDistrict/<?= $item['id'] ?>" title="Click vào để bỏ ghim" class="btn btn-success">Đang ghim</a>
                              <?php } ?>
                           </td>
                           <td>
                              <a href="<?= base_url_admin ?>/location/editIntroduceDistrict/<?= $item['id']?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Soạn</a>
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