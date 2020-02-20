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
            <form method="post" method="Post" id="frmEdit" enctype="multipart/form-data">
                <div class="box">
                    <div class="box-body">
                        
                        <input type="hidden" name="Id" value="<?= $view_data['model']['Id'] ?>" />
                        <input type="hidden" name="Name_Old" value="<?= $view_data['model']['Name'] ?>"> 
                        <input type="hidden" name="Alias_Old" value="<?= $view_data['model']['Alias'] ?>"> 
                        <input type="hidden" name="Image" value="<?= $view_data['model']['Image'] ?>" />
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-12">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">Tên dự án</td>
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
                                        <td class="col-md-2">Loại dự án</td>
                                        <td>
                                            <select class="form-control" name="CategoryId">
                                                <?php foreach($view_data['categories'] as $category) { ?>
                                                    <option <?= isset($_POST['CategoryId']) && $_POST['CategoryId'] == $category['Id'] ? "selected=''" : (!isset($_POST['CategoryId']) && $view_data['model']['CategoryId'] == $category['Id'] ? "selected" : ""  )   ?>  value="<?= $category['Id'] ?>"><?= $category['Name'] ?></option>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Năm bàn giao</td>
                                        <td>
                                            <select class="form-control" name="HandoverTime">
                                                <option <?= isset($_POST['HandoverTime']) && $_POST['HandoverTime'] == 2020 ? "selected=''" : (!isset($_POST['HandoverTime']) && $view_data['model']['HandoverTime'] == 2020 ? "selected" : ""  )?>  value="2020">2020</option>
                                                <option <?= isset($_POST['HandoverTime']) && $_POST['HandoverTime'] == 2021 ? "selected=''" : (!isset($_POST['HandoverTime']) && $view_data['model']['HandoverTime'] == 2021 ? "selected" : ""  )?>  value="2021">2021</option>
                                                <option <?= isset($_POST['HandoverTime']) && $_POST['HandoverTime'] == 2022 ? "selected=''" : (!isset($_POST['HandoverTime']) && $view_data['model']['HandoverTime'] == 2022 ? "selected" : ""  )?> value="2022">2022</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td class="col-md-2">Đơn giá / 1m^2 </td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['PriceOn1m2']) ? $_POST['PriceOn1m2'] : $view_data['model']['PriceOn1m2']   ?>"  name="PriceOn1m2" class="form-control" />
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td class="col-md-2">Giá tổng cộng</td>
                                        <td>
                                            <input type="text" value="<?= isset($_POST['Price']) ? $_POST['Price'] : $view_data['model']['Price']   ?>"  name="Price" class="form-control divide" />
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td class="col-md-2">Dự án HOT</td>
                                        <td>
                                           <input type="checkbox"  name="HOT" <?= isset($_POST['HOT']) ? "checked" : ($view_data['model']['HOT'] ? "checked" : "") ?> />
                                        </td>
                                    </tr>
                                                                
                                    <tr>
                                        <td class="col-md-2">Hiển thị</td>
                                        <td>
                                            <input  <?= isset($_POST['Status']) ? "checked" : ($view_data['model']['Status'] == true ? "checked" : "") ?> type="checkbox" name="Status" value="1" />
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Số thứ tự</td>
                                        <td>
                                           <input style="width:200px" type="number" step="1" min="0" class="form-control" name="SortOrder" value="<?= isset($_POST['SortOrder']) ? $_POST['SortOrder'] : $view_data['model']['SortOrder'] ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Sửa hình</td>
                                        <td>
                                            <input type="file" name="file" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Diện tích (m2)</td>
                                        <td>
                                            <input type="text" class="form-control" 
                                            value="<?= isset($_POST['Area']) ? $_POST['Area'] : $view_data['model']['Area'] ?>" name="Area" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Số phòng ngủ</td>
                                        <td>
                                            <input type="number" min="0" step="1" max="128" class="form-control" 
                                            value="<?= isset($_POST['Room']) ? $_POST['Room'] : $view_data['model']['Room'] ?>" name="Room" />
                                        </td>
                                    </tr>
                                 <!--    <tr>
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
                                    </tr> -->
                                   <!--  <tr>
                                        <td class="col-md-2">Xếp hạng</td>
                                        <td>
                                           <input type="text" class="form-control" name="Rank" value="<?= isset($_POST['Rank']) ? $_POST['Rank'] : $view_data['model']['Rank'] ?>" />
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="col-md-2">Các loại phí</td>
                                        <td>
                                            <table class="table table-bordered table-middle">
                                                <?php foreach($view_data['fees'] as $item) { ?>
                                                    <tr>
                                                        <td><?= $item['Name'] ?></td>
                                                        <td>
                                                            <input type="text" class="form-control" name="Fee<?= $item['Id']?>"  value="<?= isset($_POST['Fee'.$item['Id']]) ? $_POST['Fee'.$item['Id']] : $item['Value']  ?>" />
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                             </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Địa chỉ</td>
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
                                          <input id="Street" class="form-control" name="Street" value="<?= isset($_POST['Street']) ? $_POST['Street'] : $view_data['model']['Street']  ?>" />
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
                                        <td class="col-md-2">Tiện ích</td>
                                        <td>
                                            <textarea id="Utilities" name="Utilities"><?= isset($_POST['Utilities']) ? $_POST['Utilities'] :  $view_data['model']['Utilities']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Mặt bằng</td>
                                        <td>
                                            <textarea id="Ground"  name="Ground"><?= isset($_POST['Ground']) ? $_POST['Ground'] : $view_data['model']['Ground']   ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Thông tin giá bán</td>
                                        <td>
                                            <textarea id="PriceInformation" name="PriceInformation"><?= isset($_POST['PriceInformation']) ? $_POST['PriceInformation'] : $view_data['model']['PriceInformation']   ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Seo Title</td>
                                        <td>
                                            <input class="form-control" name="SeoTitle" value="<?= isset($_POST['SeoTitle']) ? $_POST['SeoTitle'] : $view_data['model']['SeoTitle']  ?>" />
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Seo Description</td>
                                        <td>
                                            <textarea rows="5" cols="50" class="form-control" name="SeoDescription"><?= isset($_POST['SeoDescription']) ? $_POST['SeoDescription'] : $view_data['model']['SeoDescription'] ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-2">Seo Keyword</td>
                                        <td>
                                            <input class="form-control" name="SeoKeyword" value="<?= isset($_POST['SeoKeyword']) ? $_POST['SeoKeyword'] : $view_data['model']['SeoKeyword']  ?>" />
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
