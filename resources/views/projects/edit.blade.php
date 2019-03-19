@extends('layouts.app')

@section('content')

<div class="pull-right">
	<a href="/projects/{{$project->id}}">Show</a> |
	<a href="/projects">Project List</a> |
	<a href="{{ route('project.delete', $project->id) }}">Delete</a>
	{{-- <form  method="POST" action="/projects/{{ $project->id}}">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		@method('DELETE')
		@csrf
		<div>
			<button type="submit">Delete project</button>
			<a href="/projects/{{ $project->id}}" method="DELETE" >Delete project</a>
			 <a href="{{ action('ProjectsController@destroy', ['id' => $project->id]) }}" > Delete</a>

			<a href="{{ route('project.delete', ['project_id' => $project->id]) }}">Delete</a>
		</div>
	</form>  --}}
</div>

<h1>Edit Project</h1>
<form  method="POST" action="/projects/{{ $project->id}}">
	{{--  {{ method_field('PATCH') }}
	{{ csrf_field() }} --}}
	@method('PATCH')
	@csrf
	<div  class="form-group">
		Title: <input type="text" name="title" class=" form-control" value="{{ $project->title }}">
	</div>
	<div  class="form-group">
		Description: <textarea name="description" class=" form-control" value="">{{ $project->description }}</textarea>
	</div>
	<div class="text-center" style="margin: 10px;">
		<button type="submit" class="btn btn-info">Update</button>
	</div>
</form>

@endsection
