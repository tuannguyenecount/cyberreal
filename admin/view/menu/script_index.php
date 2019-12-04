<!--  <script src="Scripts/jquery.unobtrusive-ajax.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#tblData').DataTable({
            columnDefs: [{ orderable: false, targets: [7] }],
            lengthChange: false,
            searching: false
        });
       
    });
</script> -->

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script> -->
<script src="<?= base_url ?>/js/simTree.js"></script>
<script>
    var list = [
    <?php foreach($view_data['model'] as $item) { ?>
    {
        "id": '<?= $item['Id'] ?>',
        "pid": '<?= $item['MenuParentId'] ?>',
        "name": "<?= $item['Name'] ?>",
    },
    <?php } ?>
    ];
    var tree = simTree({
        el: '#tree',
        data: list,
        check: true,
        linkParent: true,
        //check: true,
        onClick: function (item) {
            console.log(item)
        },
        onChange: function (item) {
            console.log(item)
        }
    });
</script>
<script type="text/javascript">
    function ShowModalEdit(element)
    {
        var id = element.parentNode.getAttribute("data-id");
        $("#btnModalEditMenu").attr("href","<?= base_url_admin ?>/menu/getEditForm/" + id);
        $("#btnModalEditMenu").click().bind();
    }
    function DeleteMenu(element)
    {
        var id = element.parentNode.getAttribute("data-id");
        if(confirm('Bạn xác nhận xóa menu này?'))
        {
            $.ajax({
                url: "<?= base_url_admin ?>/menu/delete/" + id,
                method: "Post",
                success: function(result){
                    if(result.trim() == "1")
                        window.location.reload();
                    else 
                    {
                        ShowPopUpError(result);
                    }
                }
            });
        };
    }
    $(function(){
        $(document).on("submit",".modal-content form", function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                method: "Post",
                data: $(this).serialize(),
                success: function(result){
                    if(result.trim() == "1")
                        window.location.reload();
                    else 
                    {
                        ShowPopUpError(result);
                    }
                }
            })
        });
        $(document).on("click","button[name=btnEditMenu]", function(){
            var id = $(this).parent().attr("data-id");
            console.log(id);
        });
    });
</script> 
