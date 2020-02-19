<script src="<?= base_url?>/admin/ckeditor/ckeditor.js"></script>
<script src="<?= base_url?>/js/functions.js"></script>
<script type="text/javascript">

	$(function() {
		var ckeditorGeneralInformation = CKEDITOR.replace("GeneralInformation");
    var _changeInterval = null;

    ckeditorGeneralInformation.on('change',function(){
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function (){
          $.ajax({
             url : "<?= base_url_admin ?>/product/updateContentByColumnAsync/<?= $_GET['id'] ?>",
             method: "Post",
             data: { ColumnName: "GeneralInformation", Content:  ckeditorGeneralInformation.getData()} ,
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

		var ckeditorLocation = CKEDITOR.replace("Location");

    _changeInterval = null;

    ckeditorLocation.on('change',function(){
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function (){
          $.ajax({
             url : "<?= base_url_admin ?>/product/updateContentByColumnAsync/<?= $_GET['id'] ?>",
             method: "Post",
             data: { ColumnName: "Location", Content:  ckeditorLocation.getData()} ,
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

		var ckeditorStructure = CKEDITOR.replace("Structure");

    _changeInterval = null;

    ckeditorStructure.on('change',function(){
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function (){
          $.ajax({
             url : "<?= base_url_admin ?>/product/updateContentByColumnAsync/<?= $_GET['id'] ?>",
             method: "Post",
             data: { ColumnName: "Structure", Content:  ckeditorStructure.getData()} ,
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

		var ckeditorServiceCharge = CKEDITOR.replace("ServiceCharge");

    _changeInterval = null;

    ckeditorServiceCharge.on('change',function(){
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function (){
          $.ajax({
             url : "<?= base_url_admin ?>/product/updateContentByColumnAsync/<?= $_GET['id'] ?>",
             method: "Post",
             data: { ColumnName: "ServiceCharge", Content:  ckeditorServiceCharge.getData()} ,
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

    var ckeditorAdvantages = CKEDITOR.replace("Advantages");

    _changeInterval = null;

    ckeditorAdvantages.on('change',function(){
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function (){
          $.ajax({
             url : "<?= base_url_admin ?>/product/updateContentByColumnAsync/<?= $_GET['id'] ?>",
             method: "Post",
             data: { ColumnName: "Advantages", Content:  ckeditorAdvantages.getData()} ,
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
<script>
    $(function(){
        var streets = [];

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
        // $(document).on("change","#District", function(e){
        // 	e.preventDefault();
        // 	$.ajax({
        // 		cache: true,
        // 		url: "<?= base_url ?>/location/GetWardsByDistrict",
        // 		method: "Post",
        // 		data: { District : $(this).val(), dataSelected : $("#Ward").attr("data-selected") },
        // 		success: function(result){
        // 			$("#Ward").html(result);
        // 			$("#Ward").change().bind();
        // 		}
        // 	});

        // 	$.ajax({
        // 		cache: true,
        // 		url: "<?= base_url ?>/location/GetStreetsByDistrict",
        // 		method: "Post",
        // 		data: { District : $(this).val(), dataSelected : $("#Street").attr("data-selected") },
        // 		success: function(result){
        // 			$("#Street").html(result);
        // 		}
        // 	});

        //     $.ajax({
        //         cache: true,
        //         url: "<?= base_url ?>/location/GetListStreetNameByDistrict",
        //         method: "Post",
        //         data: { District : $(this).val()},
        //         success: function(result){
        //             streets = JSON.parse(result);
        //             $( "#Street" ).autocomplete({
        //                   source: streets
        //             });
        //         }
        //     });

        //     $( "#Street" ).autocomplete({
        //           source: streets
        //     });

        // });
        $("#Province").change().bind();
    });
</script>