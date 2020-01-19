<script src="<?= base_url?>/admin/ckeditor/ckeditor.js"></script>
<script src="<?= base_url?>/js/functions.js"></script>
<script src="<?= base_url?>/js/jquery.amsify.suggestags.js"></script>
<script>
	$(function() {
		 $('#Title').keyup(function() {
            $('#Alias').val(generateSlug($(this).val()));
        });
		 $('input[name="Tags"]').amsifySuggestags();
	});
</script>

<script type="text/javascript">
	$(function() {
		var ckeditorContent = CKEDITOR.replace("Content");
    	var _changeInterval = null;

	    ckeditorContent.on('change',function(){
	        clearInterval(_changeInterval);
	        _changeInterval = setInterval(function (){
	          $.ajax({
	             url : "<?= base_url_admin ?>/new/updateContent/<?= $_GET['id'] ?>",
	             method: "Post",
	             data: { Content:  ckeditorContent.getData()} ,
	             success: function(result){
	                 console.log(result);
	             },
	             error: function(){
	              console.log("error ajax!");
	             }
	          });
	          clearInterval(_changeInterval);
	        }, 3000)        
	    });	
	});
</script>