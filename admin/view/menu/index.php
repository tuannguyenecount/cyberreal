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
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAddMenu"><i class="fa fa-plus"></i> Thêm Menu</button>
               </p>
               <div id="tree" class="col-md-8"></div>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>

<div class="modal fade" id="modalAddMenu">
   <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Thêm Menu</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                  <form class="form-horizontal" method="Post" action="<?= base_url_admin ?>/menu/create">
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="Name">Tên menu</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="Name" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="Name">Menu cha</label>
                        <div class="col-sm-9">
                          <select name="MenuParentId" class="form-control">
                           <option value="" >Không có</option>
                           <?php foreach($view_data['model'] as $item) { ?>
                             <option value="<?= $item['Id'] ?>"><?= $item['Name'] ?></option>
                           <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="URL">URL</label>
                        <div class="col-sm-9">          
                          <input type="text" class="form-control"  name="URL" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="SortOrder">Số thứ tự</label>
                        <div class="col-sm-9">          
                          <input type="number" min="1" step="1" class="form-control"  name="SortOrder" />
                        </div>
                      </div>
                      <div class="form-group"> 
                        <div class="col-sm-9 col-sm-offset-3">
                           <div class="checkbox">
                              <label><input type="checkbox" checked name="IsShow" /> Hiển thị</label> 
                           </div>
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Xác Nhận</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                 </form>
                </div>
            </div>
      </div>
        <!-- /.modal-content -->
   </div>
    <!-- /.modal-dialog -->
</div>

<a href="<?= base_url_admin ?>/menu/getEditForm" id="btnModalEditMenu" class="hidden" data-toggle="modal" data-target="#modalEditMenu">Edit</a>

<div class="modal fade modal-ajax" id="modalEditMenu">
   <div class="modal-dialog">
      <div class="modal-content">
         
      </div>
        <!-- /.modal-content -->
   </div>
    <!-- /.modal-dialog -->
</div>