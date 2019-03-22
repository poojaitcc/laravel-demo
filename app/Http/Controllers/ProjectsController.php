<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

class ProjectsController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
	 public function __construct()
	 {
	 	$this->middleware('auth');
	 }

	 public function index(){
	 	// auth()->id();
	 	// auth()->user();
	 	// auth()->check();
	 	// auth()->guest()
	 	$projects = Project::where('user_id',auth()->id())->get();
	 	// dd($projects);
	 	// $projects = Project::all();
	 	return view('projects.index',compact('projects'));
	 }

	 public function show(Project $project){
		// public function show(Filesystem $file){
		// $project = Project::find($id);
		// $this->authorize('view',$project);
	 	// abort_unless(auth()->user()->own($project), 403);
	 	$this->authorize('update',$project);
	 	// if(\Gate::denies('update',$project)){
	 	// 	abort(403);
	 	// }
	 	// if ($project->user_id !== auth()->id())
	 	// {
	 	// 	abort(403);
	 	// }
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
	 	$project->user_id = auth()->id();
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
	 	$project->user_id = auth()->id();
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
	 	// $this->authorize('update',$project);
	 	$project->delete();
	 	return redirect('/projects');
	 }

	}
