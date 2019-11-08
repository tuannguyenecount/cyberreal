
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

    });
</script> 