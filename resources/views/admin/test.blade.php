<!DOCTYPE html>
<html>
<head>
    <title>TraitMatrix</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<br><br><br>

    <div class="table-responsive">
        <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Dashboard</a>
        <div class="form-group">
            <input type="text" placeholder="Enter User Email .." class="form-control" id="myInput" onkeyup="myFunction()"  style="width: 200px;float: right;margin-bottom: 10px;">
        </div>
        <br>
        <?php
        $shares = DB::table('respondent')->paginate(10);
        $i=1;
        ?>
        <table class="table " id="myTable" border="0">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach($shares as $share)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$share->name}}</td>
                    <td>{{$share->email}}</td>
                    <td><button type="button" name="view" class="btn btn-success view" id="{{$share->id}}" >View Sub-Cluster</button></td>
                </tr>
                <?php $i++;?>
            @endforeach

        </table>
        {{ $shares->links() }}
    </div>

</div>
</body>
</html>

<div id="post_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#a8e063;color:#2C3E50;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#2C3E50;">Sub Cluster</h4>
            </div>
            <div class="modal-body" id="post_detail">

            </div>
            <div class="modal-footer" style="background-color:#a8e063;color:#2C3E50;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){

        function fetch_post_data(post_id)
        {
            $.ajax({
                url:"/ajax",
                method:"GET",
                data:{post_id:post_id},
                success:function(data)
                {
                    $('#post_modal').modal('show');
                    $('#post_detail').html(data);
                }
            });
        }

        $(document).on('click', '.view', function(){
            var post_id = $(this).attr("id");
            fetch_post_data(post_id);
        });

        $(document).on('click', '.previous', function(){
            var post_id = $(this).attr("id");
            fetch_post_data(post_id);
        });

        $(document).on('click', '.next', function(){
            var post_id = $(this).attr("id");
            fetch_post_data(post_id);
        });

    });
</script>

{{--for auto search in table--}}
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
