<!DOCTYPE html>
<html>
<head>
  <title>contact-list</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
     
 $(document).ready( function () {
    contactTable=$('#contactTable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('getcontacts') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'number', name: 'number' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },

                 ]
       });

       $("body").on('click','.delete_button',function(){
        
        if (confirm("delete data of id:"+$(this).val())) {
        
        $.ajax({
        url: "{{ url('deletetabledata') }}",
        data:{id:$(this).val()},
        })
        }
        // location.reload();
        contactTable.ajax.reload( null, false );

       });

       $("#add_button").click(function(){
         window.open("{{url('form')}}",'_self');
       });

       $("#download_button").click(function(){
         window.open("{{url('/exportcsv')}}",'_self');
       });

       $("body").on('click','.edit_button',function(){
         var id=$(this).val();
         window.open("{{url('update')}}/"+id,'_self');
       });
    });
</script>

</head>
<body>

<div class="container mt-4">

  <div class="card">

    <div class="card-header text-center font-weight-bold">
      <h2>Contact-list</h2>
    </div>
    
    <div class="card-body">

        <table class="table table-bordered" id="contactTable">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Number</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>

    </div>

    
   </div>
   <button type="button" id="add_button">add</button>
   <button type="button" id="download_button">download</button>

</div>  
</body>
</html>