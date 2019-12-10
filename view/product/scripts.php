<script src="<?= base_url ?>/js/slick/slick.js"></script>
<script src="<?= base_url ?>/js/slideout.min.js"></script>

<script>jQuery(function ($) {

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
});</script>
