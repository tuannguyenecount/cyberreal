<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" id="mobile-menu-icon">
            <i class="fas fa-bars"></i> MENU
        </button>
        <div >
            <ul id="w0" class="navbar-nav mr-auto nav"><li class="nav-item">
                <a class="logo" href="<?= base_url ?>"><img src="<?= base_url ?>/images/<?= $_SESSION['InfoWeb']['Logo'] ?>" alt=""></a>
                
            </ul>                
        </div>
        <ul class="navbar-nav navbar-right" id="main-menu">
            <a class="nav-link" href="<?= base_url ?>"><i class="fas fa-home"></i></a></li>
                <?php foreach($view_data['menuParentHead'] as $menuParent) { ?>
                    <?php $listMenuChild = $menuManager->GetListMenuShowByParentId($menuParent['Id']); ?>
                    <?php if(count($listMenuChild) > 0) { ?>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle nav-link" href="<?= $menuParent['URL'] ?>" data-toggle="dropdown"><?= $menuParent['Name'] ?><span class="fas fa-angle-down"></span></a>
                        <div id="w1" class="dropdown-menu">
                            <?php foreach($listMenuChild as $item) { ?>
                            <div class="col-sm-4">
                            <a class="dropdown-item" href="<?= $item['URL'] ?>"><?= $item['Name'] ?></a></div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $menuParent['URL'] ?>"><?= $menuParent['Name'] ?></a></li>
                    <?php } ?>
                </li>
            <?php } ?>
            <a class="nav-link" href="<?= base_url ?>/hen-di-xem.html">
                <span class="btn btn-blue btn-sm btn-with-ico text-white font-weight-bold"><i class="icon-star"></i> Hẹn đi xem</span>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>/lien-he.html">Liên hệ</a>
            </li>
        </ul>
    </div>
</nav>

<script>
     var b = new Slideout({
        panel: document.getElementById("panel"),
        menu: document.getElementById("main-menu"),
        padding: 256,
        tolerance: 70,
        touch: !1
    });
    $("#mobile-menu-icon").on("click", function() {
        b.toggle();
    });
    $(".close-mobile-menu").on("click", function() {
        b.close();
    });
</script>