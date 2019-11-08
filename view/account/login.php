<div class="login-box">
   <div class="login-logo">
      <a href="<?= base_url ?>"><b>VOLAMPK</b>.NET</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
      <p class="login-box-msg">Đăng nhập vào trang quản lý tài khoản của bạn</p>
      <form action="<?= base_url ?>/account/login" method="post" id="formDangnhap">
         <?php 
            $token = NoCSRF::generate( 'csrf_token' );
            ?>
         <input type="hidden" name="csrf_token" value="<?= $token ?>">   
         <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Tài khoản">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
         </div>
         <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
            </div>
            <!-- /.col -->
         </div>
         <div class="row">
            <div class="col-xs-6 text-left">
                  <br/>
                  <a href="<?= base_url ?>/account/reset">Quên mật khẩu? </a>
            </div>
            <div class="col-xs-6 text-right">
                  <br/>
                  <a href="<?= base_url ?>/account/register" class="text-center">Đăng ký thành viên</a>
            </div>
            <?php include_once 'view/shared/_errors.php'; ?>
         </div>
      </form>
   </div>
   <!-- /.login-box-body -->
</div>