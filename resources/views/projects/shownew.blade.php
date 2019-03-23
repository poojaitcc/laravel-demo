{{-- @extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@section('content')

<div class="container">
 <h2>Projects</h2>
 <table class="table table-bordered" id="table">
  <thead>
   <tr>
     <th>Id</th>
     <th>User Id</th>
     <th>Title</th>
     <th>Description</th>
     <th>Created At</th>
     <th>Update At</th>
     <th>Show</th>
     <th>Edit</th>
     <th>Delete</th>
   </tr>
 </thead>
 <tbody>
 </tbody>
</table>
</div>
<script>
 $(function() {
   $('#table').DataTable({
     processing: true,
     serverSide: true,
     ajax: '{{ url('show') }}',
     columns: [
     { data: 'id', name: 'id' },
     { data: 'user_id', name: 'user_id' },
     { data: 'title', name: 'title' },
     { data: 'description', name: 'description' },
     { data: 'created_at', name: 'created_at' },
     { data: 'updated_at', name: 'updated_at' },
     { mRender: function(data,type,row){
      return '<a href="/projects/'+row['id']+'">show</a>'}
    },
    { mRender: function(data,type,row){
      return '<a href="/projects/'+row['id']+'/edit">Edit</a>'}
    },
    { mRender: function(data,type,row){
      return '<a href="/projects/'+row['id']+'/delete">Delete</a>'}
    }
    ]
  });
 });
</script>
@endsection
--}}
