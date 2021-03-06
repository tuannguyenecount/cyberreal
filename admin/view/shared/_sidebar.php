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
        <!-- <li id="home">
            <a href="<?= base_url_admin ?>/dashboard">
                <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
            </a>
        </li>
         -->

        <li>
            <a href="<?=base_url_admin?>/product/create">
                <i class="fa fa-plus"></i> <span>Thêm Dự Án</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                </span>
            </a>    
        </li>
        
        <li>
            <a href="<?=base_url_admin?>/product">
                <i class="fa fa-newspaper-o"></i> <span>Dự Án</span>
                <span class="pull-right-container" >
                    <small class="label pull-right bg-red" id="countProductNotShow" title=""></small>
                </span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_admin?>/product/listcountimages">
                <i class="fa fa-picture-o"></i> <span>Hình Dự Án</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_admin?>/booking">
                <i class="fa fa-calendar"></i> <span>Lịch Hẹn Xem</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-red">hot</small>
                </span>
            </a>    
        </li>

        <li>
            <a href="<?=base_url_admin?>/fee">
                <i class="fa fa-tag"></i> <span>Các Loại Phí</span>
            </a>
        </li>


        <li>
            <a href="<?=base_url_admin?>/popup">
                <i class="fa fa-bullhorn"></i> <span>Bảng Tin</span>
            </a>
        </li>


        <li>
            <a href="<?= base_url_admin ?>/new">
                <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
                <span class="pull-right-container" >
                    <small class="label pull-right bg-red" id="countArticleNotShow" title=""></small>
                </span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/slide">
                <i class="fa fa-picture-o"></i> <span>Slide Hình</span>
            </a>
        </li>
        
        <li>
            <a href="<?= base_url_admin ?>/mailbox">
                <i class="fa fa-envelope"></i> <span>Hộp Thư Liên Hệ</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/mailbox/dangkyxemnhamau">
                <i class="fa fa-envelope"></i> <span>Đăng Ký Xem Nhà Mẫu</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/mailbox/dangkynhanbanggia">
                <i class="fa fa-envelope"></i> <span>Đăng Ký Nhận Bảng Giá</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/mailbox/hoithemthongtin">
                <i class="fa fa-envelope"></i> <span>Hỏi Thêm Thông Tin</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_admin?>/user">
                <i class="fa fa-users"></i> <span>Người Dùng</span>
            </a>
        </li>
        
        <li>
            <a href="<?= base_url_admin ?>/menu">
                <i class="fa fa-cog"></i> <span>Cấu Hình Menu</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/location/districts">
                <i class="fa fa-map"></i> <span>Danh Mục Quận/Huyện</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/advertisement">
                <i class="fa fa-square"></i> <span>Quảng Cáo</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url_admin ?>/investor">
                <i class="fa fa-handshake-o"></i> <span>Chủ Đầu Tư</span>
            </a>
        </li>
        
        <li>
            <a href="<?= base_url_admin ?>/infoweb/edit">
                <i class="fa fa-info"></i> <span>Thông Tin Web</span>
            </a>
        </li>
    
        <li>
            <a href="<?=base_url?>" target="_blank">
                <i class="fa fa-globe"></i> <span>Xem Website</span>
            </a>
        </li>

        <li class="header">TỐI ƯU SEO</li>
        <li>
            <a href="<?= base_url_admin ?>/infoweb/editRobots">
                <i class="fa fa-file"></i> <span>File Robots.txt</span>
            </a>
        </li>
     <!--    <li>
            <a href="<?= base_url_admin ?>/infoweb/sitemap">
                <i class="fa fa-file"></i> <span>Sitemap</span>
            </a>
        </li>
 -->
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
