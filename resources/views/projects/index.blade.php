@extends('layouts.app')
@section('content')
<div class="pull-right">
	<a href="/projects/create">New Project</a>
</div>
<h1>Projects</h1>
<ul class="list-group">
	@foreach ($projects as $project)
	<a href="/projects/{{$project->id}}">
		<li class="list-group-item">
			<b>{{ $project->title }}</b>
			| <a href="/projects/{{$project->id}}/edit">Edit</a>
			| <a href="{{ route('project.delete', $project->id) }}">Delete</a>
		</li>
	</a>
	@endforeach
</ul>

@endsection
