<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\time;

class task3Controller extends Controller
{
    public function index(){
        $tasks = time::all();
        return view('task3.table', compact('tasks'));
    }
    
    public function store(Request $req){
        $arr = [
            'time' => 'required',
            'date' => 'required'
        ];

        $valid = Validator::make($req->all(), $arr);
        if ($valid -> fails()) {
            return redirect('/task3/form')
                ->withInput()
                ->withErrors($valid);
        }
        else{

            $drt = date('A', strtotime($req->time));
            $data = time::where([
                ['time', 'like', '%'. $drt .'%'],
                ['date', '=', $req->date]
            ])->get();

            if ($data->count() > 0) {
                return redirect('/task3/form')->with('msg', 'Time Already Exists!');
            }
            else{
                $time = date('H:i A', strtotime($req->time));
            }
            

            $data = new time;
            $data->time = $time;
            $data->date = $req->date;
            if($data->save()){
                return redirect('/task3/form');
            }
        }
    }

    public function destroy($id){
        $tasks = time::find($id);
        $tasks->delete();
        return redirect('/task3');
    }
}
