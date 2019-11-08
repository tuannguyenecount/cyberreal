<!-- @{ 
    string countProductsHide = Html.Action("CountHide", "Product").ToString();
    string countBlogHide = Html.Action("CountHide", "Blog").ToString();
    string CountOrderWaitConfirm = Html.Action("CountOrderWaitConfirm", "Order").ToString();
} -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <?php include '_userpanel.php' ?>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">TRANG QUẢN TRỊ</li>
        <li id="home">
            <a href="<?= base_url_admin ?>/dashboard">
                <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
            </a>
        </li>
        
        <li>
            <a href="<?=base_url_admin?>/project/add">
                <i class="fa fa-plus"></i> <span>Thêm Dự Án</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-red">new</small>
                </span>
            </a>    
        </li>
        
        <li>
            <a href="<?=base_url_admin?>/project">
                <i class="fa fa-newspaper-o"></i> <span>Dự Án</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_admin?>/user">
                <i class="fa fa-user-circle-o"></i> <span>Thành Viên</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_admin?>/popup">
                <i class="fa fa-bullhorn"></i> <span>Bảng Tin</span>
            </a>
        </li>

<!--        <li id="categories">
            <a href="<?= base_url_admin ?>/category">
                <i class="fa fa-book"></i>
                <span>Chuyên Mục Bài Viét</span>
            </a>
        </li>-->

        <li id="news">
            <a href="<?= base_url_admin ?>/new">
                <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
            </a>
        </li>

        <li id="slides">
            <a href="<?= base_url_admin ?>/slide">
                <i class="fa fa-picture-o"></i> <span>Slide </span>
            </a>
        </li>
        
        <li id="mailbox">
            <a href="<?= base_url_admin ?>/mailbox">
                <i class="fa fa-envelope"></i> <span>Hộp Thư Liên Hệ </span>
            </a>
        </li>
        
         <li id="menus">
            <a href="<?= base_url_admin ?>/menu/config">
                <i class="fa fa-cog"></i> <span>Cấu Hình Menu</span>
            </a>
        </li>
        
        <li id="information">
            <a href="<?= base_url_admin ?>/information">
                <i class="fa fa-info"></i> <span>Thông Tin Web </span>
            </a>
        </li>
    
        <li>
            <a href="<?=base_url?>" target="_blank">
                <i class="fa fa-globe"></i> <span>Xem Website</span>
            </a>
        </li>

        <li class="header">QUẢN LÝ CÁ NHÂN</li>
        <li>
            <a href="<?=base_url_admin?>/user/profile">
                <i class="fa fa-user"></i> <span>Hồ Sơ Cá Nhân</span>
            </a>
        </li> 
        <li>
            <a href="<?=base_url_admin?>/user/changepassword">
                <i class="fa fa-key"></i> <span>Đổi Mật Khẩu</span>
            </a>
        </li> 
        <li>
            <form id = "logoutForm" class = "navbar-right" action="<?=base_url_admin?>/account/logout" method="post" >
             </form>
            <a href="javascript:document.getElementById('logoutForm').submit()"><i class="fa fa-sign-out"></i> Đăng xuất</a>
        </li>
    </ul>
</section>
