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
            <div class="box">
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table table-border-none table-middle">
                            <tbody>
                                <tr>
                                    <td class="col-md-2">Tên dự án</td>
                                    <td>
                                        <input id="Name" readonly="" type="text" value="<?= $view_data['model']['Name'] ?>" name="Name"  class="form-control" />
                                </tr>
                                <tr>
                                    <td class="col-md-2">Bí danh</td>
                                    <td>
                                        <input type="text" readonly="" value="<?= $view_data['model']['Alias'] ?>"  name="Alias" id="Alias" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Loại dự án</td>
                                    <td>
                                        <select disabled="" class="form-control" name="CategoryId">
                                            <?php foreach($view_data['categories'] as $category) { ?>
                                                <option <?= $view_data['model']['CategoryId'] == $category['Id'] ? "selected" : ""  ?>   ><?= $category['Name'] ?></option>
                                            <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Đơn giá</td>
                                    <td>
                                        <input type="text" readonly="" value="<?= $view_data['model']['Price'] ?>"  name="Price" class="form-control" />
                                    </td>
                                </tr>    
                                <tr>
                                    <td class="col-md-2">Diện tích (m2)</td>
                                    <td>
                                        <input type="text" readonly="" class="form-control" 
                                        value="<?= $view_data['model']['Area'] ?>" name="Area" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Hướng</td>
                                    <td>
                                        <select disabled="" class="form-control" name="Direction">
                                        <?php foreach($view_data['directions'] as $direction) { ?>
                                            <option <?= $view_data['model']['Direction'] == $direction['Id'] ? "selected" : "" ?>  value="<?= $direction['Id'] ?>"><?= $direction['Name']?>
                                            </option>
                                        <?php } ?>    
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Xếp hạng</td>
                                    <td>
                                       <input type="text" readonly="" class="form-control" name="Rank" value="<?= $view_data['model']['Rank'] ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Các loại phí</td>
                                    <td>
                                        <table class="table">
                                            <?php foreach($view_data['fees'] as $item) { ?>
                                                <tr>
                                                    <td><?= $item['Name'] ?></td>
                                                    <td>
                                                        <input readonly="" type="text" class="form-control" name="Fee<?= $item['Id']?>"  value="<?= $item['Value']  ?>" />
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                         </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Địa chỉ</td>
                                    <td>
                                       <input type="text" readonly="" class="form-control" name="Address" value="<?= $view_data['model']['Address'] ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Tỉnh/Thành</td>
                                    <td>
                                       <select id="Province" readonly="" class="form-control" name="Province"  > 
                                           <option selected="" value="1">TP. Hồ Chí Minh</option>
                                       </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Quận/Huyện</td>
                                    <td>
                                       <select id="District" readonly="" data-selected="<?= isset($_POST['District']) ? $_POST['District'] : $view_data['model']['District'] ?>"  class="form-control" name="District"> 
                                            
                                       </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Phường/Xã</td>
                                    <td>
                                       <select id="Ward" readonly="" data-selected="<?= isset($_POST['Ward']) ? $_POST['Ward'] : $view_data['model']['Ward'] ?>" class="form-control" name="Ward"> 
                                            
                                       </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Đường</td>
                                    <td>
                                      <input id="Street" readonly="" class="form-control" name="Street" value="<?= $view_data['model']['Street'] ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Thông tin chung</td>
                                    <td>
                                        <textarea id="GeneralInformation" readonly="" name="GeneralInformation"><?= $view_data['model']['GeneralInformation']   ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Vị trí</td>
                                    <td>
                                        <textarea id="Location" readonly="" name="Location"><?= $view_data['model']['Location']   ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Kết cấu</td>
                                    <td>
                                        <textarea id="Structure" readonly="" name="Structure"><?=  $view_data['model']['Structure']  ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Phí dịch vụ</td>
                                    <td>
                                        <textarea id="ServiceCharge" readonly="" name="ServiceCharge"><?= $view_data['model']['ServiceCharge']   ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Ưu điểm</td>
                                    <td>
                                        <textarea id="Advantages" readonly="" name="Advantages"><?= $view_data['model']['Advantages']   ?></textarea>
                                    </td>
                                </tr>
                                                            
                                <tr>
                                    <td class="col-md-2">Trạng thái</td>
                                    <td>
                                        <input readonly="" <?= $view_data['model']['Status'] == true ? "checked" : "" ?> type="checkbox" name="Status" value="1" />
                                </tr>

                                <tr>
                                        <td class="col-md-2">Seo Title</td>
                                        <td>
                                            <input class="form-control" readonly="" name="SeoTitle" value="<?=  $view_data['model']['SeoTitle']  ?>" />
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Seo Description</td>
                                        <td>
                                            <textarea rows="5" cols="50" readonly="" class="form-control" name="SeoDescription"><?= $view_data['model']['SeoDescription'] ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Seo Keyword</td>
                                        <td>
                                            <input class="form-control" readonly="" name="SeoKeyword" value="<?=  $view_data['model']['SeoKeyword']  ?>" />
                                    </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="col-md-2"></td>
                                    <td>
                                        <a href="<?= base_url_editor ?>/product/edit/<?= $view_data['model']['Id'] ?>" class = "btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                        <a href="<?= base_url_editor ?>/product" class = "btn btn-default btn-sm">Về danh sách</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
