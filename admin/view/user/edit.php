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
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="UserName" value="<?= $view_data['model']['UserName'] ?>" />
                <input type="hidden" name="Avatar" value="<?= $view_data['model']['Avatar'] ?>" />
                <div class="box">
                    <div class="box-body">
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-8">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 text-right">Họ tên</td>
                                        <td>
                                            <input type="text" name="FullName" value="<?= isset($_POST['FullName']) ? $_POST['FullName'] : $view_data['model']['FullName']  ?>" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Email</td>
                                        <td>
                                            <input type="email" name="Email" value="<?= isset($_POST['Email']) ? $_POST['Email'] : $view_data['model']['Email'] ?>" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Số điện thoại</td>
                                        <td>
                                            <input type="text" name="Phone" value="<?= isset($_POST['Phone']) ? $_POST['Phone'] : $view_data['model']['Phone'] ?>" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Sửa Hình đại diện</td>
                                        <td>
                                            <input type="file" name="file" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Quyền</td>
                                        <td>
                                            <select class="form-control" name="Role">
                                                <option value="1" <?= $view_data['model']['Role'] == "Biên Tập Viên" ? "selected" : "" ?> >Biên tập viên</option>
                                                <option value="2" <?= $view_data['model']['Role'] == "Quản Trị Viên" ? "selected" : "" ?>>Quản trị viên</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-4 text-right"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                            <a href="<?=base_url_admin?>/user" class = "btn btn-default btn-sm">Về danh sách</a>
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
