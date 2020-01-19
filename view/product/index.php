<!-- <section class="hero banner-w-search">
    <div class="image image-overlay" style="background-image:url('<?=base_url?>/images/banner.jpg')"></div>
    <div class="container">
        <div class="row">
            <div class="col text-white">
                <h1 class="mb-2">Bạn Đang Muốn Tìm Kiếm Dự Án Như Thế Nào?</h1>
            </div>
        </div>
    </div>
</section> -->
<!-- <section id="search" class="overlay pb-0">
    
</section> -->
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
        <a class="breadcrumb-back" href="<?= base_url ?>"></a>                    
        <ol class="breadcrumb"><li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
            <li class='breadcrumb-item active'><?= $view_data['title'] ?></li>
        </ol>                
    </div>
</nav>
<div class="container my-3">
    <section class="office-listing">
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="width:94%;margin-left:auto; margin-right:auto">
                <?php foreach($view_data['model'] as $item) { ?>
                    <div class="col-md-6 office mb-4 project-box" >
                        <div class="card stacked">
                            <div class="image-tools top right show-on-hover ">
                                <div class="div_khu_vuc_small"><a title="Bất động sản <?= $item['DistrictName'] ?>" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['DistrictName'])) ?>"> <?= $item['DistrictName'] ?></a>
                                </div>
                            </div>
                            <div class="card-header p-0 lift img-project-box">
                                <figure class="figure mb-0">
                                    <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
                                    <img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="" /></a>            
                                  
                                    <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" class="storylink">
                                        <div class="hover-div">
                                          <div>
                                            <h2><?= $item['Name'] ?></h2>
                                              <div class="contnt">
                                                  <ul>
                                                    <li>Đường
                                            <?= $item['Street'] ?>,
                                                <?= $item['WardName'] ?>,
                                                    <?= $item['DistrictName'] ?></li>
                                                    <li>Chủ đầu tư Khang Điền</li>
                                                    <li>Giá từ <?= $item['Price'] / 1000000000 >= 1 ? number_format($item['Price'] / 1000000000)." tỷ " : number_format($item['Price'] / 1000000 )  . " triệu"  ?>/căn</li>
                                                    <li>Ngày bàn giao: <?= $item['HandoverTime'] ?></li>
                                                  </ul>                             
                                              </div>
                                              <span class="readmore-story">XEM THÊM <img src="https://nhatpham.net/wp-content/plugins/skycodec-elementor/assets/images/b-arrow.png" alt=""></span>
                                          </div>
                                        </div>
                                  </a>  
                                </figure>
                            </div>
                            <div class="card-body p-1 pt-3">
                                <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                                <p>
                                    <i class="fa fa-map-marker"></i>
                                Đường
                                  <?= $item['Street'] ?>,
                                      <?= $item['WardName'] ?>,
                                          <?= $item['DistrictName'] ?>
                                <br/>
                                    <b>Giá: <?= $item['PriceOn1m2'] ?> / m<sup>2</sup></b>
                                </p>

                            </div>
                            <div class="card-footer p-1">
                                
                                <a href="<?= base_url ?>/product/select/<?= $item['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>  
                            </div>
                        </div>                            
                    </div>
                <?php } ?>
                </div>
                <?php if(isset($view_data['page'])) { ?>
                <div class="row text-center" style="width:95%;margin-left:auto; margin-right:auto">
                    <ul class="pagination" style="margin: 0 auto">
                        <?php if($view_data['page'] <= 1) { ?>
                        <li class="page-item disabled"><span class="page-link">«</span></li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="<?= $view_data['urlCurrent'] ?>&page=<?= $view_data['page'] - 1 ?>">«</a></li>
                        <?php } ?>

                        <?php for($i = 1; $i <= $view_data['totalPage']; $i++) { ?>
                        <li class="page-item <?= $i == $view_data['page'] ? "active" : "" ?>"><a class="page-link" href="<?= $view_data['urlCurrent'] ?>&page=<?= $i ?>" ><?= $i ?></a></li>
                        <?php } ?>

                        <?php if($view_data['page'] < $view_data['totalPage']) { ?>
                        <li class="page-item"><a class="page-link" href="<?= $view_data['urlCurrent'] ?>&page=<?= $view_data['page'] + 1 ?>" >»</a></li>
                        <?php } else {  ?>
                             <li class="page-item disabled"><span class="page-link">»</span></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php  } ?>

                <?php if(isset($view_data['description']) && !empty($view_data['description'])) { ?>
                <section class="desc">
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10">
                            <h1 class="text-center"></h1>
                            <article class="description">
                                <div class="show-less-content" id="category-description" data-max-height="200">
                                    <?= $view_data['description'] ?>
                                </div>

                                <div data-target="#category-description" class="show-less text-center" style="display:none">
                                    <span class="btn btn-outline-secondary">Thu gọn</span>
                                </div>
                                <div data-target="#category-description" class="show-more text-center" style="display:none">
                                    <span class="btn btn-outline-secondary">Xem thêm</span>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
                <?php } ?>
            </div>

            <div class="col-md-3" id="filter-container">
                
            </div>
        </div>
    </section>

</div> 

 