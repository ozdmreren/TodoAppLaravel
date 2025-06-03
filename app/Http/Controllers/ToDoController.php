<?php

namespace App\Http\Controllers;

use App\Models\ToDoItem;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function home(){
        $tasks = ToDoItem::all();
        
        return view('home',[
            'tasks'=>$tasks
        ]);
    } 
    public function store(Request $request){
        ToDoItem::create([
            "message"=>$request->get('task'),
            'isLined'=>false
        ]);

        return redirect('/')->with('success','The task successfully created !');
    }
    public function edit(Request $request){
        $taskId = $request->input('taskID');

        $isExisting = ToDoItem::where("id","=",$taskId)->first();

        if($isExisting){
            $isExisting->update([
                "message"=>$request->input("newMessage")
            ]);
        }

        return response()->json(['success'=>true]);
    }
    public function delete(Request $request){
        $taskId = $request->input("taskID");
        
        $isExisting = ToDoItem::where("id","=",$taskId)->first();

        if($isExisting){
            $isExisting->delete();
        }

        return response()->json(["success"=>true]);
    }

}
