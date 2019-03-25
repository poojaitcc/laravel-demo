<?php

namespace App\Http\Controllers;

use Datatables;
use App\Project;
use App\User;
use Illuminate\Http\Request;

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

	 	$this->middleware('permission:product-list', ['only' => ['show']]);
	 	$this->middleware('permission:product-create', ['only' => ['create','store']]);
	 	$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
	 	$this->middleware('permission:product-delete', ['only' => ['destroy']]);
	 }

	 public function search(Request $request){
	 	// $projects = Project::where('user_id',auth()->id())->get();

	 	$projects =	Project::whereRaw('concat(title," ",description) like ?', "%{$request->search}%")->get();


	 	// $projects = project::where('user_id', auth()->id())->where(function($query) use ($search) {
	 	// 	$query->where('name', 'LIKE', '%'.$search.'%')
	 	// 	->orWhere('description', 'LIKE', '%'.$search.'%');
	 	// });

	 	return view('projects.index',compact('projects'));
	 }

	 public function index(){
	 	// auth()->id();
	 	// auth()->user();
	 	// auth()->check();
	 	// auth()->guest();
	 	// $projects = Project::where('user_id',auth()->id())->get();
	 	// Datatables::of(Project::where('user_id',auth()->id())->get())->make(true);
	 	$projects = Project::where('user_id',auth()->id())->get();
	 	// $projects = Project::all();
	 	return view('projects.index',compact('projects'));
	 	// dd($projects);
	 	// $projects = Project::all();
	 	// return view('projects.index',compact('projects'));
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

	 // public function shownew() {
	 // 	return Datatables::of(Project::where('user_id',auth()->id())->get())->make(true);
	 // }

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
	 	return redirect('/projects')->with('success','Product created successfully.');
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
	 	return redirect('/projects')->with('success','Product updated successfully');
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
	 	return redirect('/projects')->with('success','Product deleted successfully');
	 }

	}
