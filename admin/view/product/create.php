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
                                        <td class="col-md-2">Tên dự án</td>
                                        <td>
                                            <input id="Name" type="text" value="<?= isset($_POST['Name']) ? $_POST['Name'] : "" ?>" name="Name"  class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Bí danh</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Alias']) ? $_POST['Alias'] : "" ?>"  name="Alias" id="Alias" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Loại dự án</td>
                                        <td>
                                            <select class="form-control" name="CategoryId">
                                                <?php foreach($view_data['categories'] as $category) { ?>
                                                    <option <?= isset($_POST['CategoryId']) && $_POST['CategoryId'] == $category['Id'] ? "selected=''" : ""   ?>  value="<?= $category['Id'] ?>"><?= $category['Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Đơn giá</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Price']) ? $_POST['Price'] : ""   ?>"  name="Price" class="form-control" />
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td class="col-md-2">Hình đại diện</td>
                                        <td>
                                            <input type="file" name="file" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hình bổ sung</td>
                                        <td>
                                            <input type="file" name="files[]" multiple="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Diện tích (m2)</td>
                                        <td>
                                            <input type="text" class="form-control" 
                                            value="<?= isset($_POST['Area']) ? $_POST['Area'] : "" ?>" name="Area" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hướng</td>
                                        <td>
                                            <select class="form-control" name="Direction">
                                            <?php foreach($view_data['directions'] as $direction) { ?>
                                                <option <?= isset($_POST['Direction']) && $_POST['Direction'] == $direction['Id'] ? "selected=''" : ""   ?>  value="<?= $direction['Id'] ?>"><?= $direction['Name'] ?></option>
                                            <?php } ?>    
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Xếp hạng</td>
                                        <td>
                                           <input type="text" class="form-control" name="Rank" value="<?= isset($_POST['Rank']) ? $_POST['Rank'] : "" ?>" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="col-md-2">Nhập loại phí</td>
                                        <td>
                                            <table class="table">
                                                <?php foreach($view_data['fees'] as $item) { ?>
                                                    <tr>
                                                        <td><?= $item['Name'] ?></td>
                                                        <td>
                                                            <input type="text" class="form-control" name="Fee<?= $item['Id']?>"  />
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Địa chỉ</td>
                                        <td>
                                           <input type="text" class="form-control" name="Address" value="<?= isset($_POST['Address']) ? $_POST['Address'] : "" ?>" />
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
                                           <select id="District" data-selected="<?= isset($_POST['District']) ? $_POST['District'] : "" ?>"  class="form-control" name="District"> 
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phường/Xã</td>
                                        <td>
                                           <select id="Ward" data-selected="<?= isset($_POST['Ward']) ? $_POST['Ward'] : "" ?>" class="form-control" name="Ward"> 
                                                
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Đường</td>
                                        <td>
                                           <!-- <select id="Street" data-selected="<?= isset($_POST['Street']) ? $_POST['Street'] : "" ?>" name="Street" class="form-control"> 
                                               
                                           </select> -->
                                           <input id="Street" class="form-control" name="Street" value="<?= isset($_POST['Street']) ? $_POST['Street'] : "" ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Thông tin chung</td>
                                        <td>
                                            <textarea id="GeneralInformation" name="GeneralInformation"><?= isset($_POST['GeneralInformation']) ? $_POST['GeneralInformation'] : ""   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Vị trí</td>
                                        <td>
                                            <textarea id="Location" name="Location"><?= isset($_POST['Location']) ? $_POST['Location'] : ""   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Kết cấu</td>
                                        <td>
                                            <textarea id="Structure" name="Structure"><?= isset($_POST['Structure']) ? $_POST['Structure'] : ""   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phí dịch vụ</td>
                                        <td>
                                            <textarea id="ServiceCharge"  name="ServiceCharge"><?= isset($_POST['ServiceCharge']) ? $_POST['ServiceCharge'] : ""   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Ưu điểm</td>
                                        <td>
                                            <textarea id="Advantages" name="Advantages"><?= isset($_POST['Advantages']) ? $_POST['Advantages'] : ""   ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Dự án HOT</td>
                                        <td>
                                           <input type="checkbox" class="form-control" name="HOT" <?= isset($_POST['HOT']) ? "checked" : "" ?> />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Số thứ tự</td>
                                        <td>
                                           <input type="number" style="width:200px" step="1" min="1" class="form-control" name="SortOrder" value="<?= isset($_POST['SortOrder']) ? $_POST['SortOrder'] : "" ?>" />
                                        </td>
                                    </tr>
                                                                   
                                    <tr>
                                        <td class="col-md-2">Trạng thái</td>
                                        <td>
                                            <input  <?= isset($_POST['Status']) ? "checked" : "" ?> type="checkbox" name="Status" value="1" />
                                        </td>
                                    </tr>    

                                    <tr>
                                        <td class="col-md-2">Seo Title</td>
                                        <td>
                                            <input class="form-control" name="SeoTitle" value="<?= isset($_POST['SeoTitle']) ? $_POST['SeoTitle'] : "" ?>" />
                                        </td>
                                    </tr>  

                                    <tr>
                                        <td class="col-md-2">Seo Description</td>
                                        <td>
                                            <textarea rows="5" cols="50" class="form-control" name="SeoDescription"><?= isset($_POST['SeoDescription']) ? $_POST['SeoDescription'] : "" ?></textarea>
                                        </td>
                                    </tr>  

                                    <tr>
                                        <td class="col-md-2">Seo Keyword</td>
                                        <td>
                                            <input class="form-control" name="SeoKeyword" value="<?= isset($_POST['SeoKeyword']) ? $_POST['SeoKeyword'] : "" ?>" />
                                        </td>
                                    </tr>                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="col-md-2"></td>
                                        <td>
                                             <button type="submit" class="btn bg-green btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                            <a href="<?= base_url_admin ?>/product" class = "btn btn-default btn-sm">Về danh sách</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.modal -->
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

