<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Create Project</h1>
	<form method="POST" action="/projects">
		{{ csrf_field() }}
		<div>
			Title: <input type="text" name="title">
		</div>
		<div>
			Description: <textarea name="description"></textarea>
		</div>
		<div>
			<button type="submit">create project</button>
		</div>
	</form>
	
</body>
</html>