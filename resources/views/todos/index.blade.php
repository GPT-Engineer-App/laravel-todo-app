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
        <form action="/todos" method="POST">
            @csrf
            <input type="text" name="name" required>
            <button type="submit">Add</button>
        </form>
        <ul>
            @foreach ($todos as $todo)
                <li>
                    {{ $todo->name }}
                    <form action="/todos/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <form action="/todos/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{ $todo->completed ? 'Unmark' : 'Complete' }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>