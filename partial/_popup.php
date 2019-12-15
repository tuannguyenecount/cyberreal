<div class="md-container md-effect-4" id="modal-4" style="z-index:999999; top: 20% !important; perspective: none;">
    <div class="md-content" style="background:#fff;color:#000">
        <h3  style="font-size:1.8em; background:#3162ad;color:#fff">Bảng Tin</h3>
        <button class="md-close" style="
                position:absolute;
                right: 10px;
                top: 12px;background:#ccc;color:#333
                ">
            X
        </button>
        <div>
            <?= $view_data['model']['Content'] ?>
            <button class="md-close" style="background:#ccc;color:#333">Đóng</button>
        </div>
    </div>
</div>
<script src="<?=base_url?>/assets/js/jquery.niftymodals.js"></script>
<script>
    setTimeout(function () {
        $("#modal-4").niftyModal();
    }, <?= $view_data['model']['Timeout'] * 1000 ?>);
    sessionStorage.setItem('ShowPopUp', "no");
</script>