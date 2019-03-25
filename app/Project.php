<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    protected $guard_name = 'web';

	// protected $fillable = ['title','description'];
	// protected $guarded = [ 'description'];
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function addTask($task){
        $this->tasks()->create($task);
        // $this->tasks()->create(['description' => $task]);
        // return Task::create([
        //     'project_id' => $this->id,
        //     'description'=> $description
        // ]);
    }

}
