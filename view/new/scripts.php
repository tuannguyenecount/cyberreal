<!-- <script type="text/javascript" src="<?=base_url?>/wp-content/themes/prigamejxm/js/subpage.js?v=3"></script>
<script>
	$(function(){
		$("#posts__tab li a").click(function(e){
			var self = $(this);
			$("#posts__tab li a").removeClass("active");
			e.preventDefault();
			$url = $(this).attr("data-href");
			$("#divPost").html("<img style='margin:100px 45%;' src='<?=base_url?>/images/loading.gif' />");
			$.post($url, function(result){
				setTimeout(function(){
					$("#divPost").html(result);
				    $("#posts__view-all").attr("href",self.attr("data-href-view-all"));
				    self.attr("class","active");
				},2000);			    
			});
		});

	});
</script> -->