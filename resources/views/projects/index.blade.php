<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>projects</h1>
	@foreach ($projects as $project)
	<li>
		<a href="/projects/{{$project->id}}">
			{{ $project->title }}
		</a>
		: <a href="/projects/{{$project->id}}/edit">Edit project</a>
	</li>
	@endforeach

	<a href="/projects/create">create project</a>
</body>
</html>