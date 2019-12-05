<div class="modal-header bg-success">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
     <h4 class="modal-title">Sửa Menu</h4>
 </div>
 <div class="modal-body">
    <div class="box-body">
    <form class="form-horizontal" method="Post" action="<?= base_url_admin ?>/menu/edit">
        <input type="hidden" name="Id" value="<?= $view_data['model']['Id'] ?>" />
        <div class="form-group">
          <label class="control-label col-sm-3" for="Name">Tên menu</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="Name" value="<?= $view_data['model']['Name'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="Name">Menu cha</label>
          <div class="col-sm-9">
            <select name="MenuParentId" class="form-control">
              <option value="" <?= $view_data['model']['MenuParentId'] == null ? "selected" : "" ?>  >Không có</option>
             <?php foreach($view_data['menus'] as $item) { if($view_data['model']['Id'] == $item['Id']) continue; ?>

               <option <?= $view_data['model']['MenuParentId'] == $item['Id'] ? "selected" : "" ?> value="<?= $item['Id'] ?>" ><?= $item['Name'] ?></option>
             <?php } ?> 
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="URL">URL</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control"  name="URL" value="<?= $view_data['model']['URL'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="SortOrder">Số thứ tự</label>
          <div class="col-sm-9">          
            <input type="number" min="1" step="1" class="form-control" value="<?= $view_data['model']['SortOrder'] ?>"  name="SortOrder" />
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-9 col-sm-offset-3">
             <div class="checkbox">
                <label><input type="checkbox" name="IsShow" <?= $view_data['model']['IsShow'] == true ? "checked=''" : "" ?> /> Hiển thị</label> 
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

