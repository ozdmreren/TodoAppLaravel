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

        $isExisting = $this->isExisting($taskId);

        if($isExisting){
            $isExisting->update([
                "message"=>$request->input("newMessage")
            ]);
        }else{
        return response()->json(['success'=>false]);    
        }

        return response()->json(['success'=>true]);
    }
    public function taskline(Request $request){
        $taskId = $request->input('taskID');

        $isExisting = $this->isExisting($taskId);

        if($isExisting){
            $isExisting->update([
                "isLined"=>$request->input("lined")
            ]);
        }else{
            return response()->json(["success"=>false]);
        }
        return response()->json(["success"=>true]);
    }
    public function delete(Request $request){
        $taskId = $request->input("taskID");
        
        $isExisting = $this->isExisting($taskId);

        if($isExisting){
            $isExisting->delete();
        }else{
        return response()->json(["success"=>false]);    
        }

        return response()->json(["success"=>true]);
    }


    public function isExisting($taskID){
        $isExisting = ToDoItem::where("id","=",$taskID)->first();
        
        return $isExisting;
    }

}
