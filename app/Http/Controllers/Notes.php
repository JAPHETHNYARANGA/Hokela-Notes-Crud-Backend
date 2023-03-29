<?php

namespace App\Http\Controllers;

use App\Models\notes as ModelsNotes;
use Illuminate\Http\Request;

class Notes extends Controller
{
    
    public function addTodo(Request $request){
        $todo = new ModelsNotes();
        // 'id', 'userId', 'todo','status'
        $todo->todo = $request->todo;
        
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

    public function getTodos(){
        $todos = ModelsNotes::all();

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
}
