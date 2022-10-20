<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\time;

class task3Controller extends Controller
{
    public function index(){
        $tasks = time::all();
        return view('task3.form1', compact('tasks'));
    }
    
    public function store(Request $req){
        $arr = [
            'name' => 'required',
            'time' => 'required',
            'date' => 'required'
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid -> fails()) {
            return redirect('/task3')
                ->withInput()
                ->withErrors($valid);
        }
        else{

            $drt = date('A', strtotime($req->time));
            // return $drt;

            $data = time::where([
                ['time', 'like', '%'. $drt .'%'],
                ['date', '=', $req->date]
            ])->get();

            if ($data->count() > 0) {
                return redirect('/task3')->with('msg', 'Time Already Exists!');
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
            

            $data = new time;
            $data->name = $req->name;
            $data->time = $time;
            $data->date = $req->date;
            if($data->save()){
                return redirect('/task3');
            }
        }
    }

    public function destroy($id){
        $tasks = time::find($id);
        $tasks->delete();
        return redirect('/task3');
    }
}
