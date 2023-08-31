<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //FETCH ALL TASKS TO AUTHORIZED USER
        $tasks = Task::with('user')->where('show', 1)->get();
        $users = User::all()->where('role', 'user');
        return view('tasks.index', ['tasks'=> $tasks, 'users'=> $users]);

        // $tasks = Task::with('user')->get();
        // foreach($tasks as $task){
        //     dd($task->user);
        //  }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Task::class);
        $users = User::all()->where('role', 'user');
        return view('tasks.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'description' => 'required|max:250',
            'user_id' => 'required', 
           ]);
        
        $task = Task::create([
            'description' => $request->description,
            'user_id'=> $request->user_id,
            'department' => $request->department,
            'status' => $request->status,
        ]);

        $users = DB::table('users')->select('name', 'id')->where('role', 'manager')->get();
        return back()->with(['successMessage'=>'Task was added successfully!', 'users'=> $users]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // RETURN A MODAL INSTEAD
        return view('tasks.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $task)
    {
        //
        $this->authorize('update', Task::class);
        $users = User::all()->where('role', 'user');
        $taskToUpdate = Task::find($task);
        return view('tasks.edit', ['task'=> $taskToUpdate, 'users'=> $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->authorize('update', Task::class);

        $task = Task::find($id);
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->status = $request->status;
        $task->department = $request->department;

        $task->save();
        // dd($task);
        return redirect('/tasks')->with('successMessage', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //       
        $task = Task::find($id);
        $this->authorize('delete', $task);

        $task->update([
            'show' => 0
        ]);
        return redirect('/tasks')->with('successMessage', 'Task deleted successfully');
    }

    public function processTaskToggling($task_id, $status, $show) {
        $this->authorize('acceptTask', Task::class);
        $task = Task::find($task_id);

        $task->update([
            'status'=> $status,
            'show' => $show,
        ]);

        return back()->with('successMessage','Done!');
    }
}
