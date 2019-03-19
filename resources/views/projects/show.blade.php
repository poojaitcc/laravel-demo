@extends('layouts.app')

@section('content')

<div class="pull-right">
	<a href="/projects/{{$project->id}}/edit">Edit</a>
	| <a href="{{ route('project.delete', $project->id) }}">Delete</a>
	| <a href="/projects">Project List</a>
</div>
<h2>{{$project->title}} </h2>

<div class="panel panel-default">
	<div class="panel-body">{{$project->description}}</div>
</div>

<h2>All Tasks</h2>
@if($project->tasks->count())
<div class="panel panel-default">
    <ul style="margin: 10px 10px 10px -10px;">
        @foreach ($project->tasks as $task)
        {{-- <li>{{ $task->description}}</li> --}}
        <div>
            {{-- /projects/id/tasks/id --}}
            <form method="POST" action="/tasks/{{ $task->id }}">
                @method('PATCH')
                @csrf
                <label class="checkbox {{ $task->completed ? 'is-completed' : ''}}" for="completed">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                    {{ $task->description }}
                </label>
            </form>
        </div>
        @endforeach
    </ul>
</div>
@else
<div class="panel panel-default">
    <p  style="margin: 10px 10px 10px 10px;"> No Tasks .</p>
</div>
@endif


<h3>New Task</h3>
<form method="POST" action="/projects/{{ $project->id }}/tasks">
    {{ csrf_field() }}
    @if ($errors->has('description'))
    <span class="inputError">{{ $errors->first('description') }}</span>
    @endif
    <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
        Task: <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="text-center" style="margin: 10px;">
        <button type="submit" class="btn btn-info">Add Task</button>
    </div>
</form>

@endsection

<style type="text/css" media="screen">
    .is-completed{
        text-decoration: line-through;
    }

</style>
