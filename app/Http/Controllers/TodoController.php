<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->completed = false;
        $todo->save();

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect('/');
    }
}