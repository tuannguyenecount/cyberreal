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
                <input type="hidden" name="Logo" value="<?= $view_data['model']['Logo'] ?>" />
                <div class="box">
                    <div class="box-body">
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-8">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 text-right">Sửa Logo</td>
                                        <td>
                                            <input type="file" name="file" class="form-control" />
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Thứ tự</td>
                                        <td>
                                            <input type="number" min="0" value="<?= isset($_POST['SortOrder']) ? $_POST['SortOrder'] : $view_data['model']['SortOrder'] ?>"   step="1" name="SortOrder" class="form-control" />
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-4 text-right"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Cập Nhật</button>
                                            <a href="<?=base_url_admin?>/investor" class = "btn btn-default btn-sm">Về danh sách</a>
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
