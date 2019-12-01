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
               <p>
                  <button type="button" data-toggle="collapse" data-target="#frmThemHinh" class="btn btn-link"><i class="fa fa-plus"></i> Thêm hình</button>
                  <a class="btn btn-link" href="<?= base_url_admin ?>/product/listcountimages" ><i class="fa fa-back"></i> Trở về</a>
               </p>
               <div id="frmThemHinh" class="collapse">
                  <form action="<?= base_url_admin ?>/product/images/<?= $_GET['id'] ?>" class="form-inline" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label>Chọn file</label>
                        <input type="file" name="files[]" multiple="" required="" class="form-control" />
                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
                     </div>
                  </form>
                  <?php include_once 'view/shared/_errors.php'; ?>
               </div>
               <hr/>
               <div class="table-responsive">
                  <table class="table table-middle" method="post">
                     <thead>
                        <tr>
                           <th class="text-center col-xs-1">Số thứ tự</th>
                           <th class="text-center col-sm-2">Hình ảnh</th>
                           <th class="text-center col-xs-1" ></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr>
                           <td class="text-center">
                              <form method="Post" action="<?= base_url_admin ?>/product/changeOrderNumImage">
                                 <input type="hidden" name="Id" value="<?= $item['Id'] ?>" />
                                 <input type="hidden" name="ProductId" value="<?= $_GET['id'] ?>" />
                                 <input type="number" onkeyup="this.parentNode.submit()" style="width:100px" name="OrderNum" value="<?= $item['OrderNum'] ?>" min="1" step="1" />
                              </form>
                           </td>
                           <td class="text-center"> 
                              <img width="200" height="auto" src="<?= base_url ?>/images/products/slides/<?= $item['Image'] ?>" />
                           </td>
                           <td class="text-center">
                              <form action="<?= base_url_admin ?>/product/deleteimage" method="post">
                                 <input type="hidden" name="Id" value="<?= $item['Id'] ?>"  />
                                 <input type="hidden" name="ProductId" value="<?= $item['ProductId'] ?>" />
                                 <button class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa hình này')">Xóa</button>
                              </form>
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

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#tblData').DataTable({
            ordering: false,
            searching: false,
            lengthChange: false
        });
    });
</script>