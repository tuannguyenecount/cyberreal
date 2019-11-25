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
                        <?php 
                          $token = NoCSRF::generate( 'csrf_token' );
                        ?>
                        <!-- <input type="hidden" name="csrf_token" value="<?= $token ?>">  -->
                        <?php include_once 'view/shared/_errors.php'; ?>
                        <div class="col-md-12">
                            <table class="table table-border-none table-middle">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">Tên Dự Án</td>
                                        <td>
                                            <input id="Name" type="text" value="<?= isset($name) ? $name : "" ?>"  name="Name"  class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Bí danh</td>
                                        <td>
                                            <input type="text" value="<?= isset($alias) ? $alias : "" ?>"  name="Alias" id="Alias" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Loại Dự Án</td>
                                        <td>
                                            <select class="form-control" name="CategoryId">
                                                <?php foreach($view_data['categories'] as $category) { ?>
                                                    <option value="<?= $category['Id'] ?>"><?= $category['Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hình ảnh</td>
                                        <td>
                                            <input type="file" name="file" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Diện Tích (m2)</td>
                                        <td>
                                            <input type="text" class="form-control" name="Area" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Hướng</td>
                                        <td>
                                            <select class="form-control" name="Direction">
                                            <?php foreach($view_data['directions'] as $direction) { ?>
                                                <option value="<?= $direction['Id'] ?>"><?= $direction['Name'] ?></option>
                                            <?php } ?>    
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Xếp Hạng</td>
                                        <td>
                                           <input type="text" class="form-control" name="Rank" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Địa Chỉ</td>
                                        <td>
                                           <input type="text" class="form-control" name="Address" />
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
                                           <select id="District" class="form-control" name="District"> 
                                                
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phường/Xã</td>
                                        <td>
                                           <select id="Ward" class="form-control" name="Ward"> 
                                                
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Đường</td>
                                        <td>
                                           <select id="Street" name="Street" class="form-control"> 
                                               
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Thông tin chung</td>
                                        <td>
                                            <textarea id="GeneralInformation" name="GeneralInformation"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Vị trí</td>
                                        <td>
                                            <textarea id="Location" name="Location"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Kết cấu</td>
                                        <td>
                                            <textarea id="Structure" name="Structure"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Phí dịch vụ</td>
                                        <td>
                                            <textarea id="ServiceCharge" name="ServiceCharge"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Ưu điểm</td>
                                        <td>
                                            <textarea id="Advantages" name="Advantages"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2">Giá bán</td>
                                        <td>
                                            <input type="text"  name="Price" class="form-control" />
                                        </td>
                                    </tr>                                
                                    <tr>
                                        <td class="col-md-2">Trạng thái</td>
                                        <td>
                                            <input  checked="" type="checkbox" name="Status" value="1" />
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
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
