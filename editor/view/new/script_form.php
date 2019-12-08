<script src="<?= base_url?>/editor/ckeditor/ckeditor.js"></script>
<script src="<?= base_url?>/js/functions.js"></script>
<script>
	$(function() {
		CKEDITOR.replace("Content");
		 $('#Title').keyup(function() {
            $('#Alias').val(generateSlug($(this).val()));
        });
	});
</script>