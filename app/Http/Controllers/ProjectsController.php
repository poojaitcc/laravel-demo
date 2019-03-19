<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
	public function index(){
		$projects = Project::all();
		return view('projects.index',compact('projects'));
	}

	public function show(Project $project){
		// $project = Project::find($id);
		return view('projects.show')->with('project',$project);
	}

	public function create(){
		return view('projects.create');
	}

	public function store(){
		// dd(request(['title','description']));
		// dd($request);
		request()->validate([
			'title' => "required"
			// ,
			// 'description' => "required"
		]);
		// Project::create(request(['title','description']));
		// Project::create(request()->all());
		// Project::create(request()->all());
		// Project::create([
		// 	'title' => request('title'),
		// 	'description' => request('description')
		// ]);
		// $project = Project::find(1);
		// if( !$project ) {
		// 	$project = new Project();
		// }
		$project = new Project();
		$project->title = request('title');
		$project->description = request('description');
		$project->save();
		return redirect('/projects');
	}

	public function edit(Project $project){
		// $project = Project::find($id);
		return view('projects.edit')->with('project',$project);
	}


	public function update($id){
		// Project::update(request(['title','description']));
		$project = Project::findOrfail($id);
		$project->title = request('title');
		$project->description = request('description');
		$project->save();
		return redirect('/projects');
	}

	// public function destroy(Project $project){
	// 	$project->delete();
	// 	// Project::findOrfail($id)->delete();
	// 	return redirect('/projects');
	// }
	public function destroy(Project $project)
	{
		$project->delete();
		return redirect('/projects');
	}

}
