<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            'time' => 'required',
            'date' => 'required'
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid->fails()) {
            // return ['status' => 'error', 'msg' => 'Please Fill All Fields!'];
            // $list = "<ul>";
            // foreach ($valid->messages() as $err) {
            //     $list .= "<li>". $err ."</li>";
            // }
            //  $list .= "</ul>";
            
            $list = $valid->messages();
            return ['status' => 'error', 'msg' => $list];
        }
        else{

            $drt = date('A', strtotime($req->time));
            // return $drt;

            $data = Task::where([
                ['time', 'like', '%'. $drt .'%'],
                ['date', '=', $req->date]
            ])->get();

            if ($data->count() > 0) {
                return ['status' => 'error', 'msg' => 'Time Already Exists!'];
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
