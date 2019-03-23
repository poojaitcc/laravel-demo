@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@section('content')
<div class="pull-right">
	<a href="/projects/create">New Project</a>
</div>
<h1>Projects</h1>
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
		@foreach($projects as $project)
		<tr>
			<td>{{ $project->id }}</td>
			<td>{{ $project->user_id }}</td>
			<td>{{ $project->title }}</td>
			<td>{{ $project->description }}</td>
			<td>{{ $project->created_at->format('d/m/Y (H:i)') }}</td>
			<td>{{ $project->updated_at->format('d/m/Y (H:i)') }}</td>
			<td><a href="/projects/{{$project->id}}">Show</a></td>
			<td><a href="/projects/{{$project->id}}/edit">Edit</a></td>
			<td><a href="{{ route('project.delete', $project->id) }}">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{{-- <ul class="list-group">
	@foreach ($projects as $project)
	<a href="/projects/{{$project->id}}">
		<li class="list-group-item">
			<b>{{ $project->title }}</b>
			| <a href="/projects/{{$project->id}}/edit">Edit</a>
			| <a href="{{ route('project.delete', $project->id) }}">Delete</a>
		</li>
	</a>
	@endforeach
</ul> --}}
@endsection

<script>
	$(function() {
		$('#table').DataTable();
	});
</script>
