<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class taskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }
    
    public function store(Request $req){
        $arr = [
            'name' => 'required',
            'time' => 'required',
            'date' => 'required'
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid -> fails()) {
            return 'Please Fill All Fields!';
        }
        else{

            $drt = date('A', strtotime($req->time));
            // return $drt;

            $data = Task::where([
                ['time', 'like', '%'. $drt .'%'],
                ['date', '=', $req->date]
            ])->get();

            if ($data->count() > 0) {
                return 'Time Already Exists!';
            }
            else{
                
                $h = date('H', strtotime($req->time));
                if ($h > 12) {
                    $h = $h - 12;
                    $time = date($h .':i A', strtotime($req->time));
                }
                else{
                    $time = date('H:i A', strtotime($req->time));
                }
            }
            

            $data = new Task;
            $data->name = $req->name;
            $data->time = $time;
            $data->date = $req->date;
            if($data->save()){
                return 1;
            }
        }
    }

    public function destroy($id){
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/task');
    }
}
