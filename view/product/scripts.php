<script src="<?= base_url ?>/js/slick/slick.js"></script>
<script src="<?= base_url ?>/js/slideout.min.js"></script>
<script>
    jQuery(function ($) {

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        centerMode: true,
        infinite: true,
        focusOnSelect: true,
        variableWidth: true,
    });

    function changeTabDetail() {
        var detailTab = document.getElementById("detail-tabs");
        var footerOffsetTop = document.getElementsByTagName("footer")[0].offsetTop ;
        if (window.pageYOffset >= 900  && window.pageYOffset  <=  footerOffsetTop - 1000) {
            detailTab.classList.add("detail-tabs-fixed")
        } else {
            detailTab.classList.remove("detail-tabs-fixed");
        }
    }
    $(window).scroll(function() {
        changeTabDetail();
    });
});</script>
