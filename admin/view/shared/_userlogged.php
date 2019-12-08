<?php if(isset($_SESSION['UserLogged'])) { ?>
<li class="dropdown user user-menu" style="margin-right:30px">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?=base_url?>/images/users/<?= $_SESSION['UserLogged']['Avatar'] ?>" class="user-image" >
        <span class="hidden-xs"><?= $_SESSION['UserLogged']['UserName'] ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?=base_url?>/images/users/user.png" class="img-circle" >
            <p>
                <?= $_SESSION['UserLogged']['UserName'] ?>
            </p>
             <p>
                <?= $_SESSION['UserLogged']['Role'] ?>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?= base_url_admin ?>/user/changepassword" class="btn btn-default btn-flat">Đổi mật khẩu</a>
            </div>
            <div class="pull-right">
                <form id = "logoutForm" class = "navbar-right" action="<?=base_url_admin?>/account/logout" method="post" >
                </form>
                <a href="javascript:document.getElementById('logoutForm').submit()" class="btn btn-default btn-flat">Đăng xuất</a>
            </div>
        </li>
    </ul>
</li>
<?php } ?>

