<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->completed = false;
        $task->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->completed = $request->completed;
        $task->save();
        return redirect('/');
    }
}