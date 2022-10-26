<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all(); 
        return view('tasks', compact('tasks'));
    }

    public function create(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
 
        return view('task', [
            'tasks' => $tasks
        ]);
    }
    
    public function store(Request $req){

        $validator = Validator::make($req->all(), [
        'name' => 'required | min:5 | max:20',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $req->name;
        $task->save();
    
        return redirect('/');
 
    }
    
    public function destroy($id){

        Task::findOrFail($id)->delete();
 
       return redirect('/view');
 
    }
}
