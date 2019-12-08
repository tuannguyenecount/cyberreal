<?php if(isset($_SESSION['UserLogged'])) { ?>
<div class="user-panel">
    <div class="pull-left image">
        <a href="javascript:void(0)"><img width="45" height="45" src="<?=base_url?>/images/users/<?= $_SESSION['UserLogged']['Avatar'] ?>" class="img-circle" /></a>
    </div>
    <div class="pull-left info">
        <p><?= $_SESSION['UserLogged']['UserName'] ?></p>
        <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i><?= $_SESSION['UserLogged']['Role'] ?></a>
    </div>
</div>
<?php } ?>