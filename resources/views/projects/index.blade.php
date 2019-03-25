@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Projects Management</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="/projects/create">Create New Proejct</a>
		</div>
	</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="col-lg-4 pull-right" style="margin: 10px; ">
	<div class="search-container">
		<form action="/search" method="POST" role="search" >
			{{ csrf_field() }}
			<div class="pull-right input-group">
				<input type="text" class="form-control" name="search"
				placeholder="Search users"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default" style="    height: 23px; background-color: darkgray;">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			{{-- <button type="submit">Submit</button> --}}
		</form>
	</div>
</div>
<table class="table table-bordered" id="project_table">
	<thead>
		<tr>
			<th>Id</th>
			<th>User Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Created At</th>
			<th>Update At</th>
			<th width="280px">Action</th>
			{{-- <th>Show</th>
			<th>Edit</th>
			<th>Delete</th> --}}
		</tr>
	</thead>
	<tbody>
		@foreach($projects as $project)
		<tr>
			<td>{{ $project->id }}</td>
			<td>{{ $project->user->name }}</td>
			<td>{{ $project->title }}</td>
			<td>{{ $project->description }}</td>
			<td>{{ $project->created_at->format('d/m/Y (H:i)') }}</td>
			<td>{{ $project->updated_at->format('d/m/Y (H:i)') }}</td>
			<td>
				<a class="btn btn-info" href="/projects/{{$project->id}}">Show</a>
				<a class="btn btn-primary" href="/projects/{{$project->id}}/edit">Edit</a>
				{!! Form::open(['method' => 'DELETE','route' => ['project.delete', $project->id],'style'=>'display:inline']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</td>
			{{-- <td><a href="/projects/{{$project->id}}">Show</a></td>
			<td><a href="/projects/{{$project->id}}/edit">Edit</a></td>
			<td><a href="{{ route('project.delete', $project->id) }}">Delete</a></td> --}}
		</tr>
		@endforeach
	</tbody>
</table>

@endsection

<script>
	$(function() {
		$('#project_table').DataTable();
	});
</script>
