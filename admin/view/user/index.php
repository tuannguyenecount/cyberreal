
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
                  <a class="btn btn-success btn-xs" href="<?=base_url_admin?>/user/create">Thêm người dùng mới</a>
               </p>
               <table id="tblData" class="table table-bordered table-middle" method="post">
                  <thead>
                     <tr>
                        <th>Tài khoản</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Phân quyền</th>
                        <th>Thao tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($view_data['model'] as $item) { ?>
                     <tr>
                        <td>
                           <?= $item['UserName'] ?>
                        </td>
                        <td>
                           <?= $item['FullName'] ?>
                        </td>
                        <td>
                           <?= $item['Email'] ?>
                        </td>
                        <td>
                          <a href="tel:<?= $item['Phone'] ?>"><?= $item['Phone'] ?></a>
                        </td>
                        <td>
                          <?= $item['Role'] ?> 
                        </td>
                        <td>
                          <a href="<?= base_url_admin ?>/user/edit&userName=<?= $item['UserName'] ?>" class="btn bg-blue btn-xs">Sửa</a>
                          <form class="hidden" id="frmDelete<?= $item['UserName'] ?>" action="<?= base_url_admin ?>/user/delete" method="post">
                            <input type="hidden" name="UserName" value="<?= $item['UserName'] ?>" />
                          </form>
                          <button type="button" onclick="if(confirm('Xác nhận xoá người dùng này?')) { document.getElementById('frmDelete<?= $item['UserName'] ?>').submit(); } " class="btn bg-red btn-xs">Xoá</button>
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