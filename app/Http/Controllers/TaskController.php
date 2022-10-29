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
       
        $arr = [
            'name' => 'required | min:5 | max:20',
            'date' =>  'required',
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid->fails()) {
            $list = $valid->messages();
            return ['status' => 'error', 'msg' => $list];
        }
        else{

            $date2 = Task::where('date', $req->date)->get();
            if ($date2->count() > 0) {
                return ['status' => 'error', 'msg' => 'Date Already Taken!'];
            }
            else{
                $date6 = date('Y-m-d A', strtotime($req->date));
                // return $date;

                $data = new Task;
                $data->name = $req->name;
                $data->date = $req->date;
                if($data->save()){
                    return ['status' => 'success', 'msg' => 'Data has been Inserted.'];
                }
            }
        }
    }

    public function destroy($id){
        $tasks = Task::findORFail($id)->delete();
        return redirect('/task');
    }
}
