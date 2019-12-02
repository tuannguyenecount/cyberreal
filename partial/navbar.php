<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" id="mobile-menu-icon">
            <i class="fas fa-bars"></i> MENU
        </button>
        <div id="main-menu">
            <ul id="w0" class="navbar-nav mr-auto nav"><li class="nav-item"><a class="nav-link" href="<?= base_url ?>"><i class="fas fa-home"></i></a></li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="/van-phong-cho-thue" data-toggle="dropdown">Căn hộ theo quận<span class="fas fa-angle-down"></span></a>
                    <div id="w1" class="dropdown-menu">
                        <?php foreach($view_data['districts'] as $item) { ?>
                        <a class="dropdown-item" href="<?= base_url?>/can-ho/<?= strtolower(vn_to_str($item['_name'])) ?>"><?= $item['_name'] ?></a>
                        <?php } ?>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="/van-phong-cho-thue" data-toggle="dropdown">Căn hộ trọn gói theo quận<span class="fas fa-angle-down"></span></a>
                    <div id="w1" class="dropdown-menu">
                        <?php foreach($view_data['districts'] as $item) { ?>
                        <a class="dropdown-item" href="<?= base_url?>/can-ho/<?= strtolower(vn_to_str($item['_name'])) ?>"><?= $item['_name'] ?></a>
                        <?php } ?>
                    </div>
                </li>
               <!--  <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="/van-phong-tron-goi" data-toggle="dropdown">Căn Hộ Trọn Gói<span class="fas fa-angle-down"></span></a><div id="w2" class="dropdown-menu"><a class="dropdown-item" href="/van-phong-tron-goi/quan-1-1">Căn Hộ Trọn Gói Quận 1</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-2-1">Căn Hộ Trọn Gói Quận 2</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-3-1">Căn Hộ Trọn Gói Quận 3</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-4-1">Căn Hộ Trọn Gói Quận 4</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-10-1">Căn Hộ Trọn Gói Quận 10</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/phu-nhuan">Văn Phòng Trọn Gói Phú Nhuận</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/binh-thanh">Văn Phòng Trọn Gói Bình Thạnh</a>
                        <a class="dropdown-item" href="/van-phong-tron-goi/tan-binh">Văn Phòng Trọn Gói Tân Bình</a></div></li> -->
                <li class="nav-item"><a class="nav-link" href="<?= base_url ?>/tin-tuc.html">Tin tức</a></li>
            </ul>                
        </div>
        <ul class="navbar-nav navbar-right">
            <a class="nav-link" href="<?= base_url ?>/hen-di-xem.html">
                <span class="btn btn-info btn-sm btn-with-ico text-white font-weight-bold"><i class="icon-star"></i> Hẹn đi xem</span>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>/lien-he.html">Liên hệ</a>
            </li>
        </ul>
    </div>
</nav>