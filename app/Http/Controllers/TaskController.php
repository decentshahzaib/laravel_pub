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
        // $drt = date('A', strtotime($req->time));
         $date = $req->date;
        $time = $req->time . ' ' .$req->drt;
       
        $arr = [
            'name' => 'required | min:5 | max:20',
            'date' => Rule::unique('tasks')->where(function ($query) use ($date, $time) {
                return $query->where('date', $date)
                    ->where('time', $time);
            }),
               'time' => 'required',
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid->fails()) {
            $list = $valid->messages();
            return ['status' => 'error', 'msg' => $list];
        }
        else{

            $houre = date('H', strtotime($req->time));
            if ($houre > 12) {
                $houre = $houre - 12;
                $time = date($houre .':i A', strtotime($req->time));
            }
            else{
                $time = date('H:i A', strtotime($req->time));
            }

            $data = new Task;
            $data->name = $req->name;
            $data->time = $time;
            $data->date = $req->date;
            if($data->save()){
                return ['status' => 'success', 'msg' => 'Data has been Inserted.'];
            }
        }
    }

    public function destroy($id){
        $tasks = Task::findORFail($id)->delete();
        return redirect('/task');
    }
}
