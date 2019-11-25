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
            <form method="post" method="Post" enctype="multipart/form-data">
                <div class="box">
                    <div class="box-body">
                        <?php 
                          $token = NoCSRF::generate( 'csrf_token' );
                        ?>
                        <input type="hidden" name="Id" value="<?= $view_data['model']['Id'] ?>" />
                        <input type="hidden" name="Name_Old" value="<?= $view_data['model']['Name'] ?>"> 
                        <input type="hidden" name="Alias_Old" value="<?= $view_data['model']['Alias'] ?>"> 
                        <input type="hidden" name="Image" value="<?= $view_data['model']['Image'] ?>" />
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-12">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">Tên Dự Án</td>
                                        <td>
                                            <input id="Name" type="text" value="<?= isset($_POST['Name']) ? $_POST['Name'] : $view_data['model']['Name'] ?>" name="Name"  class="form-control" />
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Bí danh</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Alias']) ? $_POST['Alias'] : $view_data['model']['Alias'] ?>"  name="Alias" id="Alias" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Loại Dự Án</td>
                                        <td>
                                            <select class="form-control" name="CategoryId">
                                                <?php foreach($view_data['categories'] as $category) { ?>
                                                    <option <?= isset($_POST['CategoryId']) && $_POST['CategoryId'] == $category['Id'] ? "selected=''" : (!isset($_POST['CategoryId']) && $view_data['model']['CategoryId'] == $category['Id'] ? "selected" : ""  )   ?>  value="<?= $category['Id'] ?>"><?= $category['Name'] ?></option>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Thuộc chuyên mục</td>
                                        <td>
                                            <select required="" class="form-control" name="cat_id">
                                            <?php foreach($view_data['categories'] as $category) { ?>
                                                <option <?= isset($cat_id) && $cat_id == $category['id'] ? "selected='selected'" : "" ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Giá bán</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Price']) ? $_POST['Price'] : $view_data['model']['Price']   ?>"  name="Price" class="form-control" />
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td class="col-md-2">Sửa hình</td>
                                        <td>
                                            <input type="file" name="file" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Diện Tích (m2)</td>
                                        <td>
                                            <input type="text" class="form-control" 
                                            value="<?= isset($_POST['Area']) ? $_POST['Area'] : $view_data['model']['Area'] ?>" name="Area" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hướng</td>
                                        <td>
                                            <select class="form-control" name="Direction">
                                            <?php foreach($view_data['directions'] as $direction) { ?>
                                                <option <?= isset($_POST['Direction']) && 
                                                $_POST['Direction'] == $direction['Id'] ? "selected" : (!isset($_POST['Direction']) && $view_data['model']['Direction'] == $direction['Id'] ? "selected" : "")   ?>  value="<?= $direction['Id'] ?>"><?= $direction['Name']?>
                                                </option>
                                            <?php } ?>    
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Xếp Hạng</td>
                                        <td>
                                           <input type="text" class="form-control" name="Rank" value="<?= isset($_POST['Rank']) ? $_POST['Rank'] : $view_data['model']['Rank'] ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Địa Chỉ</td>
                                        <td>
                                           <input type="text" class="form-control" name="Address" value="<?= isset($_POST['Address']) ? $_POST['Address'] : $view_data['model']['Address'] ?>" />
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
                                           <select id="District" data-selected="<?= isset($_POST['District']) ? $_POST['District'] : $view_data['model']['District'] ?>"  class="form-control" name="District"> 
                                                
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phường/Xã</td>
                                        <td>
                                           <select id="Ward" data-selected="<?= isset($_POST['Ward']) ? $_POST['Ward'] : $view_data['model']['Ward'] ?>" class="form-control" name="Ward"> 
                                                
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Đường</td>
                                        <td>
                                           <select id="Street" data-selected="<?= isset($_POST['Street']) ? $_POST['Street'] : $view_data['model']['Street'] ?>" name="Street" class="form-control"> 
                                               
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Thông tin chung</td>
                                        <td>
                                            <textarea id="GeneralInformation" name="GeneralInformation"><?= isset($_POST['GeneralInformation']) ? $_POST['GeneralInformation'] :  $view_data['model']['GeneralInformation']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Vị trí</td>
                                        <td>
                                            <textarea id="Location" name="Location"><?= isset($_POST['Location']) ? $_POST['Location'] : $view_data['model']['Location']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Kết cấu</td>
                                        <td>
                                            <textarea id="Structure" name="Structure"><?= isset($_POST['Structure']) ? $_POST['Structure'] :  $view_data['model']['Structure']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phí dịch vụ</td>
                                        <td>
                                            <textarea id="ServiceCharge"  name="ServiceCharge"><?= isset($_POST['ServiceCharge']) ? $_POST['ServiceCharge'] : $view_data['model']['ServiceCharge']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Ưu điểm</td>
                                        <td>
                                            <textarea id="Advantages" name="Advantages"><?= isset($_POST['Advantages']) ? $_POST['Advantages'] : $view_data['model']['Advantages']   ?></textarea>
                                        </td>
                                    </tr>
                                                                
                                    <tr>
                                        <td class="col-md-2">Trạng thái</td>
                                        <td>
                                            <input  <?= isset($_POST['Status']) ? "checked" : ($view_data['model']['Status'] == true ? "checked" : "") ?> type="checkbox" name="Status" value="1" />
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
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
