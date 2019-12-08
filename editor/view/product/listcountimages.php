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
               <div class="table-responsive">
                  <table id="tblData" class="table table-bordered table-middle" method="post">
                     <thead>
                        <tr>
                           <th class="hidden">Mã số</th>
                           <th>Tên dự án</th>
                           <th class="text-center">Số hình</th>
                           <th class="text-center"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_data['model'] as $item) { ?>
                        <tr>
                           <td class="hidden"><?= $item['Id'] ?></td>
                           <td>
                              <a target="_blank" href="<?=base_url?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a>
                           </td>
                           <td class="text-center">
                              <span class="badge"> <?= $item['CNT'] ?> </span>
                           </td>
                           <td class="text-center">
                              <a class="btn bg-blue btn-xs" href="<?= base_url_editor ?>/product/images/<?= $item['Id'] ?>"><i class="fa fa-edit"></i> Quản lý</a>
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