<?php

namespace App\Http\Controllers;

use App\Models\notes as ModelsNotes;
use App\Models\User;
use Illuminate\Http\Request;

class Notes extends Controller
{
    
    public function addTodo(Request $request){
        $todo = new ModelsNotes();
        // 'id', 'userId', 'todo','status'
        $todo->todo = $request->todo;
        $todo->userId =  $request->user()->userId;
        
        
        $res = $todo->save();

        if ($res) {
            return response(
                [
                'success' =>true,
                'message'=>'todo added successfully',
                
                
            ],200);
        } else {
            return response(
                [
                'success' =>false,
                'message'=>'todo add failed',
            ],201);
        }
    }

    public function getTodos(Request $request){
        $specificUser = $request->user()->userId;
        $todos = ModelsNotes::where('userId', $specificUser)->get();

        return response(
            [
                'success' =>true,
                'message' =>'Todos fetched successfully',
                'todos'=>$todos
            ],200
        );

    }

    public function updateTodo(Request $request, $id){
        $todos = ModelsNotes::find($id);

        $todos->id;
        $todos->todo = $request ->todo;
        $todos->userId =$request->user()->userId;
        $res = $todos->save();


        if($res){
            return response([
                'success' =>true,
                'message'=>'Todo updated Successfully'
            ], 200);
        }else{
            return response([
                'success' =>false,
                'message' =>'Todo update Failed'
            ], 201);
        }

    }

    public function deleteTodo($id){
        $todos = ModelsNotes::find($id);

        $res = $todos->delete();

        if($res){
            return response(
                [
                    'success' =>true,
                    'message'=>'todo deleted successfully'
                ],200
            );
        }else{
            return response(
                [
                    'success' =>false,
                    'message'=>'todo delete failed'
                ], 201
            );
        }

    }


    public function updateStatus(Request $request, $id){
        $todos = ModelsNotes::find($id);

        $todos->id;
        $todos->todo = $todos->todo;
        if($todos->status == 1){
            $todos->status = 0;
        }else{
            $todos->status =1;
        }
        $todos->userId =$request->user()->userId;
        $res = $todos->save();


        if($res){
            return response([
                'success' =>true,
                'message'=>'Status updated Successfully'
            ], 200);
        }else{
            return response([
                'success' =>false,
                'message' =>'Status update Failed'
            ], 201);
        }
    }
}
