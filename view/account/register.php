<?php
    $token = NoCSRF::generate('csrf_token');
?>
<div class="register-box">
    <div class="register-logo">
      <a href="<?= base_url ?>"><b>VOLAMPK</b>.NET</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Đăng ký thành viên</p>

      <form method="post" novalidate="">
        <?php include_once 'view/shared/_errors.php'; ?>
        <input type="hidden" name="csrf_token" value="<?= $token ?>" />
        <?php if(isset($_GET['messageSuccess'])) { ?>
        <div class="alert alert-success">
            <?= $_GET['messageSuccess'] ?>
        </div>
        <?php } ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" minlength="6" maxlength="20" id="UserName" name="UserName" placeholder="Tên tài khoản" value="<?= isset($_POST['UserName']) ? $_POST['UserName'] : ""  ?>">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
           <input class="form-control" minlength="6" placeholder="Mật khẩu cấp 1"  id="Password" name="Password" required="required" type="password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input class="form-control"   id="PasswordConfirm" placeholder="Xác nhận mật khẩu cấp 1" name="PasswordConfirm" type="password" />
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
         <div class="form-group has-feedback">
           <input class="form-control" id="Password2" placeholder="Mật khẩu cấp 2" name="Password2" required="required" type="password" />  
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input class="form-control" id="Password2Confirm" placeholder="Xác nhận mật khẩu cấp 2" name="Password2Confirm" type="password" />
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input class="form-control" maxlength="20"  id="Phone" name="Phone" placeholder="Số điện thoại" required="required" type="text" value="<?= isset($_POST['Phone']) ? $_POST['Phone'] : ""  ?>" />
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
             <div class="g-recaptcha" data-sitekey="6LffNIMUAAAAAGs9p6V_MLgUWplCDIFhPlmh-LOp"></div>               
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br/>
      <a href="<?=base_url?>/account/login" class="text-center">Trở về trang Đăng nhập</a>
    </div>
    <!-- /.form-box -->
  </div>

<?php if(count($view_data['errors']) > 0) { ?>
    <div class="modal" id="modal-errors" role="dialog" aria-hidden="true" data-modal>
        <div class="modal-content">
            <div class="modal-header">
                <button role="button" class="icon-close" aria-label="close-modal" data-modal="close-modal">X</button>
                <h2 class="modal-title" style="color:#c80209"><a href="javascript:void(0)">Lỗi</a></h2>
            </div>
                <div class="modal-body" style="font-size:14px">
                    <?= ConvertListErrorToString($view_data['errors']); ?>
                </div>
                <div class="modal-footer">
                    <button role="button" class="btn-close" aria-label="close-modal" data-modal="close-modal">Đóng</button>
                </div>
        </div>
    </div>
<?php } ?>
<button role="button" class="btn hide" id="openModal"  aria-label="open-modal" data-modal="open-modal">Open Modal</button>
<!-- <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="POST" id="formDangky" novalidate="novalidate">
            <div class="panel panel-red">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Đăng ký thành viên</h3>
                </div>
                <div class="panel-body">
                    <?php include_once 'view/shared/_errors.php'; ?>
                    <input type="hidden" name="csrf_token" value="<?= $token ?>" />
                    <?php if(isset($_GET['messageSuccess'])) { ?>
                    <div class="alert alert-success">
                        <?= $_GET['messageSuccess'] ?>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="username" data-tooltip="true" title="">Tên tài khoản <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Tên tài khoản không được bỏ trống)</em></label>
                        <input class="form-control" minlength="6" maxlength="20" id="UserName" name="UserName" required="required" type="text" value="<?= isset($_POST['UserName']) ? $_POST['UserName'] : ""  ?>" />
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="Password">Mật khẩu cấp 1 <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Mật khẩu cấp 1 không được bỏ trống)</em></label>
                        <input class="form-control" minlength="6"  id="Password" name="Password" required="required" type="password" />
                    </div>
                    <div class="form-group">
                        <label for="PasswordConfirm" data-tooltip="true" >Xác nhận mật khẩu cấp 1 <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Xác nhận mật khẩu cấp 1 không được bỏ trống)</em></label>
                        <input class="form-control"   id="PasswordConfirm" name="PasswordConfirm" type="password" />
                    </div>
                    <div class="form-group">
                        <label for="Password2" data-tooltip="true" title="" data-original-title="Mật khẩu cấp 2 không được bỏ trống">Mật khẩu cấp 2 <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Mật khẩu cấp 2 không được bỏ trống)</em></label>
                        <input class="form-control" id="Password2" name="Password2" required="required" type="password" />                        
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="Password2Confirm" data-tooltip="true" title="">Nhập lại mật khẩu cấp 2 <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Nhập lại mật khẩu cấp 2 không được bỏ trống)</em></label>
                        <input class="form-control" id="Password2Confirm" name="Password2Confirm" type="password" />
                       
                    </div>
                    <div class="form-group">
                        <label for="phone" data-tooltip="true" title="" data-original-title="Số điện thoại không được bỏ trống">Điện thoại <i class="fa fa-question-circle-o text-danger"></i> <em class="text-danger">(Số điện thoại không được bỏ trống)</em></label>
                        <input class="form-control" maxlength="20"  id="Phone" name="Phone" required="required" type="text" value="<?= isset($_POST['Phone']) ? $_POST['Phone'] : ""  ?>" />
                       
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LffNIMUAAAAAGs9p6V_MLgUWplCDIFhPlmh-LOp"></div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-danger">Đăng ký</button>
                        <a class="btn btn-default" onclick="return confirm('Xác nhận huỷ đăng ký và trở về trang chủ?')" href="<?= base_url ?>">Trở về</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> -->