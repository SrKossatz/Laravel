<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){

        $tasks = $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));
    }

    public function viewTask($id){

        $myTask = Db::table('tasks')
                ->where('tasks.id', $id)
                ->join('users', 'user_id','=','users.id')
                ->select('tasks.*', 'users.name as usname')
                ->first();

                $users = DB::table('users')->get();

        return view('tasks.view_task', compact('myTask', 'users'));

    }

    public function deleteTask($id){
        Db::table('tasks')
        ->where('id', $id)
        ->delete();

        return back();
    }


    private function getAllTasks(){
        $tasks = DB::table('tasks')
                ->join('users', 'user_id','=','users.id')
                ->select('tasks.*', 'users.name as usname')
                ->get();

        return $tasks;
    }

    public function addTask(){

        $users = DB::table('users')->get();

        return view('tasks.add_task', compact('users'));
    }

    public function createTask(Request $request){

        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'user_id' => 'required|integer'
        ]);

        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso"');
    }

    public function updateTask(Request $request){

        Task::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa atualizada!');
    }
}
