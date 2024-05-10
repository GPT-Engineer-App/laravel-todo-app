<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form method="POST" action="/task">
            @csrf
            <input type="text" name="name" placeholder="Add new task">
            <button type="submit">Add</button>
        </form>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    {{ $task->name }}
                    <form method="POST" action="/task/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <form method="POST" action="/task/{{ $task->id }}">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>