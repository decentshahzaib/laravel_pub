<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }
    
    public function store(Request $req){
       
        $valid = Validator::make($req->all(), [
            'name' => 'required | min:5 | max:20',
            'date' =>  'required | unique:tasks,date',
        ]);
        
        if ($valid->fails()) {
            $list = $valid->messages();
            return response()->json(['status' => 'error', 'msg' => $list]);
        }
        else{

                $data = new Task;
                $data->name = $req->name;
                $data->date = $req->date;
                if($data->save()){
                    return response()->json(['status' => 'success', 'msg' => 'Data has been Inserted.']);
                }
        }
    }

    public function destroy($id){
        $tasks = Task::findORFail($id)->delete();
        return redirect('/task');
    }
}
