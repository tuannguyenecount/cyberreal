<script src="<?= base_url?>/admin/ckeditor/ckeditor.js"></script>
<script src="<?= base_url?>/js/functions.js"></script>
<script>
	$(function() {
		CKEDITOR.replace("GeneralInformation");
		CKEDITOR.replace("Location");
		CKEDITOR.replace("Structure");
		CKEDITOR.replace("ServiceCharge");
        CKEDITOR.replace("Advantages");
	});
</script>
<script>
    $(function(){
        $('#Name').keyup(function() {
            $('#Alias').val(generateSlug($(this).val()));
        });
        $(document).on("change","#Province", function(e){
        	e.preventDefault();
        	$.ajax({
        		cache: true,
        		url: "<?= base_url ?>/location/GetDistrictsByProvince",
        		method: "Post",
        		data: { Province : $(this).val(), dataSelected : $("#District").attr("data-selected") },
        		success: function(result){
        			$("#District").html(result);
        			$("#District").change().bind();
        		}
        	})
        });
        $(document).on("change","#District", function(e){
        	e.preventDefault();
        	$.ajax({
        		cache: true,
        		url: "<?= base_url ?>/location/GetWardsByDistrict",
        		method: "Post",
        		data: { District : $(this).val(), dataSelected : $("#Ward").attr("data-selected") },
        		success: function(result){
        			$("#Ward").html(result);
        			$("#Ward").change().bind();
        		}
        	});

        	$.ajax({
        		cache: true,
        		url: "<?= base_url ?>/location/GetStreetsByDistrict",
        		method: "Post",
        		data: { District : $(this).val(), dataSelected : $("#Street").attr("data-selected") },
        		success: function(result){
        			$("#Street").html(result);
        		}
        	});
        });
        $("#Province").change().bind();
    });
</script>