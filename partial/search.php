
<div class="container">
        <div class="overlay-item-top overflow-hidden">
            <div class="card">
                <i class="icon-search icon-background text-blue"></i>
                <div class="card-body pt-2 pb-0">
                    <form action="<?= base_url ?>/tim-kiem.html" method="POST">                    
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control" name="Name" placeholder="Nhập tên tòa nhà, ví dụ: Vincom, Vietcombank, International Plaza...">  
                                <div class="advance-search mt-2" id="advance-search">
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
                                            <select class="form-control" name="Price">
                                                <option value="">Tất cả giá</option>
                                                <option value="duoi1ty">Dưới 1 tỷ</option>
                                                <option value="1den3ty">1 - 3 tỷ</option>
                                                <option value="3den5ty">3 - 5 tỷ</option>
                                                <option value="5den10ty">5 - 10 tỷ</option>
                                                <option value="tren10ty">Trên 10 tỷ</option>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" name="Room">
                                                <option value="">Tất cả số phòng</option>
                                                <option value="1">1 Phòng</option>
                                                <option value="2">2 Phòng</option>
                                                <option value="3">3 Phòng</option>
                                                <option value="4">4 Phòng</option>
                                                <option value="5phongtrolen">5 Phòng trở lên</option>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <input type="text" name="HandoverTime" class="calendar form-control" style="height:38px" placeholder="Thời gian bàn giao" value="Thời gian bàn giao" />                                  
                                        </div>
                                        <!-- <div class="col-md mb-2">
                                            <select class="form-control" id="Ward" name="Ward" data-selected="" >
                                                <option value="">Tất cả phường/xã</option>
                                            </select>                                
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" id="Street" name="Street" data-selected="" style="width:100%">
                                                <option value="">Tất cả đường</option>
                                            </select>
                                        </div> -->
                                        <!-- <div class="w-100"></div> -->
                                        
                                      
                                       <!--  <div class="col-md mb-2">
                                            <select  class="form-control" name="Rank">
                                                <option value="">Tất cả xếp hạng</option>
                                                <?php foreach($view_data['ranks'] as $item) { ?>
                                                    <option value="<?= $item['Rank'] ?>">
                                                        <?= $item['Rank'] ?>    
                                                    </option>
                                                <?php } ?>
                                            </select>                                    
                                        </div> -->
                                        <!-- <div class="col-md mb-2">
                                            <select  class="form-control" name="Rank">
                                                <option value="">Tất cả xếp hạng</option>
                                                <?php foreach($view_data['ranks'] as $item) { ?>
                                                    <option value="<?= $item['Rank'] ?>">
                                                        <?= $item['Rank'] ?>    
                                                    </option>
                                                <?php } ?>
                                            </select>                                    
                                        </div>
                                        <div class="col-md mb-2">
                                            <select class="form-control" name="Direction">
                                                <option value="">Tất cả hướng</option>
                                                <?php foreach($view_data['directions'] as $item) { ?>
                                                    <option value="<?= $item['Id'] ?>"><?= $item['Name'] ?></option>
                                                <?php } ?>
                                            </select>                                    
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-2 text-center pb-1">
                                <button type="submit" class="btn btn-block btn-primary text-uppercase">Tìm kiếm</button>
                                <a class="form-text text-muted small d-block" href="#search-advance">Tìm kiếm nâng cao</a>
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
        $( ".calendar" ).datepicker( $.datepicker.regional[ "vi" ] );
    </script> 