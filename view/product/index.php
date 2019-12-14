<section class="hero banner-w-search">
    <div class="image image-overlay" style="background-image:url('<?=base_url?>/images/banner.jpg')"></div>
    <div class="container">
        <div class="row">
            <div class="col text-white">
                <h1 class="mb-2">Bạn Đang Muốn Tìm Kiếm Dự Án Như Thế Nào?</h1>
            </div>
        </div>
    </div>
</section>
<section id="search" class="overlay pb-0">
    
</section>
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
        <a class="breadcrumb-back" href="<?= base_url ?>"></a>                    
        <ol class="breadcrumb"><li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
            <li class='breadcrumb-item active'><?= $view_data['title'] ?></li>
        </ol>                
    </div>
</nav>
<div class="container my-3">
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
    <section class="office-listing">
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="width:94%;margin-left:auto; margin-right:auto">
                <?php foreach($view_data['model'] as $item) { ?>
                    <div class="col-md-6 office mb-4" >
                        <div class="card stacked">
                            <div class="image-tools top right show-on-hover">
                                <div class="div_khu_vuc_small"><a title="Bất động sản <?= $item['DistrictName'] ?>" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['DistrictName'])) ?>">TP.HCM <i class="fa fa-angle-right" aria-hidden="true"></i> <?= $item['DistrictName'] ?></a>
                                </div>
                            </div>
                            <div class="card-header p-0 lift">
                                <figure class="figure mb-0">
                                    <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
                                    <img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="" /></a>            
                                    <figcaption class="figure-caption"><?= $item['Price'] ?></figcaption>
                                </figure>
                            </div>
                            <div class="card-body p-1 pt-3">
                                <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                                <p class="address small"><?= $item['Street'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?></p>

                                <ul class="list-group list-group-minimal small">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-box mr-2 text-success fa-lg"></i>
                                        <?= $item['Area'] ?>            
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-compass mr-2 text-success fa-lg"></i>
                                        <?= $item['Direction'] ?>            
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer p-1 small">
                                
                                <a href="<?= base_url ?>/product/select/<?= $item['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>  
                            </div>
                        </div>                            
                    </div>
                <?php } ?>
                </div>
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
                
            </div>
            <div class="col-md-3" id="filter-container">
                
            </div>
        </div>
    </section>
</div> 

 