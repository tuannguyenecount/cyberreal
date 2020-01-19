<section class="content-header">
    <h1>
        <?= $view_data['title'] ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url_editor?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
        <li class="active"><?= $view_data['title'] ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form method="post">
                <div class="box">
                    <div class="box-body">
                        <input type="hidden" name="Title_Old" value="<?= $view_data['model']['Title']?>"> 
                        <input type="hidden" name="Alias_Old" value="<?= $view_data['model']['Alias'] ?>"> 
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-12">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">Tiêu đề</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Title']) ? $_POST['Title'] : $view_data['model']['Title'] ?>"  name="Title" id="Title" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Bí danh</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Alias']) ? $_POST['Alias'] : $view_data['model']['Alias'] ?>"   name="Alias" id="Alias" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Mô tả</td>
                                        <td>
                                            <textarea id="Description" class="form-control" cols="30" name="Description"><?= isset($_POST['Description']) ? $_POST['Description'] : $view_data['model']['Description'] ?> </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Nội dung</td>
                                        <td>
                                            <textarea id="Content" name="Content"><?= isset($_POST['Content']) ? $_POST['Content'] : $view_data['model']['Content'] ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Title</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoTitle']) ? $_POST['SeoTitle'] : $view_data['model']['SeoTitle'] ?>"   name="SeoTitle" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Description</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoDescription']) ? $_POST['SeoDescription'] : $view_data['model']['SeoDescription'] ?>"   name="SeoDescription" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Seo Keyword</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['SeoKeyword']) ? $_POST['SeoKeyword'] : $view_data['model']['SeoKeyword'] ?>"   name="SeoKeyword" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Tags</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Tags']) ? $_POST['Tags'] : $view_data['model']['Tags'] ?>"   name="Tags" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2"></td>
                                        <td>
                                            <label class='text-info'>Nhập tên tag sau đó enter để thêm tag. Có thể nhập nhiều tag trong cùng 1 ô.</label>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-2"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                            <a href="<?= base_url_editor ?>/new" class = "btn btn-default btn-sm">Về danh sách</a>
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
