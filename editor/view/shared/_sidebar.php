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
        <li class="header">TRANG BIÊN TẬP VIÊN</li>

        <li>
            <a href="<?=base_url_editor?>/product/create">
                <i class="fa fa-plus"></i> <span>Thêm Dự Án</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                </span>
            </a>    
        </li>
        
        <li>
            <a href="<?=base_url_editor?>/product">
                <i class="fa fa-newspaper-o"></i> <span>Dự Án</span>
                <span class="pull-right-container" >
                    <small class="label pull-right bg-red" id="countProductNotShow" title=""></small>
                </span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_editor?>/product/listcountimages">
                <i class="fa fa-picture-o"></i> <span>Hình Dự Án</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_editor?>/booking">
                <i class="fa fa-calendar"></i> <span>Lịch Hẹn Xem</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-red">hot</small>
                </span>
            </a>    
        </li>

        <li>
            <a href="<?=base_url_editor?>/popup">
                <i class="fa fa-bullhorn"></i> <span>Bảng Tin</span>
            </a>
        </li>


        <li id="news">
            <a href="<?= base_url_editor ?>/new">
                <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
                <span class="pull-right-container" >
                    <small class="label pull-right bg-red" id="countArticleNotShow" title=""></small>
                </span>
            </a>
        </li>

        <li id="mailbox">
            <a href="<?= base_url_editor ?>/mailbox">
                <i class="fa fa-envelope"></i> <span>Hộp Thư Liên Hệ</span>
            </a>
        </li>

        <li>
            <a href="<?=base_url_editor?>/user">
                <i class="fa fa-users"></i> <span>Người Dùng</span>
            </a>
        </li>
        
        <li>
            <a href="<?=base_url?>" target="_blank">
                <i class="fa fa-globe"></i> <span>Xem Website</span>
            </a>
        </li>

        <li class="header">QUẢN LÝ CÁ NHÂN</li>
        <li>
            <a href="<?=base_url_editor?>/user/profile">
                <i class="fa fa-user"></i> <span>Hồ Sơ Cá Nhân</span>
            </a>
        </li> 
        <li>
            <a href="<?=base_url_editor?>/user/changepassword">
                <i class="fa fa-key"></i> <span>Đổi Mật Khẩu</span>
            </a>
        </li> 
        <li>
            <form id = "logoutForm" class = "navbar-right" action="<?=base_url_editor?>/account/logout" method="post" >
             </form>
            <a href="javascript:document.getElementById('logoutForm').submit()"><i class="fa fa-sign-out"></i> Đăng xuất</a>
        </li>
    </ul>
</section>
