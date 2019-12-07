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
                <input type="hidden" name="UserName" value="<?= $view_data['model']['UserName'] ?>" />
                <div class="box">
                    <div class="box-body">
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-8">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 text-right">Họ tên</td>
                                        <td>
                                            <?= $view_data['model']['FullName'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Email</td>
                                        <td>
                                            <?= $view_data['model']['Email'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Số điện thoại</td>
                                        <td>
                                            <?= $view_data['model']['Phone'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Quyền</td>
                                        <td>
                                            <?= $view_data['model']['Role'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-4 text-right"></td>
                                        <td>
                                            <a href="<?=base_url_admin?>/user/edit&userName=<?= $_SESSION['UserLogged']['UserName'] ?>" class = "btn btn-primary btn-xs">Đổi thông tin</a>
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
