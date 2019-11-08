<script src="<?=base_url?>/js/modelo.js"></script>
<?php if(count($view_data['errors']) > 0) { ?>
    <script>
        $('#modal-errors').modelo();
        $("#openModal").click();
    </script>
<?php } ?>