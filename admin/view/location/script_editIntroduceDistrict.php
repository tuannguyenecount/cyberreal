<script src="<?= base_url?>/admin/ckeditor/ckeditor.js"></script>
<script src="<?= base_url?>/js/functions.js"></script>
<script>
	$(function() {
		var ckeditorIntroduce =  CKEDITOR.replace("introduce");
		var _changeInterval = null;

        ckeditorIntroduce.on('change', function() { 
             clearInterval(_changeInterval);
            _changeInterval = setInterval(function (){
               $.ajax({
                       url : "<?= base_url_admin ?>/location/updateIntroduceDistrictAsync/<?= $_GET['id'] ?>",
                       method: "Post",
                       data: { introduce : ckeditorIntroduce.getData() },
                       success: function(data){
                           console.log("Auto save success");
                       },
                       error: function(){
                        console.log("error ajax!");
                       }
                });
               clearInterval(_changeInterval);
            }, 5000);      
        });

	});
</script>