<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script>
    $(function () {

        if (localStorage.getItem("fbchatclose") == 1) {

            jQuery('.fbchatbox .fb-page').addClass('hide');

            jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat Với Admin').css({ 'bottom': 0 });
        }

        jQuery('#closefbchat').click(function () {
            jQuery('.fbchatbox .fb-page').toggleClass('hide');
            if (jQuery('.fbchatbox .fb-page').hasClass('hide')) {
                localStorage.setItem("fbchatclose", 1);
                jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat Với Admin').css({ 'bottom': 0 });
            }
            else {
                localStorage.setItem("fbchatclose", 0);
                jQuery('#closefbchat').text('Tắt Hỗ Trợ').css({ 'bottom': 299 });
            }
        });

        $(document).ready(function(){
            $('.bxslider').bxSlider({
                auto: true,
                autoControls: false,
                stopAutoOnClick: false,
                pager: false,
                slideWidth: 210,
                minSlides: 1,
                maxSlides: 5,
                slideMargin: 20
            });
            $(".bx-wrapper").mouseover(function(){
                $(".bx-prev").show();
                $(".bx-next").show();
            });
             $(".bx-wrapper").mouseout(function(){
                $(".bx-prev").hide();
                $(".bx-next").hide();
            });
        });

    });
</script> 