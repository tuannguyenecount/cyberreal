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
                        <div class="col-md-12">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">Tiêu đề</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Title']) ? $_POST['Title'] : "" ?>"  name="Title" id="Title" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Bí danh</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Alias']) ? $_POST['Alias'] : "" ?>"   name="Alias" id="Alias" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Mô tả</td>
                                        <td>
                                            <textarea id="Description" class="form-control" cols="30" name="Description"><?= isset($_POST['Description']) ? $_POST['Description'] : "" ?> </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hình ảnh (Size 600x400)</td>
                                        <td>
                                            <input type="file" name="file" required="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Nội dung</td>
                                        <td>
                                            <textarea class="form-control" cols="30" name="Content"><?= isset($_POST['Content']) ? $_POST['Content'] : "" ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Trạng thái</td>
                                        <td>
                                            <input <?= isset($_POST['Status']) && $_POST['Status'] == 1 ? "checked='checked'" : "" ?> type="checkbox" name="Status" value="1" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Title</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoTitle']) ? $_POST['SeoTitle'] : "" ?>"   name="SeoTitle" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Description</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoDescription']) ? $_POST['SeoDescription'] : "" ?>"   name="SeoDescription" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Keyword</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoKeyword']) ? $_POST['SeoKeyword'] : "" ?>"   name="SeoKeyword" class="form-control" />
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-2"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                            <a href="<?= base_url_admin ?>/new" class = "btn btn-default btn-sm">Về danh sách</a>
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
<script>
    $(function(){
        $('#Title').keyup(function() {
            $('#Alias').val(generateSlug($(this).val()));
        });
    });
</script>