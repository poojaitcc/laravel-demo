<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Edit Project</h1>
	<form  method="POST" action="/projects/{{ $project->id}}">
		<!-- {{ method_field('PATCH') }}
			{{ csrf_field() }} -->
			@method('PATCH')
			@csrf
			<div>
				Title: <input type="text" name="title" value="{{ $project->title }}">
			</div>
			<div>
				Description: <textarea name="description" value="{{ $project->description }}"></textarea>
			</div>
			<div>
				<button type="submit">Edit project</button>
			</div>
		</form>

		<form  method="POST" action="/projects/{{ $project->id}}">
		<!-- {{ method_field('DELETE') }}
			{{ csrf_field() }} -->
			@method('DELETE')
			@csrf
			<div>
				<button type="submit">Delete project</button>
			</div>
		</form>

	</body>
	</html>