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
            <form method="post">
                <div class="box">
                    <div class="box-body">
                        <?= isset($_GET['messageSuccess']) ? "<p class='text text-success'>".$_GET['messageSuccess']."</p>" : "" ?>
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-8">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-3 text-right">Mật khẩu mới</td>
                                        <td>
                                            <input type="password"  name="NewPassword" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 text-right">Nhập lại mật khẩu mới</td>
                                        <td>
                                            <input type="password"  name="ConfirmNewPassword" class="form-control" />
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-3 text-right"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Cấp lại mật khẩu</button>
                                            <a href="<?=base_url_admin?>/user" class = "btn btn-default btn-sm">Danh sách người dùng</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
