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
                <div class="box">
                    <div class="box-body">
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-8">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 text-right">Chọn hình</td>
                                        <td>
                                            <input type="file" required="" name="file" class="form-control" />
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Thứ tự</td>
                                        <td>
                                            <input type="number" min="0" value="<?= isset($_POST['SortOrder']) ? $_POST['SortOrder'] : "" ?>"   step="1" name="SortOrder" class="form-control" />
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 text-right">Trạng thái</td>
                                        <td>
                                            <input <?= isset($_POST['Status']) && $_POST['Status'] == 1 ? "checked='checked'" : "" ?> type="checkbox" name="Status"  />
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-4 text-right"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                            <a href="<?=base_url_admin?>/slide" class = "btn btn-default btn-sm">Về danh sách</a>
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
