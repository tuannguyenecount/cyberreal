<section class="content-header">
    <h1>
        <?= $view_data['title'] ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url_admin ?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
        <li class="active"><?= $view_data['title'] ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" >
                <div class="box">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <hr />
                            <?php include_once 'view/shared/_errors.php'; ?>
                            <div class="form-group">
                                <label class = "control-label col-md-3">Nội dung</label>
                                <div class="col-md-7">
                                    <textarea rows="10" cols="50" class="form-control" name="Content"><?= $view_data['model'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                    <a class = "btn btn-default btn-sm" href="<?= base_url_admin ?>/infoweb/editRobots">Trở về</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
