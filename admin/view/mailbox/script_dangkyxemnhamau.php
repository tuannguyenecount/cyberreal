<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#tblData').DataTable({
            columnDefs: [{ orderable: false, targets: [7] }],
            order: [[0, 'desc']],
        });
        $(".dsXoa").change(function(){
        	if($("#tblData .dsXoa:checked").length > 0)
        	{
        		$("#btnXoa").removeAttr("disabled");
        	}
        	else 
        	{
        		$("#btnXoa").attr("disabled","");
        	}
        });
    });
</script>