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
            <form method="post" action="<?= base_url_admin ?>/infoweb/edit" enctype="multipart/form-data">
                <div class="box">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <hr />
                            <?php include_once 'view/shared/_errors.php'; ?>
                            <input type="hidden" name="Logo" value="<?= $view_data['model']['Logo'] ?>" />
                            <div class="form-group">
                                <label class = "control-label col-md-3">Tên website</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="WebName" value="<?= $view_data['model']['WebName'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Logo</label>
                                <div class="col-md-7">
                                    <input type="file" name="file" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Số điện thoại</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="Phone" value="<?= $view_data['model']['Phone'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="Email" value="<?= $view_data['model']['Email'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Địa chỉ</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="Address" value="<?= $view_data['model']['Address'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Fanpage Facebook</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="Fanpage" value="<?= $view_data['model']['Fanpage'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">Google Map</label>
                                <div class="col-md-7">
                                    <textarea rows="5" cols="50" class="form-control" name="GoogleMap"><?= $view_data['model']['GoogleMap'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">CopyRight</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="CopyRight" value="<?= $view_data['model']['CopyRight'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">SEO Title</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="SeoTitle" value="<?= $view_data['model']['SeoTitle'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">SEO Description</label>
                                <div class="col-md-7">
                                    <textarea rows="5" cols="50" class="form-control" name="SeoDescription"><?= $view_data['model']['SeoDescription'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class = "control-label col-md-3">SEO Keyword</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="SeoKeyword" value="<?= $view_data['model']['SeoKeyword'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                    <a class = "btn btn-default btn-sm" href="<?= base_url_admin ?>/infoweb/edit">Trở về</a>
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
