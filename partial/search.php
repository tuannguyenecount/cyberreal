
<div class="container">
        <div class="overlay-item-top overflow-hidden">
            <div class="card">
                <i class="icon-search icon-background text-blue"></i>
                <div class="card-body pt-2 pb-0">
                    <form action="<?= base_url ?>/tim-kiem-nang-cao" method="GET">                    
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control" name="s" placeholder="Nhập tên tòa nhà, ví dụ: Vincom, Vietcombank, International Plaza...">  
                                <div class="advance-search mt-2" >
                                    <div class="row">
                                        <div class="col-md mb-2">
                                            <select class="form-control" id="District" name="District" data-selected="">
                                                <option value="">Tất cả quận huyện</option>
                                                <?php foreach($view_data['districts'] as $item) { ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['_name'] ?></option>
                                                <?php } ?>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" id="Ward" name="Ward" data-selected="">
                                                <option value="">Tất cả phường/xã</option>
                                            </select>                                
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" id="Street" name="Street" data-selected="">
                                                <option value="">Tất cả đường</option>
                                            </select>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md mb-2">
                                            <select  class="form-control" name="square">
                                                <option value="">Tất cả diện tích</option>
                                                <?php foreach($view_data['areas'] as $item) { ?>
                                                    <option value="<?= $item['Area'] ?>">
                                                        <?= $item['Area'] ?>    
                                                    </option>
                                                <?php } ?>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" name="price">
                                                <option value="">Tất cả giá</option>
                                                <option>Dưới 1 tỷ VNĐ</option>
                                                <option>Từ 1 tỷ đến dưới 2 tỷ VNĐ</option>
                                                <option>Từ 2 tỷ đến dưới 3 tỷ VNĐ</option>
                                                <option>Từ 3 tỷ đến dưới 5 tỷ VNĐ</option>
                                                <option>Từ 5 tỷ VNĐ trở lên</option>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" name="direction">
                                                <option value="">Tất cả hướng</option>
                                                <?php foreach($view_data['directions'] as $item) { ?>
                                                    <option value="<?= $item['Id'] ?>"><?= $item['Name'] ?></option>
                                                <?php } ?>
                                            </select>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-2 text-center pb-1">
                                <button type="submit" class="btn btn-block btn-success text-uppercase">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>                
                </div>
                <div class="card-footer py-2 separator-top">
                    <div class="tags">
                        <?php foreach($view_data['districts'] as $item) { 
                            $alias = strtolower(vn_to_str($item['_name'])); ?>

                            <a href="<?=base_url?>/can-ho/<?= $alias ?>"><?= $item['_name'] ?></a>     
                        <?php } ?>                 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#Street').select2({
                    theme: "flat",
                });
    </script> 