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
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->completed = false;
        $todo->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = $request->has('completed');
        $todo->save();

        return redirect('/');
    }
}