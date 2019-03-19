@extends('layouts.app')

@section('content')
<div class="pull-right">
	<a href="/projects">Project List</a>
</div>
<h1>Create Project</h1>
@foreach ($errors->all() as $error)
<li> {{$error}} </li>
@endforeach

<form method="POST" action="/projects">
	{{ csrf_field() }}
	<div  class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
		Title: <input type="text" name="title" class="form-control" >
	</div>
	<div class="form-group">
		Description: <textarea name="description" class="form-control"></textarea>
	</div>
	<div class="text-center" style="margin: 10px;">
		<button type="submit" class="btn btn-info">Save</button>
	</div>
</form>

@endsection
