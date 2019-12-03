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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="<?= base_url ?>/js/simTree.js"></script>
    <script>
        var list = [
        {
            "id": '1',
            "pid": '',
            "name": "JavaScript",
        },
        {
            "id": '11',
            "pid": '1', // parent ID
            "name": "Angular"
        },
        {
            "id": '12',
            "pid": '1',
            "name": "React"
        },{
            "id": '13',
            "pid": '1',
            "name": "Vuejs"
        },{
            "id": '14',
            "pid": '1',
            "name": "jQueryScript.Net"
        },
        {
            "id": '2',
            "pid": '',
            "name": "HTML5"
        },
        {
            "id": '3',
            "pid": '',
            "name": "CSS3",
            "disabled": true
        },
        {
            "id": '4',
            "pid": '',
            "name": "Server Language",
            "disabled": false
        },
        {
            "id": '5',
            "pid": '4',
            "name": "C#",
            "disabled": false
        },
        {
            "id": '6',
            "pid": '4',
            "name": "Java",
            "disabled": false
        },
        {
            "id": '7',
            "pid": '4',
            "name": "PHP",
            "disabled": false
        },
        {
            "id": '8',
            "pid": '7',
            "name": "Laravel Framework",
            "disabled": false
        },
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